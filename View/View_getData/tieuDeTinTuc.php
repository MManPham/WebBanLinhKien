<?php 
    $gioiThieu= mysqli_query($connect,"SELECT * FROM bai_viet where 	ma_loai_bai_viet >0 ");
    while( $row = mysqli_fetch_assoc($gioiThieu))
    {
    ?>
<p>
    <a href='tin_tuc.php?ma_bai_viet= <?php echo $row["ma_bai_viet"] ?>' style="margin-bottom:10px" >
         <?php echo $row['tieu_de']?> 
    </a>
    </p>
    <?php }
?>
