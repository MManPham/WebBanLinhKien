<?php 
    $gioiThieu= mysqli_query($connect,"SELECT * FROM bai_viet where tieu_de = 'Giới thiệu về công ty' ");
    while( $row = mysqli_fetch_assoc($gioiThieu))
    {
    ?>

    <h2> <?php echo $row['tieu_de']?> </h2>

    <div id="noidung" style="padding-left:10px;">
        <?php echo $row['noi_dung_chi_tiet']?>

    </div>
    <?php }
?>
