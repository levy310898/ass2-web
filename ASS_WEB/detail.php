<!DOCTYPE html>
<html lang="vi">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="js/mmenu-light-master/dist/mmenu-light.css">
</head>

<body>
<?php require_once('php/operation.php');
    $title = "";
    $price = 0;
    $pic = "";
    $decs = [];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from product where id= $id";
        $data = mysqli_query($conn,$query);
        if(!$data){
            echo "error";
        }else{
            while($row = mysqli_fetch_assoc($data)){
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $pic = $row['picture'];
                $decs = explode(".",$row['description']);
            }
            
        }
    }
?>
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
                        <li><a href="#"><i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="c_detail_middle">
        <div class="container">
            <div class="mid_top">
                <div class="nav">
                    <ul>
                        <li>
                            >
                        </li>
                        <li>
                            <a href="#">Danh mục</a>
                        </li>
                        <li>
                            >
                        </li>
                        <li>
                            <a href="#">Sơn nội thất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mid_left">
                <div class="product_detail_img">
                    <img src="<?php echo"$pic"?>" alt="">
                </div>
            </div>

            <div class="mid_right">
                <div class="detail_title"><h2><?php echo "$title"?></h2></div>
                <div class="detail_information">
                    <h3>Thông tin sản phẩm</h3>
                    <ul>
                        <!-- <li>Công nghệ Keep Cool ưu việt với tính năng phản xạ tia UV làm giảm nhiệt độ tường tới 5 o C</li>
                        <li>Chống kiềm hóa vượt trội nhờ công nghệ Alkali-Guard</li>
                        <li>Chống phai màu hiệu quả với Công nghệ ColourLock TM</li>
                        <li>Chống bám bẩn với công nghệ Dirt-Guard</li>
                        <li>Chống thấm</li>
                        <li>Đạt chứng chỉ Xanh Singapore</li> -->
                        <?php 
                        foreach ($decs as $item){
                            echo "<li> $item</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="detail_option">
                    <div class="detail_color_option">
                        <h3>Chọn màu</h3>
                        <ul>
                            <li>
                                <button class="black"></button>
                            </li>
                            <li>
                                <button class="white"></button>
                            </li>
                            <li>
                                <button class="red"></button>
                            </li>
                            <li>
                                <button class="yellow"></button>
                            </li>
                            <li>
                                <button class="blue"></button>
                            </li>
                            <li>
                                <button class="green"></button>
                            </li>
                            <li>
                                <button class="purple"></button>
                            </li>
                        </ul>
                    </div>

                    <div class="detail_quantity_option">
                        <h3>Chọn số lượng</h3>
                        <div class="quantity_select">
                            <div class="decrease">
                                <button>-</button>
                            </div>
                            <div class="quantity">
                                <input type="text">
                            </div>
                            <div class="increase">
                                <button>+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail_buy_button">
                    <button class="buy_button"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
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