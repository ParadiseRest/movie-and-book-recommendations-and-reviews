<?php
include_once 'db.php';



$data = 'Bad Movie'; 

$movie_id = 3;
$movie_name = "nwh";
$sentiment_value = "";
$current_user_id = 1;
$comment= $data;

$output=shell_exec("python sentiment.py "  .$data);


$res = str_replace( array( '\'', '"',
	',' , ';', '<', '>','[',']' ), ' ', $output);

echo $res;
$sentiment_value= $res;


$query = "INSERT INTO comment_db  (`movie_id`, `movie_name`, `comment`, `sentiment_res`, `user_id`)
                          VALUES
          ('$movie_id','$movie_name','$comment','$sentiment_value','$current_user_id')";

                 echo $query;
                $data = mysqli_query($conn, $query);

                if ($data) {
                    echo "<script>alert('Comment has been uploaded successfullly.');</script>";
                } else {
                    //echo "<script>alert('Something went wrong');</script>";
                    echo mysqli_error($conn);
                    
                }



?>