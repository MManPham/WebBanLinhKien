<?php
include_once('connect_DB.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Bán linh kiện</title>
    <link rel="icon" type="images/x-icon" href="images/favicon.ico" />

    <link href="Style/Main.css" rel="stylesheet" />
    <link href="Style/ho_tro.css" rel="stylesheet" />
  
    <link href="jquery-simplyscroll-2.0.5/jquery.simplyscroll.css" rel="stylesheet" />
    <link href="Style/jquery-ui.css" rel="stylesheet" />
    <script src="Js/jquery-3.2.1.min.js" rel="stylesheet"></script>
    

</head>
<body>
    <div id="container">
        <header>
            <div id="logo">
                <img src="images/Alphatek.png" />
                <h1>Computer</h1>
            </div>
            <div id="flashHeader">
                <a href="javascript:gotoshow()"><img src="Slideshow/h1.jpg" name="slide" border=0 style="filter:progid:DXImageTransform.Microsoft.Pixelate(MaxSquare=15,Duration=1)"></a>
            </div>

            <div style="height: 100%; width: 21%;  height: 150px; ">
                <div class="feildBasic">

                    <h4>
                        <i>
                            <img class="dot" src="images/White_dot.svg.png" />
                        </i>
                        Giỏ Hàng
                    </h4>
                    <?php include_once("View/View_getData/hienthiGioHang.php");?>
                </div>
            </div>
            <p class="clear"></p>
        </header>
                <nav >
        <?php
        include_once("View/menu.php");
        ?>
        </nav>
        <article>

            <section id="hotroTT" class="feildContent">
                <h2>Công ty cổ phần thương mại dịch vụ Alphatek Computer</h2>

                <div id="noidung" >
                    <p style="padding-left:20px;">
                        Địa chỉ: 357 Lê Hồng Phong, P2, Q10</br>
                        ĐT: 38337980 - Fax: 38337982</br>
                        Email: alphatek@hcmuncs.edu.vn
                    </p>
                    <h3>Bản đồ đường đi</h3>
                    <img src="images/Capture.png" style="width:100%" alt="">
                </div>
            </section>
            <section id="hotroMail" class="feildContent">
                <h2>Liên Hệ</h2>

                <form >

                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" >

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" >

                    <label for="name">Chủ đề</label>
                    <input type="text" id="name" name="name" >
                    
                    <label for="noidung">Nội Dung</label>
                    <textarea id="noidung" name="noidung" style="height:100px"></textarea>

                    <input type="submit" style="margin-left:300px;" class="btn" value="Gửi">

                </form>
            </section>
        </article>
        <aside>
            <div id="Search"/>
                <div class="feildBasic">
                    <h4>
                        <i>
                            <img class="dot" src="images/White_dot.svg.png" />
                        </i>
                        Tìm Kiếm sản Phẩm
                    </h4>
                    <div id="formSearch" style=" padding: 10px; ">
                        <input id="textSearch" class="ui-autocomplete-input" name="nameProduct" type="text" style="float: left;"/>
                        <button type="button" id="btnSearch" style=" background: url(images/search_f2.png) no-repeat;background-size: contain;" > </button> 
                   
                    </div>
 

            </div>
            <div id="listProductFeild">
                <div class="feildBasic">
                    <h4>
                        <i>
                            <img class="dot" src="images/White_dot.svg.png" />
                        </i>
                        Danh Mục Sản Phẩm                                                                                                                                                                                                                                                                                                                              
                    </h4>
                    <ul style="list-style-type:none" id="ListProductTitle" >
                        <?php include_once("View/View_getData/typeTitle.php") ?>
                    </ul>
                </div>
            </div>
            <div id="news">
                <div class="feildBasic">
                    <h4>
                        <i>
                            <img class="dot" src="images/White_dot.svg.png" />
                        </i>
                        Tin Tức MỚi
                    </h4>
                    <div style=" padding:0 10px 0 10px; ">
                    <?php include_once("View/View_getData/tieuDeTinTuc.php") ?>
                    </div>
                </div>
            </div>
            <div id="nbAccess">
                <div class="feildBasic">
                    <h4>
                        <i>
                            <img class="dot" src="images/White_dot.svg.png" />
                        </i>
                        Số người truy cập
                    </h4>
                    <div style=" padding-left:30px; ">
                        <table  id="truyCap">
                            <tr>
                                <td>Hôm nay</td>
                                <td align="right">2</td>
                            </tr>
                            <tr>
                                <td >Hôm qua</td>
                                <td align="right">0</td>
                            </tr>
                            <tr>
                                <td >Tuần này</td>
                                <td align="right">12</td>
                            </tr>
                            <tr>
                                <td >Tháng này</td>
                                <td align="right">33</td>
                            </tr>
                            <tr>
                                <td >Tất Cả</td>
                                <td align="right">64</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </aside>
        <div class="clear"></div>
        <footer >
            <p>
            Bài làm được thực hiện bởi nhóm 1. Môn phát triển ứng dụng Web. Đại Học CNTT Tp.HCM<br/>
                Bản quyền thuộc ngành lập trình, Trung tâm tinh học. Đại học KHTN Tp.HCM<br/>
      
        </p>
        </footer>
    </div>

    <!--Reference-->
    <script src="Js/Menu.js"></script>
    <script src="Js/SimplyScroll.js"></script>
    <script src="Js/jquery-ui.js" ></script>
    <script src="jquery-simplyscroll-2.0.5/jquery.simplyscroll.js"></script>
    <script src="ddtabmenu/ddtabmenufiles/ddtabmenu.js"></script>
    <?php include_once('Model/autoComplete_Search.php');?>
    <!--Main Script page -->
    <script>
        $('.ddcolortabs').attr('id','ddtabs7');
    </script>

</body>
</html>
