<?php

session_start();
include("database.php");

if (!isset($_SESSION['loggedIn'])) {
    header('Location: indexlogin.php');
    exit;
}



$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `user_db` WHERE id='$user_id' ";
$query_run = mysqli_query($conn, $query);
$check = mysqli_num_rows($query_run) > 0;

if ($check) {
    while ($row = mysqli_fetch_array($query_run)) {


?>




        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/eae6d3081f.js" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <title>Movie</title>
        </head>

        <body style="background-color: #303030;">
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
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutUs.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="logout.php">Welcome,<?php echo $row['username']; ?> </a>
                        </li>
                    </ul>

                </div>
            </nav>

    <?php
    }
} else {
    echo "<div><h1>User is not loggedIn</h1></div>";
}

    ?>
    <!------------------------------------------------------------Body-------------------------------------------------------------------------------------------------->

    <!------------------------------------------------------------Movie Image------------------------------------------------------------------------------------------->
    <section>
        <div class="container-fluid">
            <img src="Images/Dog.jpg" class="rounded float-start" alt="..." style="margin-right: 5vh;">
            <div class="container" style="color: aliceblue;">
                <h1>Dog(2022)</h1>
                <h4>action/fiction</h4>
                <br>
                <br>
                <table class="table" style="color: aliceblue;">
                    <h4 class="director">Director : <h4 class="directorName">Channing Tatum</h4>
                    </h4>
                    <thead>
                        <tr>
                            <th scope="col">Cast</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Channing Tatum as Jackson Briggs</th>
                        </tr>
                        <tr>
                            <th scope="row">Mike Vaughn as Additional Voices</th>
                        </tr>
                        <tr>
                            <th scope="row">Terri Hoyos as Anna Rodriguez</th>
                        </tr>
                        <tr>
                            <th scope="row">Cayden Boyd as Corporal Levitz</th>
                        </tr>
                    </tbody>
                </table>


            </div>

        </div>
        <br>
    </section>
    <br>

    <!-------------------------------------------------------------progress bar----------------------------------------------------------------------------------------
        
<section>
    <div style="color: aliceblue; margin: 3vh">
        <i class="fa-brands fa-imdb">Imdb</i><br>
        <br>
        <i class="fas fa-heart">Rotten tomatoes Critics</i><br>
        <br>
        <i class="fas fa-car">Rotten tomatoes Audience</i><br>
        <br>
    </div>
</section>
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    <div style="margin: 5vh;">
        <h3 style="color: aquamarine;">Synopsis</h3>
        <p>
        <h5 style="color: aliceblue;">Two former Army Rangers are paired against their will on the road trip of a lifetime. Army Ranger Briggs (Channing Tatum) and Lulu (a Belgian Malinois dog) buckle into a 1984 Ford Bronco and race down the Pacific Coast in hopes of making it to a fellow soldier's funeral on time. Along the way, they'll drive each other completely crazy, break a small handful of laws, narrowly evade death, and learn to let down their guards in order to have a fighting chance of finding happiness.</h5>
        </p>
    </div>

    <?php

    include_once 'database.php';
    $id = 4;


    $query = "WITH tmv AS (SELECT *  FROM `comment_db`  WHERE movie_id='$id') 
SELECT movie_name,
(SELECT COUNT(sentiment_res) FROM tmv WHERE sentiment_res like '%positive')/COUNT(sentiment_res)  *100 AS postive_prcnt,
(SELECT COUNT(sentiment_res) FROM tmv WHERE sentiment_res like '%negative')/COUNT(sentiment_res)  *100 AS negative_prcnt
FROM tmv";


    $query_run = mysqli_query($conn, $query);
    $check = mysqli_num_rows($query_run) > 0;

    if ($check) {
        while ($row = mysqli_fetch_array($query_run)) {

    ?>


            <div>
                <h4 style="text-align: center; color: aliceblue;">Underdogs Rating</h4>
                <div class="progress" style="margin-right: 5vh; margin-left: 5vh;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($row['postive_prcnt']); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><?php echo round($row['postive_prcnt']); ?>%</div>

                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo round($row['negative_prcnt']); ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><?php echo round($row['negative_prcnt']); ?>%</div>
                </div>
            </div>
            <br>

    <?php
        }
    } ?>





    <br>

    <!----------------------------------------------------------------comment section------------------------------------------------------------------------------------------------------------->



    <div class="container-fluid">
        <div class="">
            <div class="">
                <div class="card">
                    <div class="p-3">
                        <h6>Comments</h6>
                    </div>
                    <form action="" method="post">
                        <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                            <input type="text" name="comment_value" class="form-control" placeholder="Enter your comment...">
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" name="submit" class="mr-2 btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>


                    <?php
                    include_once 'database.php';
                    $id = 4;


                    $query = "SELECT comment_db.comment,comment_db.sentiment_res,comment_db.created_at,user_db.username  
                                      FROM comment_db   
                                      JOIN user_db  
                                      ON comment_db.user_id=user_db.id 
                                       WHERE comment_db.movie_id='$id'";


                    $query_run = mysqli_query($conn, $query);
                    $check = mysqli_num_rows($query_run) > 0;

                    if ($check) {
                        while ($row = mysqli_fetch_array($query_run)) {
                    ?>


                            <div class="mt-2">
                                <div class="d-flex flex-row p-3">
                                    <img src="Images/zoro.jpg" width="40" height="40" class="rounded-circle mr-3" style="margin-right: 1vh;">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center"> <span class="mr-2"><?php echo $row['username']; ?></span>
                                                <!-- <small class="c-badge">Top Comment</small>-->
                                            </div> <small><?php echo $row['created_at']; ?></small>
                                        </div>
                                        <p class="text-justify comment-text mb-0"><?php echo $row['comment']; ?></p>
                                        <div class="d-flex flex-row user-feed" style="margin: 1vh;">
                                            <span class="wish"><i class="fa fa-heartbeat mr-2" style="margin: 1vh;">0</i></span>
                                            <span class="ml-3"><i class="fa fa-comments-o mr-2" style="margin: 1vh;"></i>Reply</span>
                                        </div>
                                    </div>
                                </div>

                        <?php
                        }
                    } else {
                        echo "<div ><h4 class='text-center'> No data found 😢</h4> </div> ";
                    }

                        ?>

                            </div>
                </div>
            </div>
        </div>
    </div>

        </body>

        </html>

        <?php

        include_once 'database.php';
        if (isset($_POST['submit'])) {

            $movie_id = 4;
            $movie_name = "Dog";
            $comment = $_POST['comment_value'];
            $sentiment_value = $set_val;
            $current_user_id = $user_id;

            $data = $comment;

            $output = shell_exec("python sentiment.py "  . $data);
            $res = str_replace(array('\'', '"', ',', ';', '<', '>', '[', ']'), ' ', $output);

            $sentiment_value = trim($res);



            if ($comment != "" && $movie_name != "" && $sentiment_value != "") {

                $query = "INSERT INTO comment_db  (`movie_id`, `movie_name`, `comment`, `sentiment_res`, `user_id`)
VALUES
('$movie_id','$movie_name','$comment','$sentiment_value','$current_user_id')";

                // echo $query;

                $data = mysqli_query($conn, $query);

                if ($data) {
                    echo "
    <script>alert('Comment has been uploaded successfullly.');
    window.location = 'http://localhost/review/dog.php';</script>";
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
            } else {
                echo "<script>alert('Please Type something before submit.');</script>";
            }
        }
        /* else{
echo "<script>alert('Something went wrong with the form');</script>";
} */

        ?>