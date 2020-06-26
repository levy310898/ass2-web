<!DOCTYPE html>
<html lang="vi">

<?php
    require_once('php/db.php');
    require_once('php/operation.php');
    require_once('php/component.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh mục</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="js/mmenu-light-master/dist/mmenu-light.css">
</head>

<body>
    <div class="c_header">
        <div class="container">
            <div class="top">
                <div class="top_left">
                    <ul>
                        <li>Hotline: 0901234567</li>
                        <li>Email: 1510362@hcmut.edu.vn</li>
                    </ul>
                </div>
                <div class="top_right">
                    <ul>
                        <li><a href="signup.php">Đăng kí</a></li>
                        <li><a href="signin.php">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>

            <div class="bottom">
                <div class="head_logo">
                    <a href="index.php"><img src="images/logo.jpg" alt=""></a>
                </div>
                
                <div class="c_menu">
                    <a href="#my-menu"><i class="fa fa-bars"></i></a>
                </div>
                <div class="head_menu" id="my-menu">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="idea.php">Ý tưởng</a></li>
                        <li><a href="category.php">Danh mục</a>
                            <ul id="submenu">
                                <li><a href="#">
                                        <div class="cat">Sơn nội thất</div>
                                    </a></li>
                                <li><a href="<?php ?>">
                                        <div class="cat">Sơn ngoại thất</div>
                                    </a></li>
                                <li><a href="<?php ?>">
                                        <div class="cat">Bột trét tường</div>
                                    </a></li>
                                <li><a href="<?php ?>">
                                        <div class="cat">Dụng cụ sơn</div>
                                    </a></li>
                                <li><a href="<?php ?>">
                                        <div class="cat">Vật liệu xây dựng khác</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Liên hệ</a></li>
                        <li class="li_signup"><a href="signup.php">Đăng kí</a></li>
                        <li class="li_signin"><a href="signin.php">Đăng nhập</a></li>
                        <li><a href="#"><i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="c_middle mt-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <nav class="category-nav">
                        <ul>
                            <li><a href="?type=1">Sơn nội thất</a></li>
                            <li><a href="?type=2">Sơn ngoại thất</a></li>
                            <li><a href="?type=3">
                                    Bột trét tường
                                </a></li>
                            <li><a href="?type=4">
                                    Dụng cụ sơn
                                </a></li>
                        </ul>
                    </nav>
                    
                    
                </div>

                <div class="col-lg-9 col-md-12">
                    <?php if(!isset($_GET["type"])){ ?>

                        <div class="cat_title"><h2>Sản phẩm hot</h2></div>
                        <div class="container-lg">
                            <div class="row">
                                <?php 
                                    loadCateGoryHotProduct("select * from product",4);
                                ?>
                            </div>
                        </div>
                    <?php }else{
                        $type = $_GET['type'];
                        $type_name = ["Sơn Nội Thất","Sơn Ngoại Thất","Bột Trét Tường","Dụng Cụ Sơn"]
                    ?>
                        <div class="cat_title"><h2><?php $name = $type_name[$type-1];echo "$name"?></h2></div>
                        <div class="container-lg">
                            <div class="row">
                                <?php 
                                    loadCateGoryHotProduct("select * from product where type = $type", 0);
                                ?>
                            </div>
                        </div>
                    <?php
                    } 
                    
                    ?>
                    
                </div>
            </div>
            <?php 
                if(!isset($_GET['type'])){ ?>
                    
                    <div class="cat_title mt-5"><h2>Sơn nội thất</h2></div>
            <div class="row">
                <?php 
                    loadProduct("select * from product where type = 1",4)
                ?>
            </div>

            <div class="cat_title mt-5"><h2>Sơn ngoại thất</h2></div>
            <div class="row">

                <?php 
                    loadProduct("select * from product where type = 2", 4)
                ?>
            </div>


            <div class="cat_title mt-5"><h2>Bột trét tường</h2></div>
            <div class="row">
            <?php 
                    loadProduct("select * from product where type = 3", 4)
                ?>
            </div>

            <div class="cat_title mt-5"><h2>Dụng cụ sơn</h2></div>
            <div class="row">
            <?php 
                    loadProduct("select * from product where type = 4", 4)
                ?>
            </div>
            
            <?php
                }
            ?>
            

        </div>
    </div>

    <div class="c_footer">
        <div class="container">
            <div class="footer_left">
                <div class="footer_logo">
                    <ul>
                        <li>
                            <img src="images/footer-img/dulux.png" alt="">
                        </li>
                        <li>
                            <img src="images/footer-img/hammerite.png" alt="">
                        </li>
                        <li>
                            <img src="images/footer-img/maxilite.png" alt="">
                        </li>
                    </ul>
                </div>

                <div class="footer_information">
                    <div>Bài tập lớn 1 - Môn Lập trình web</div>
                    <div>Chịu trách nhiệm nội dung: Lê Nguyễn Như Cường © 1997-2020 Công ty TNHH THM</div>
                    <div>Điện thoại: 0901234567 Email: 1510362@hcmut.edu.vn</div>
                </div>
                
            </div>
        </div>

    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/fontawesome-free-5.13.0-web/js/all.js"></script>
    <script src="js/mmenu-light-master/dist/mmenu-light.js"></script>

    <script>
        document.addEventListener(
                "DOMContentLoaded", () => {
                    const menu = new MmenuLight(
                        document.querySelector( "#my-menu" ),
                        "(max-width: 600px)"
                    );

                    const navigator = menu.navigation();
                    const drawer = menu.offcanvas();

                    document.querySelector( "a[href='#my-menu']" )
                        .addEventListener( "click", ( evnt ) => {
                            evnt.preventDefault();
                            drawer.open();
                        });
                }
            );
    </script>
</body>

</html>