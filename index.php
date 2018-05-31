<?php
include('connect_DB.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Bán linh kiến</title>

    <link href="Style/Main.css" rel="stylesheet" />
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
            <!-- San pham ban chay -->
            <?php include_once("View/View_getData/spBanChay.php");?>

            <!-- San pham moi -->
            <?php include_once("View/View_getData/spMoi.php");?>
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
                    <div style=" padding:0 10px 0 10px;">
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
                Bản quyền thuộc ngành lập trình, Trung tâm tinh học. Đại học KHTN Tp.HCM<br/>
                Thông tin liên hệ: alphatek@hcmuns.edu.vn
        </p>
        </footer>
    </div>

    <!--Reference-->
    <script src="Js/Menu.js"></script>
    <script src="Js/SimplyScroll.js"></script>
    <script src="Js/jquery-ui.js" ></script>
    <script src="jquery-simplyscroll-2.0.5/jquery.simplyscroll.js"></script>
    <?php include_once('Model/autoComplete_Search.php');?>
    

</body>
</html>