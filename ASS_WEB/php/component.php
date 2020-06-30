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
        <button name="$name" $attr class="$styleclass" id="$btnid">$text</button>
        _END;
        echo $btn;
    }
?>

<!--  <div class="col-md-3 col-sm-6 col-12 mt-3"> -->