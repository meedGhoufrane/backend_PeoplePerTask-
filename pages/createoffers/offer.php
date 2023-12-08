<?php 

require '../cnx.php';

session_start();
if (isset($_SESSION["name"])) {
    //code here
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/index.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="../js/dashboardusers.js"></script>
        <title>PeoplePerTask</title>
    </head>
    <style>
        .btn-group{
        display: flex;
        gap: 1rem;
    }
    a{
            list-style: none;
            color:#fff;
            text-decoration:none;
        }
        .row{
            background: blanchedalmond;
    
        }
        .form{
            border-radius: 2%;
            margin-left: 20rem;
            width: 50%;
            margin-top: 10rem;
            display: flex;
            flex-direction: column;
            align-items: center;
       
            
        }
      
    </style>
    <body>
    
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="../../images/PeoplePerTask.png" style="width: 12rem;" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: #6298f3;"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0 auto;">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../search.php">Searsh</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact</a>
                  </li>
                </ul>
                <?php if(!isset($_SESSION['name'])){?>
                <form class="d-flex nav_btn" role="search">
                  <a href="../sign.php" class="btn btn-primary">Connect</a>
                </form>
                <?php }else{?>
                    <?php echo $_SESSION['name'];?>
                    <a  id="logoutbtn" type="button" style="margin-left: 2rem;" class="btn btn-danger" role="botton" href="../../fillesign/logout.php" >logout</a>
                    <?php };
                     ?>
                <i id="dark-mode-toggle" class="fas fa-moon ps-3 "></i>
              </div>
            </div>
          </nav>
    </header>

    <section class ="form" >
        <div id="content" style="width: inherit;">
        <form action="insertoffers.php" method="POST" >
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Montant</label>
            <input type="text" class="form-control" name="Montant" id="Montant">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Délai</label>
            <input type="text" class="form-control"  name="Delai" id="Delai">
        </div>
        <button id="button" type="submit" class="btn btn-primary ">Create offer</button>
        </form>
        </div> 
</section>
   
    
    </div>
    </div> 
    </div>
        <script src="https://kit.fontawesome.com/e80051e55f.js" crossorigin="anonymous"></script>
        <script src="../js/dashboardusers.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="../js/dashboardhome.js"></script>
        <script>
             $(document).ready(function () {     $('#example').DataTable(); }); 
    
             
            function confirmDelete(event) {
                if (!confirm('Your are about to delete this item')) {
                    event.preventDefault();
                }
            }
           
        </script>
        
    </body>
    </html>
    <?php
    } else{
    header('Location: sign.php');
    }


?>