<?php 
    function createProduct($title,$price,$img,$id,$class_col){
        echo <<<_END
            <div class="$class_col">
                <a href="detail.php?id=$id" class="product-link">
                    <div class="product">
                        <div class="product_img">
                            <img src="$img" alt="product">
                        </div>
                        <div class="product_info">
                            <div class="product_name">$title</div>
                            <div class="product_price">$price$</div>
                        </div>
                    </div>
                </a>
            </div>
        _END;
    }

    function inputElement($name,$placeholder,$id, $value,$disabled){
        $ele = <<<_END
        <div class="form-group mb-3">
            <input type="text" $disabled name="$name" value="$value" class="form-control" placeholder="$placeholder" id="$id" >
        </div>
        _END;
        echo $ele;
    }

    function passwordElement($name,$placeholder,$id, $value,$disabled){
        $ele = <<<_END
        <div class="form-group mb-3">
            <input type="password" $disabled name="$name" value="$value" class="form-control" placeholder="$placeholder" id="$id" >
        </div>
        _END;
        echo $ele;
    }

    function emailElement($name,$placeholder,$id, $value,$disabled){
        $ele = <<<_END
        <div class="form-group mb-3">
            <input type="email" $disabled name="$name" value="$value" class="form-control" placeholder="$placeholder" id="$id" >
        </div>
        _END;
        echo $ele;
    }

    function textareaElement($name,$placeholder,$id,$value,$disabled){
        $ele = <<<_END
        <div class="form-group mb-4">
            <textarea class="form-control" $disabled placeholder ="$placeholder" rows="5" id="$id" name="$name" value = "$value"></textarea>
        </div>
        _END;
        echo $ele;
    }

    #button
    function buttonElement($btnid,$styleclass,$text,$name,$attr){
        $btn = <<<_END
        <button type="submit" name="$name" $attr class="$styleclass" id="$btnid">$text</button>
        _END;
        echo $btn;
    }

    #messages
    function textNode($classname,$smg){
        // $element = "<h6 class = \"$classname\">$smg</h6>";
        $element = <<<_END
            <div class="alert $classname alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                $smg
            </div>
        _END;
        echo $element;
    }

    function selectProductTypeElement(){
        $element = <<<_END
        <div class="form-group">
                  <select class="form-control" id="inputType" name="input_type">
                    <option value = "1" selected hidden>Sơn nội thất</option>
                    <option value = "1">Sơn nội thất</option>
                    <option value = "2">Sơn ngoại thất</option>
                    <option value = "3">Bột trét tường</option>
                    <option value = "4">Dụng cụ sơn</option>
                  </select>
                </div>
        _END;
        echo $element;
    }

    function selectUserRoleElement(){
        $element = <<<_END
        <div class="form-group">
                  <select class="form-control" id="inputType" name="input_type">
                    <option value = "2" selected hidden>Khách hàng</option>
                    <option value = "1">Admin</option>
                    <option value = "2">Khách hàng</option>
                  </select>
                </div>
        _END;
        echo $element;
    }

    function imageElement(){
        $element = <<<_END
                <div class="form-group">
                  <div class="mb-3 d-flex justify-content-center">
                    <img id="imgDataInput" width="200px">
                  </div>
                  <input type="file" name="file" class="form-control-file border">
                </div>
        _END;
        echo $element;
    }
?>

<!--  <div class="col-md-3 col-sm-6 col-12 mt-3"> -->