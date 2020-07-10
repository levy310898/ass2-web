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
    <title>Đăng kí</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
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

    <div class="c_signinup_middle">
        <div class="container">
            <form method="POST">
                <div class="input_field">
                    <h2>Đăng kí</h2>
                    <h4>Tên</h4>
                    <input type="name" name="input_name">
                    <h4>Email</h4>
                    <input type="email" name="input_email">
                    <h4>Mật khẩu</h4>
                    <input type="password" name="input_password1">
                    <h4>Nhập lại mật khẩu</h4>
                    <input type="password" name="input_password2">
                    <button name="btn_signup">Đăng kí</button>
                </div>
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

    <?php 
        if(isset($_POST["btn_signup"])){
            $name = $_POST["input_name"];
            $email = $_POST["input_email"];
            $pass1 = $_POST["input_password1"];
            $pass2 = $_POST["input_password2"];
            if ($email == "" or $pass1 == "" or $pass2 == ""){
                ?>
                <script>alert("Vui lòng nhập đủ các dòng")</script>
                <?php
                return false;
            }
            $regex = '/.+@.+\..+/';
            if(!preg_match($regex, $email)){
                ?>
                <script>alert("Email có dạng <sth>@<sth>.<sth>");</script>
                <?php
                return false;
            }
            if($pass1 != $pass2){
                ?>
                <script>alert("Kiểm tra password, chưa trùng nhau");</script>
                <?php
                return false;
            }
            $queryByEmail = "select * from user where email = '$email'";
            $result = mysqli_query($conn, $queryByEmail);
            if (mysqli_num_rows($result) > 0){
                ?>
                <script>alert("Email này đã có người dùng trước đó, vui lòng chọn email khác");</script>
                <?php
                return false;
            }

            $hash_pass = password_hash($pass1, PASSWORD_DEFAULT);

            $query = "insert into user (name, email, password, role) values ('$name', '$email', '$hash_pass', 2)";
            mysqli_query($conn, $query);
            ?>
            <script>alert("Thành công")</script>
            <?php
        }
    ?>
</body>

</html>