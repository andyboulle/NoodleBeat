<?php

    include_once "dbh.php";
    session_start();
    $username = $_SESSION["username"];
    $id = $_POST['like'];

    //Gets array of liked indexes
    $sql = "SELECT `likes` FROM `users` WHERE `username` = '$username';";
    $getIDs = mysqli_query($conn, $sql);
    $resultCheck =  mysqli_num_rows($getIDs);
    while($row = mysqli_fetch_assoc($getIDs)){
        $arr = $row["likes"];
    }
    
    //Checks if the post has been liked
    if(strpos($arr, $id)){
        if($username == null){
            header("LOCATION: ../Page/Misc/like_log_in.php");
        }else{
            //Take away a like
            $sql = "UPDATE `tracks` SET `likes` = `likes` - 1 WHERE `id` = '$id';";
            $result = mysqli_query($conn, $sql);
            header("LOCATION: ../Page/Index/index.php");
        }
        
        //Take out index from array of likes
        $sql = "UPDATE `users` SET `likes` = REPLACE(`likes`, ', $id', '') WHERE `username` = '$username';";
        $result = mysqli_query($conn, $sql);
    }else{
        if($username == null){
            header("LOCATION: ../Page/Misc/like_log_in.php");
        }else{
            //Add a like
            $sql = "UPDATE `tracks` SET `likes` = `likes` + 1 WHERE `id` = '$id';";
            $result = mysqli_query($conn, $sql);
            header("LOCATION: ../index.php");
        }
        
        //Add index to array of likes
        $sql = "UPDATE `users` SET `likes` = CONCAT(`likes`, ', $id') WHERE `username` = '$username';";
        $result = mysqli_query($conn, $sql);
    }
?>