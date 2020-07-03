<?php 
    require_once('db.php');
    $limit_data_table = 10;
    function getTotalPage($tableName){
        global $conn;
        global $limit_data_table;
        $query = "select count(id) as total from $tableName";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $total_records = (int)$row['total'];
        $total_page = ceil($total_records / $limit_data_table);
        return $total_page;
    }

    function getCurrentPage(){
        return isset($_GET['page']) ? $_GET['page'] : 1;
    }

?>