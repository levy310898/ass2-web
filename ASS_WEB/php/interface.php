<?php 
require_once('db.php');
require_once('component.php');
require_once('picture.php');
require_once('operation.php');

// control load the input box which dynamic 
function showInput($type){
    if($type == 'product'){
        showInputProduct();
    }else if($type == 'idea'){
        showInputIdea();
    }else{
        showInputProduct();
    }
}
//load product input
function showInputProduct(){
    inputElement('input_id','Enter Id:','inputId',"","readonly");
    inputElement('input_title','Enter Title:','inputTitle',"","");
    textareaElement('input_desc','Enter Description:','inputDesc',"","");
    inputElement('input_type','Enter Type:','inputType',"","hidden");
    inputElement('input_price','Enter Price:','inputPrice',"","");
    inputElement('input_img','Enter img:','inputImg',"","hidden");
    selectElement();
    imageElement();
}
//load idea input
function showInputIdea(){
    inputElement('input_id','Enter Id:','inputId',"","readonly");
    inputElement('input_title','Enter Title:','inputTitle',"","");
    textareaElement('input_content','Enter Content:','inputContent',"","");
    inputElement('input_img','Enter img:','inputImg',"","hidden");
    imageElement();
}
//control category input, or you can say it the <thead> in form load data 
function loadCategoryData($type){
    if($type =='user'){
        $category = ['id','title','description','type','price','picture','edit','delete'];
        printCategory($category);
    }else if($type == 'product'){
        $category = ['id','title','description','type','price','picture','edit','delete'];
        printCategory($category);
    }else if($type == 'idea'){
        $category = ['id','title','content','picture','edit','delete'];
        printCategory($category);
    }
}

function printCategory($category){
    echo "<tr>";
    foreach($category as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
}

//control loadData
function loadDataTable($query,$type){
    if($type == 'user'){
        loadProductTableData($query);
    }else if($type == 'product'){
        loadProductTableData($query);
    }else if($type == 'idea'){
        loadIdeaTableData($query);
    }
}
//load the product data
function loadProductTableData($query){
    $data = getData($query);
    if($data){
        while($row = mysqli_fetch_assoc($data)){
            // if($count == 10) break;
            $id = $row['id'];
            $title = $row['title'];
            $desc = $row['description'];
            $type = $row['type'];
            $price = $row['price'];
            $pic = $row['picture'];
            echo <<<_END
            <tr class="data-tr">
                <td data-id="$id"> $id </td>
                <td data-id="$id"> $title </td>
                <td data-id="$id" class="data-text-area"> $desc </td>
                <td data-id="$id"> $type </td>
                <td data-id="$id"> $price </td>
                <td data-id="$id"><img style="height:100px;"src = "$pic"></td>
                <td ><i data-id="$id" class="data-edit fas fa-edit"></i></td>
                <td><button name="data_delete" value ="$id"class = "btn-transfer"><i class="data-del fas fa-trash"></i></button></td>
            </tr>
            _END;
        }
    }
}

function loadIdeaTableData($query){
    $data = getData($query);
    if($data!=false){
        while($row = mysqli_fetch_assoc($data)){
            // if($count == 10) break;
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $pic = $row['picture'];
            echo <<<_END
            <tr class="data-tr">
                <td data-id="$id"> $id </td>
                <td data-id="$id"> $title </td>
                <td data-id="$id" class = "data-text-area"> $content </td>
                <td data-id="$id"><img src = "$pic" style="height:100px;"></td>
                <td ><i data-id="$id" class="data-edit fas fa-edit"></i></td>
                <td><button name="data_delete" value ="$id"class = "btn-transfer"><i class="data-del fas fa-trash"></i></button></td>
            </tr>
            _END;
        }
    }
}
?>