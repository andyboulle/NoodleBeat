<?php
    session_start();
    include_once "dbh.php";

    $username = $_POST['username'];
    $pass = $_POST['password'];

    //echo $username . "<br>" . $pass . "<br>"; 

    $sql = "SELECT * FROM `users` WHERE `username` = '$username';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            //echo "id: " . $row['id'] . "<br>";
            //echo "username: " . $row['username'] . "<br>";
            //echo "password: " . $row['password'] . "<br>";
            if(password_verify($pass, $row['password'])){
                $_SESSION["username"] = $username;
                $_SESSION["tracks"] = $row['tracks'];
                $_SESSION["likes"] = $row['likes'];
                $_SESSION["likeIds"] = array();
                header("LOCATION: ../Page/Profile/profile.php");
            }else{
                header("LOCATION: ../Page/Sign-In/sign_in_invalid.php?");
            }
        }
    }else{
        header("LOCATION: ../Page/Sign-In/sign_in_invalid.php?");
    }
?>