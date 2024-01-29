<?php
    include_once "dbh.php";
    session_start();
    $id = $_POST['delete'];

    $sql = "SELECT `file` FROM `tracks` WHERE `id` = '$id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck =  mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $path = $row['file'];
    }
    
    if(!unlink($path)){
        echo "Failed to delete track";
    }

    $sql = "DELETE FROM `tracks` WHERE `id` = '$id';";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("LOCATION: ../Page/Profile/profile.php");
    }else{
        echo "Failure";
    }
?>