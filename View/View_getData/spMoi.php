<?php 
if(!isset($_REQUEST["ma_loai"]))
{
    $bangsp= mysqli_query($connect,"SELECT * FROM san_pham where  san_pham_moi = 1");
    echo" <section id='spBanMoi' class='feildContent'>
          <h2>Sản Phẩm Mới</h2>
          <div id='hienThiSPMoi'>";
    while( $row = mysqli_fetch_assoc($bangsp))
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
    <?php
    }
    echo "<div class='clear'></div>
    </div>
    </section>";
}
else
{
  $bangsp= mysqli_query($connect,"SELECT * FROM san_pham where ma_loai= ".$_REQUEST["ma_loai"]);
  echo" <section id='spBanMoi' class='feildContent'>
          <h2>".$_REQUEST["ten_loai"]."</h2>
          <div id='hienThiSPMoi'>";
    while( $row = mysqli_fetch_assoc($bangsp))
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
    <?php
    }
    echo "<div class='clear'></div>
    </div>
    </section>";
}
?>

