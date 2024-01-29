<?php
    session_start();
    include_once "dbh.php";
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['pass_confirm'];
    $email = $_POST['email'];
    $name_taken = false;

    $sql = "SELECT `username` FROM `users` WHERE `username` = '$username';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        $name_taken = true;
    }

    if($first_name == "" || $last_name == "" || $username == "" || $password == "" || $confirm == "" || $email == ""){
        header("LOCATION: ../Page/Register/register_not_filled.php");
    }

    if($first_name != "" && $last_name != "" && $username != "" && $password != "" && $confirm != "" && $email != ""){
        if($password === $confirm && $name_taken === false){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`, `email`, `likes`) VALUES ('$first_name', '$last_name', '$username', '$password', '$email', 0);";
            $result = mysqli_query($conn, $sql);

            if($result){
                $_SESSION["username"] = $username;
                $_SESSION["tracks"] = 0;
                $_SESSION["likes"] = 0;
                header("LOCATION: ../Page/Profile/profile.php");
            }else{
                echo "Not created";
            }
        }else{
            if($name_taken === true){
                header("LOCATION: ../Page/Register/register_taken.php");
            }if($password != $confirm){
                header("LOCATION: ../Page/Register/register_no_match.php");   
            }
        }
    }

?>