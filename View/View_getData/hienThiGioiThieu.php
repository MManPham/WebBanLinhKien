<?php 
    $gioiThieu= mysql_query("SELECT * FROM bai_viet where tieu_de = 'Giới thiệu về công ty' ");
    while( $row = mysql_fetch_assoc($gioiThieu))
    {
    ?>

    <h2> <?php echo $row['tieu_de']?> </h2>

    <div id="noidung" style="padding-left:10px;">
        <?php echo $row['noi_dung_chi_tiet']?>

    </div>
    <?php }
?>
