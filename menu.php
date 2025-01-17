<?php

session_start();
include("db.php");

if (!isset($_SESSION['loggedIn'])) 
{
	header('Location: indexlogin.php');           //here you put your login page
	exit;
}



$user_id = $_SESSION['user_id'];

         $query ="SELECT * FROM `user_db` WHERE id='$user_id' ";
         $query_run = mysqli_query($conn, $query);
         $check = mysqli_num_rows($query_run) >0 ;
   
         if($check)
         {
              while($row= mysqli_fetch_array( $query_run ))
              {
                

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Menu Page</title>
</head>
<body style="background-color: black;">

<!-------------------------------------------------------Navigation bar---------------------------------------------------------------------------------------------->

    <nav class="navbar navbar-light bg-light " style="    opacity: 0.8;
    box-shadow: 0 0 5px 2px #282a2d;
    line-height: 1.4;
    margin-bottom: 5vh;">
    <div class="container-fluid ">
        <a class="navbar-brand brand " href="#" style="font-family: Montserrat;
                font-style: normal;
                font-weight: normal;
                font-size: 36px;
                line-height: 44px;
                color: #000000;">
            Underdogs Reviews
        </a>

        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

            <ul class="nav justify-content-end">
                <!--<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="HomePage.html">Home</a>
                </li> -->
               <!-- <li class="nav-item">
                    <a class="nav-link" href="menu.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.php">About us</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link " href="logout.php ">Welcome, <h3><?php echo $row['username']; ?></h3> </a>
                </li>
            </ul>
            <?php
                  }
                }
                else{
                    echo "<div><h1>User is not loggedIn</h1></div>"; 
                  }

                        ?>

    </div>
</nav>

<!----------------------------------------------------Movie Preview-------------------------------------------------------------------------------------------------------->

<div class="row row-cols-1 row-cols-md-4 g-4">
  <a href="hustlers.php">
    <div class="col">
      <div class="card">
        <img src="Images/hustlers.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Hustlers</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="pastMalice.php">
    <div class="col">
      <div class="card">
        <img src="Images/past malice.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> Past Malice: An Emma Fielding Mystery</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="nwh.php">
    <div class="col" >
      <div class="card">
        <img src="Images/nwh.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Spider-Man: No Way Home</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="dog.php">
    <div class="col">
      <div class="card">
        <img src="Images/Dog.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Dog</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="theAdamProject.php">
    <div class="col">
      <div class="card">
        <img src="Images/The adam project.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> The Adam Project</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="turningRed.php">
    <div class="col" >
      <div class="card">
        <img src="Images/turning red.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Turning Red</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="exploited.php">
    <div class="col" >
      <div class="card">
        <img src="Images/exploited.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Exploited</h5>
        </div>
      </div>
    </div>
  </a>

  <a href="21JumpStreet.php">
    <div class="col" >
      <div class="card">
        <img src="Images/21.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">21 Jump Street</h5>
        </div>
      </div>
    </div>
  </a>
  </div>

<!----------------------------------------------------Pagination----------------------------------------------------------------------------------------------------------->

<nav aria-label="Page navigation example" style="margin-top: 5vh;">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>

  <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

</body>
</html>