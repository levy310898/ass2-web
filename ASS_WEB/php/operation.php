<?php 
require_once('db.php');
require_once('component.php');
require_once('picture.php');

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

function adminType(){
    if(!isset($_GET['type'])){
        return "user";
    }else{
        return $_GET['type'];
    }
}

function loadTableData($query){
    $data = getData($query);
    if($data){
        $count = 0;
        while($row = mysqli_fetch_assoc($data)){
            // if($count == 10) break;
            $id = $row['id'];
            $title = $row['title'];
            $desc = $row['description'];
            $type = $row['type'];
            $price = $row['price'];
            $pic = $row['picture'];
            echo <<<_END
            <tr>
                <td data-id="$id"> $id </td>
                <td data-id="$id"> $title </td>
                <td data-id="$id"> $desc </td>
                <td data-id="$id"> $type </td>
                <td data-id="$id"> $price </td>
                <td data-id="$id"> $pic </td>
                <td ><i data-id="$id" class="data-edit fas fa-edit"></i></td>
                <td><button name="data_delete" value ="$id"class = "btn-transfer"><i class="data-del fas fa-trash"></i></button></td>
            </tr>
            _END;
            $count ++;
        }
    }
}

# get img link
function getImg($dir,$request){
    $file = $_FILES["file"];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    return getImgLink($dir,$fileName,$fileTmpName,$fileError,$request);
}

function addData(){
    global $conn;
    #catch 3 input data
    $title = $_POST['product_title'];
    $desc = $_POST['product_desc'];
    $type = $_POST['product_type'];
    $price = $_POST['product_price'];

    #picture
    
    $isPic = getImg("./pictures/","add");
    if($isPic[0] == true){
        $pic = $isPic[1];
    }else{
        return ["alert-danger",$isPic[1]];
    }
    
    // $pic = $_POST['product_img'];
        
    $sql = "INSERT INTO product (title,description,type,price,picture) VALUE('$title','$desc','$type','$price','$pic')";
        
    if(mysqli_query($conn,$sql)){
        //textNode("primary","Insert data successfully");
        return ["alert-info","Insert data succesfully"];
    }else{
         //textNode("error","ERROR");
        return ["alert-danger","ERROR Insert"];
    }
}

function updateData(){
    global $conn; 
    $id = (int)trim($_POST['product_id']);
    $title = $_POST['product_title'];
    $desc = $_POST['product_desc'];
    $type = (int)trim($_POST['product_type']);
    $price = (double)trim($_POST['product_price']);
    $isPic = getImg("./pictures/","update");
    if($isPic[0] == true){
        if($isPic[1] == ""){
            $pic = $_POST['product_img'];
        }else{
            $pic = $isPic[1];
        }
    }else{
        return ["alert-danger",$isPic[1]];
    }
        
    $sql = "UPDATE product SET 
    title = '$title',description = '$desc',type = '$type',price = '$price',picture = '$pic' where id = '$id'";
        
    if(mysqli_query($conn,$sql)){
        //textNode("primary","Insert data successfully");
        return ["alert-info","Update data succesfully"];
    }else{
         //textNode("error","ERROR");
        return ["alert-danger","ERROR Update"];
    }
}

function deleteData($id){
    global $conn;
    $sql = "DELETE FROM product WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        return ["alert-info","Delete data successfully"];
    }else{
        return ["alert-danger","ERROR Delete"];
    }
}

// function deleteAllData(){
//     global $conn;
//     $sql = "DELETE  FROM cars";
//     if(mysqli_query($conn,$sql)){
//         return ["alert-info","Delete all data successfully"];
//     }else{
//         return ["alert-danger","ERROR Delete All"];
//     }
// }


?> 