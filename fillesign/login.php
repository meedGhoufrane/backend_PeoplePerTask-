<?php

require '../pages/cnx.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['emaillog']) && isset($_POST['passwordlog'])) {
        $email = $_POST["emaillog"];
        $password = $_POST["passwordlog"];

        // Prepare a query with a single parameter for email
        $sql = 'SELECT * FROM user WHERE email = ?';

        // Prepare the query
        $stmt = mysqli_prepare($cnx, $sql);

        // Bind the parameter (only for email)
        mysqli_stmt_bind_param($stmt, 's', $email);

        // Execute the prepared query
        mysqli_stmt_execute($stmt);

        // Get the result (mysqli_stmt_get_result)
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Email exists in the database
            if (password_verify($password, $row['passwords'])) {
                // Password is valid
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['Nom'];

                // Redirect based on user role
                if ($row['role'] == 'user') {
                    $_SESSION["email"] = $email;
                    header("Location: ../pages/index.php");
                    exit();
                } elseif ($row['role'] == 'admin') {
                    $_SESSION["email"] = $email;
                    header('Location: ../pages/dashboardusers.php');
                    exit();
                }
            } else {
                echo 'Password invalid';
            }
        } else {
            // Email is invalid
            echo 'Email invalid';
        }

        mysqli_stmt_close($stmt);
        mysqli_close($cnx);
    }
}

?>
