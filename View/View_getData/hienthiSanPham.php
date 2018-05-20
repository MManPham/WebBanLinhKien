<?php 
if(!isset($_REQUEST["ma_san_pham"]))
{
    $bangsp= mysql_query("SELECT * FROM san_pham ");
    echo" <section id='SP' class='feildContent'>
          <h2>Sản Phẩm Mới</h2>
          <div id='hienThiSPMoi'>";
    while( $row = mysql_fetch_assoc($bangsp))
    {
    ?>
      <div class="sanPham">
          <div class="thongTinSp">
            <a  href='san_pham.php?ma_san_pham= <?php echo $row["ma_san_pham"] ?>' > <?php echo $row["ten_san_pham"] ?></a>
          </div>
          <a  href='san_pham.php?ma_san_pham=<?php echo $row["ma_san_pham"] ?>'>
            <img src="images/san_pham/<?php echo $row["hinh"] ?>"  alt="<?php echo $row["hinh"] ?>" />
          </a> 
          <div class="Gia">Giá :<?php echo number_format($row["don_gia"]) ?></div>
          <form class="Mua" >
            <input name='ma_sp_mua' style="display:none"value="<?php echo $row["ma_san_pham"] ?>"/>
            <input name="so_luong"type="number" value="1" />
            <button type="submit" class="btnMua">Mua</button>
        </form>
      </div>
    <?php
    }
    echo "<div class='clear'></div>
    </div>
    </section>";
}
else
{
  $bangsp= mysql_query("SELECT * FROM san_pham where ma_san_pham= ".$_REQUEST["ma_san_pham"]);
  echo" <section id='chiTiet' class='feildContent'>
          <h2>Chi tiết sản phẩm</h2>
          <div id='hienThiSPMoi'>";
    while( $row = mysql_fetch_assoc($bangsp))
    {
        $maloai = $row["ma_loai"];
    ?>
    
    <div class="noidung" style="padding-left:10px;">
        <div id="anhSanPham" class="feildContent">
            <img src="images/san_pham/<?php echo $row['hinh'];?>" alt="">
        </div>
        <div id="chiTietSP" class="feildContent">
            <h3><?php echo $row['ten_san_pham'];?></h3>
            <div id="moTa" style="padding-left:10px;">
                <div>Đơn giá: <?php echo $row['don_gia'];?></div>
                <div><?php echo $row['mo_ta_chi_tiet'];?></div>
            </div>
            <form class="Mua" >
              <input name='ma_sp_mua' style="display:none"value="<?php echo $row["ma_san_pham"] ?>"/>
                <input name="so_luong"type="number" value="1" />
                <button type="submit" class="btnMua">Mua</button>
            </form>
        </div>
        
        <div class="clear"></div>
    </div>
    <?php
    }
    echo "<div class='clear'></div>
    </div>
    </section>";
    $bangSPKhac= mysql_query("SELECT * FROM san_pham where  ma_loai= ".$maloai." AND ma_san_pham <>".$_REQUEST["ma_san_pham"]);
    echo" <section id='SP' class='feildContent'>
    <h2>Sản Phẩm Khác ".$row["ma_loai"]."</h2>
    <div id='hienThiSPMoi'>";
    while( $row2 = mysql_fetch_assoc($bangSPKhac))
    {
    ?>
    <div class="sanPham">
        <div class="thongTinSp">
        <a  href='?ma_san_pham= <?php echo $row2["ma_san_pham"] ?>' > <?php echo $row2["ten_san_pham"] ?></a>
        </div>
        <a  href='?ma_san_pham=<?php echo $row2["ma_san_pham"] ?>'>
        <img src="images/san_pham/<?php echo $row2["hinh"] ?>"  alt="<?php echo $row2["hinh"] ?>" />
        </a> 
        <div class="Gia">Giá :<?php echo number_format($row2["don_gia"]) ?></div>
        <form class="Mua" >
            <input name='ma_sp_mua' style="display:none"value="<?php echo $row2["ma_san_pham"] ?>"/>
            <input name="so_luong"type="number" value="1" />
            <button type="submit" class="btnMua">Mua</button>
        </form>
    </div>
    <?php
    }
    echo "<div class='clear'></div>
    </div>
    </section>";

}
?>


<script>
    window.onload= function(){
        $('.btnMua').click(function (){
        alert('đã thêm vào giỏ hàng');
    })
    };

</script>
