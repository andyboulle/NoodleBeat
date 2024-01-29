<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    header("LOCATION: ../Page/Profile/profile_not_logged.php");
?>