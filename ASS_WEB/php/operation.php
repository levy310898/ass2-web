<?php 
require_once('db.php');
require_once('component.php');


function getData(){
    global $conn;
    $query = "select * from product";
    $data = mysqli_query($conn, $query);
    if(mysqli_num_rows($data) >0){
        return $data;
    }
}

function loadData(){
    $data = getData();
    if($data){
        echo "<table>";
        while($row = mysqli_fetch_assoc($data)){
            $id = $row['id'];
            $title = $row['title'];
            $decs = $row['description'];
            $type = $row['type'];
            $price = $row['price'];
            $pic = $row['picture'];
            echo <<<_END
                <tr>
                    <td>$id</td>
                    <td>$title</td>
                    <td>$decs</td>
                    <td>$type</td>
                    <td>$price</td>
                    <td>$pic</td>
                </tr>
            _END;
        }
        echo "</table>";
    }
}

function loadHotProduct(){
    $data = getData();
    if($data){
        $count = 0;
        while($row =mysqli_fetch_assoc($data)){
            if($count ==4){
                break;
            }
            if($row){
                $id= $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $img = $row['picture'];
                createProduct($title,$price,$img,$id);
                $count += 1;
            }
        }
    }
}
?> 