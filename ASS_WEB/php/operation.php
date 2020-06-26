<?php 
require_once('db.php');
require_once('component.php');

function getData($query){
    global $conn;
    $data = mysqli_query($conn, $query);
    if(mysqli_num_rows($data) >0){
        return $data;
    }
}

function loadProduct($query, $limitedData){
    $data = getData($query);
    if($data){
        $count = 0;
        while($row =mysqli_fetch_assoc($data)){
            if($count ==$limitedData){
                break;
            }
            if($row){
                $id= $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $img = $row['picture'];
                $class_col = "col-md-3 col-sm-6 col-12 mt-3";
                createProduct($title,$price,$img,$id,$class_col);
                $count += 1;
            }
        }
    }
}

function loadCateGoryHotProduct($query,$limited){
    $data = getData($query);
    if($data){
        $count = 0;
        while($row =mysqli_fetch_assoc($data)){
            if($limited != 0){
                if($count ==$limited){
                break;
                }
            }
            if($row){
                $id= $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $img = $row['picture'];
                if($count == $limited-1){
                    $class_col = "lg-block col-md-3 col-sm-6 col-12 mt-3";
                }else{
                    $class_col = "col-lg-4 col-md-3 col-sm-6 col-12 mt-3";
                }
                createProduct($title,$price,$img,$id,$class_col);
                $count += 1;
            }
        }
    }
}
?> 