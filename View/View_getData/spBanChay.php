﻿<?php
if(!isset($_REQUEST["ma_loai"]))
{
  $bangsp= mysql_query("SELECT * FROM san_pham order by ngay_tao desc  limit 0,16");
 
  echo"<section id='spBanChay' class='feildContent'>
      <h2>Sản Phẩm Bán Chạy</h2>  
      <div id='hienThiSPBC'>";
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
  </div>

<?php }
  echo "
  <div class='clear'></div>
  </div>
  </section>";
}?>
