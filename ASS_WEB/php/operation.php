<?php 
require_once('db.php');
require_once('component.php');
require_once('picture.php');

function getData($query){
    global $conn;
    $data = mysqli_query($conn, $query);
    if($data){
        if(mysqli_num_rows($data) && mysqli_num_rows($data) >0){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

# load product in category
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
#########################admin site#####################################
function adminType(){
    if(!isset($_GET['type'])){
        return "product";
    }else{
        return $_GET['type'];
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

//////////////////////////////// adding data //////////////////////////////////
function addData($type){
    if($type=='user'){
        return addProductData();
    }else if($type=='product'){
        return addProductData();
    }else if($type =='idea'){
        return addIdeaData();
    }
}


function addProductData(){
    global $conn;
    #catch 3 input data
    $title = $_POST['input_title'];
    $desc = $_POST['input_desc'];
    $type = $_POST['input_type'];
    $price = $_POST['input_price'];

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

function addIdeaData(){
    global $conn;
    $title = $_POST['input_title'];
    $content = $_POST['input_content'];
    $isPic = getImg("./pictures/ideas/","add");
    if($isPic[0] == true){
        $pic = $isPic[1];
    }else{
        return ["alert-danger",$isPic[1]];
    }

    $sql = "INSERT INTO idea (title,content,picture) VALUE('$title','$content','$pic')";
    if(mysqli_query($conn,$sql)){
        return ["alert-info","Insert data successfully"];
    }else{
        return ["alert-danger","ERROR Insert"];
    }
}

////////////////////////////////updateData///////////////////////////////////////////

function updateData($type){
    if($type=='user'){
        return updateProductData();
    }else if($type=='product'){
        return updateProductData();
    }else if($type =='idea'){
        return updateIdeaData();
    }
}

function updateProductData(){
    global $conn; 
    $id = (int)trim($_POST['input_id']);
    $title = $_POST['input_title'];
    $desc = $_POST['input_desc'];
    $type = (int)trim($_POST['input_type']);
    $price = (double)trim($_POST['input_price']);
    $isPic = getImg("./pictures/","update");
    if($isPic[0] == true){
        if($isPic[1] == ""){
            $pic = $_POST['input_img'];
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

function updateIdeaData(){
    global $conn;
    $id = (int)trim($_POST['input_id']);
    $title = $_POST['input_title'];
    $content = $_POST["input_content"];
    $isPic = getImg("./pictures/ideas","update");
    if($isPic[0] == true){
        if($isPic[1] == ""){
            $pic = $_POST['input_img'];
        }else{
            $pic = $isPic[1];
        }
    }else{
        return ["alert-danger",$isPic[1]];
    }
    $sql = "UPDATE idea SET 
    title = '$title',content = '$content',picture = '$pic' where id = '$id'";
    if(mysqli_query($conn,$sql)){
        //textNode("primary","Insert data successfully");
        return ["alert-info","Update data succesfully"];
    }else{
         //textNode("error","ERROR");
        return ["alert-danger","ERROR Update"];
    }
}


//////////////////////////////////////delete data ////////////////////////////////////////////


function deleteData($id,$table_name){
    global $conn;
    $sql = "DELETE FROM $table_name WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        return ["alert-info","Delete data successfully"];
    }else{
        return ["alert-danger","ERROR Delete"];
    }
}

function deleteAllData($table_name){
    global $conn;
    $sql = "DELETE FROM $table_name";
    if(mysqli_query($conn,$sql)){
        return ["alert-info","Delete all data successfully"];
    }else{
        return ["alert-danger","ERROR delete"];
    }
}


?> 