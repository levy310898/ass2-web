<!DOCTYPE html>
<html lang="vi">
<?php
    require_once('php/db.php');
    require_once('php/operation.php');
    require_once('php/component.php');
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="js/mmenu-light-master/dist/mmenu-light.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                <?php
                    if (!isset($_SESSION["userId"])){
                        ?>
                        <div class="top_right">
                            <ul>
                                <li><a href="signup.php">Đăng kí</a></li>
                                <li><a href="signin.php">Đăng nhập</a></li>
                            </ul>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="top_right">
                            <ul>
                                <li><a href="#">Xin chào <?php echo $_SESSION["name"]; ?></a></li>
                                <li><a href="signout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                        <?php
                    }
                ?>
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
                                <li><a href="#">
                                        <div class="cat">Sơn ngoại thất</div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="cat">Bột trét tường</div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="cat">Dụng cụ sơn</div>
                                    </a></li>
                                <li><a href="#">
                                        <div class="cat">Vật liệu xây dựng khác</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Liên hệ</a></li>
                        <li class="li_signup"><a href="signup.php">Đăng kí</a></li>
                        <li class="li_signin"><a href="signin.php">Đăng nhập</a></li>
                        <li><a href="cart.php"><i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="c_cart_middle mt-5">
        <div class="container-lg">
            <h2>Giỏ hàng</h2>
            <?php 
                $total = 0;
                if (isset($_SESSION["userId"])){
                    $uid = $_SESSION["userId"];
                    ?>
                        <div class="cart_list_product">
                            <ul>
                                <?php
                                    $query = "select c.id, c.amount, c.price, p.title, p.picture, c.p_option from cart c inner join product p on c.product_id = p.id where user_id = $uid";
                                    $result = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_object($result)){
                                        ?>
                                            <li>
                                                <div class="cart_product">
                                                    <div class="cart_product_img">
                                                        <img src="<?php echo $row->picture; ?>" alt="">
                                                    </div>
                                                    
                                                    <div class="cart_product_info">
                                                        <div class="cart_pro_name">
                                                            <?php echo $row->title; ?>
                                                        </div>
                                                        <div class="cart_pro_amount">
                                                            Số lượng: <?php echo $row->amount; ?>
                                                        </div>
                                                        <div class="cart_pro_option">
                                                            Option: <?php echo $row->p_option; ?>
                                                        </div>
                                                        <div class="cart_pro_price">
                                                            Số tiền: <?php echo $row->price; ?>
                                                        </div>
                                                        <div class="cart_pro_delete">
                                                            <a href="./cart_delete.php?id=<?php echo $row->id; ?>">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        $total = $total + $row->price;
                                    }
                                ?>              
                            </ul>
                        </div>
                    <?php
                }
            ?>
            

            <div class="cart_total">
                <div class="ct_price">
                    <div class="tamtinh">
                        <h5>Tạm tính:</h5> <h4><?php echo $total; ?></h4>
                    </div>
                    <div class="thue">
                        <h5>Thuế:</h5> <h4><?php $tax = $total * 0.1; echo $tax; ?></h4>
                    </div>
                    <div class="thanhtien">
                        <h5>Thành tiền:</h5> <h4><?php echo $total + $tax; ?></h4>
                    </div>
                </div>
                <div class="ct_pay">
                    <button>Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
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