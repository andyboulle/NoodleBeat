<?php

    include_once "dbh.php";
    session_start();

    $directory = "../Uploads/";
    $target = $directory . basename($_FILES["upload"]["name"]);
    $uploadCheck = true;
    $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    $title = $_POST['title'];
    $artist = $_SESSION['username'];
    $date = date('m-d-y');
    $genre = $_POST['genre'];
    $type = "." . $fileType;
    $file = $target;

    if (file_exists($target)) {
        header("LOCATION: ../Page/Upload/upload_exists.php");
        $uploadCheck = false;
    }

    if ($_FILES["upload"]["size"] > 1000000000) {
        header("LOCATION: ../Page/Upload/upload_too_big.php");
        $uploadCheck = false;
    }

    if($fileType != "mp3" && $fileType != "wav"){
        header("LOCATION: ../Page/Upload/upload_wrong_type.php");
        $uploadCheck = false;
    }

    if($title == null){
        header("LOCATION: ../Page/Upload/upload_no_name.php");
        $uploadCheck = false;
    }

    if($artist == null){
        header("LOCATION: ../Page/Upload/upload_no_user.php");
        $uploadCheck = false;
    }

    if ($uploadCheck === false) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target)) {
            
            $sql = "INSERT INTO `tracks` (`title`, `artist`, `genre`, `date_uploaded`, `file_type`, `file`, `likes`) VALUES ('$title', '$artist', '$genre', '$date', '$type', '$file', 0);";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                header("LOCATION: ../index.php");
            }
            
            header("LOCATION: ../Page/Profile/profile.php");
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

?>