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
?>

<!--  <div class="col-md-3 col-sm-6 col-12 mt-3"> -->