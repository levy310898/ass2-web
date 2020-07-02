<?php
    require_once('php/db.php');
    require_once('php/operation.php');
    require_once('php/component.php');

    if(isset($_GET["id"])){
        $query = "delete from cart where id = {$_GET["id"]}";
        mysqli_query($conn, $query);
        header("Location: ./cart.php");
    }
?>