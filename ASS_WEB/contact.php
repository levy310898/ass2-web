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
    <title>Liên hệ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="js/mmenu-light-master/dist/mmenu-light.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .alert-dismissible .close{
            right:-45% !important;
        }
    </style>
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

    <div>
        <div class="container">
        <div class="message-box mb-3">
        <?php 
            if(isset($_POST["contact_submit"])){
                $messages = addContact();
                textNode($messages[0],$messages[1]);
            }
        ?>
    </div>
            <div class="contact_information mb-5">
                <h2>Thông tin liên hệ</h2>
                <div>Bài tập lớn 1 - Môn Lập trình web</div>
                <div>Chịu trách nhiệm nội dung: Lê Nguyễn Như Cường © 1997-2020 Công ty TNHH THM</div>
                <div>Điện thoại: 0901234567 Email: 1510362@hcmut.edu.vn</div>
            </div>
            <form method = "POST">
                <div class="form-group">
                    <label for="fullName">Họ tên:</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Nhập họ tên: " id="fullName">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" name = "phone" class="form-control" placeholder="Nhập số điện thoại" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name = "email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="note">Nội dung:</label>
                    <textarea class="form-control" name = "note" rows="5" id="note"></textarea>
                </div>
                <button type="submit" name = "contact_submit" class="btn btn-primary">Submit</button>
            </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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