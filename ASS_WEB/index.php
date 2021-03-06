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
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="js/wow/css/libs/animate.css">
    <link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen">
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

    <div class="c_middle">

        <div class="container-fluid">
            <div class="mid_ab_picture">
                <div class="nivoSlider" id="slider">
                    <img src="images/banner/1.jpg" alt="">
                    <img src="images/banner/2.jpg" alt="">
                    <img src="images/banner/3.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="container-lg">
            <div class="mid_about">
                <div class="mid_ab_description">
                    <div class="desc_detail">
                        <h2>Công ty THM - Đại lí chiến lược của AkzoZobel tại Việt Nam</h2>
                        <p>Với 20 năm kinh nghiệm làm trong ngành vật liệu xây dựng, cụ thể hơn trong lĩnh vực sơn, công ty chúng tôi luôn cung cấp những sản phẩm đạt chất lượng cao nhất. 
                            Chúng tôi không ngừng tiếp thu những xu hướng mới để có thể tư vấn cho khách hàng một cách đầy đủ, hợp lí.
                        </p>
                    </div>
                    <div class="desc_detail_with_pic wow bounceInUp">
                        <div class="ddwp_text">
                            <div>
                                <h2>CHUYÊN NGHIỆP DẪN ĐẦU</h2>
                                <p>THM là công ty chuyên nghiệp, cung cấp giải pháp toàn diện đáp ứng đầy đủ các nhu cầu sơn phủ của bất cứ một công trình xây dựng nào với bề mặt cần sơn phủ là xi măng, tường bê tông, sàn nhà hay trần nhà, bề mặt gỗ, kim loại hay các bề mặt khác.
                                </p>
                            </div>
                        </div>
                        <div class="ddwp_image">
                            <img src="images/about/2.jpg" alt="">
                        </div>
                    </div>
                    <div class="desc_detail_with_pic wow bounceInUp">
                        <div class="ddwp_image">
                            <img src="images/about/1.jpg" alt="">
                        </div>
                        <div class="ddwp_text">
                            <div>
                                <h2>DỊCH VỤ CHUYÊN NGHIỆP</h2>
                                <p>Chúng tôi cung cấp các bảng phối màu chất lượng cao với nhiều nhóm màu đa dạng cho dự án của bạn,
                                các dịch vụ hỗ trợ kỹ thuật ngay tại công trình. Đến với chúng tôi, bạn sẽ được tư vấn, cung cấp các sản phẩm chất lượng tốt nhất và các quy trình đạt chuẩn cần thiết. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mid_sec">
                <div class="mid_sec_product">
                    <div class="product_title"><a href="#"><h2>Sản phẩm hot</h2></a></div>

                    <div class="container-lg">
                        <div class="row">

                            <?php
                                loadProduct("SELECT * FROM product",4);
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="js/nivo-slider/jquery.nivo.slider.js"></script>
    <script src="js/fontawesome-free-5.13.0-web/js/all.js"></script>
    <script src="js/mmenu-light-master/dist/mmenu-light.js"></script>

    <!-- Popper JS -->

    <!-- <script src="js/mmenu-light/mmenu-light.js"></script> -->

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


    <!-- <script>
        document.addEventListener("DOMContentLoaded", () => {
            const node = document.querySelector("#my-menu");
            const menu = new MmenuLight(node, {
                title: "MENU",
                theme: "dark"
            });

            menu.enable("(max-width: 1199px)");
            menu.offcanvas();

            document
                .querySelector("a[href='#my-menu']")
                .addEventListener("click", evnt => {
                    menu.open();

                    //    Don't forget to "preventDefault" and to "stopPropagation".
                    evnt.preventDefault();
                    evnt.stopPropagation();
                });
        });
    </script> -->


    

    <script>
        $(window).on('load', function() {
        $('#slider').nivoSlider({
            prevText: '<i class="fas fa-chevron-left"></i>',
            nextText: '<i class="fas fa-chevron-right"></i>',
            controlNav: false
        });
        });
        </script>


    <script src="js/wow/dist/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>