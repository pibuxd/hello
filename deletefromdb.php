<?php
    session_start();
    require_once "db.php";

    $user = $_SESSION['user'];
    delete_user($db, $user['username']);
    echo "<h1>bye</h1>";
?>