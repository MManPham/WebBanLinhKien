<?php 
if(!isset($_REQUEST["ma_bai_viet"])) {
    $tinTuc= mysqli_query($connect,"SELECT * FROM bai_viet where 	ma_loai_bai_viet >0 ");
    echo '<h2> Tin Tức </h2>';
    while( $row = mysqli_fetch_assoc($tinTuc))
    {
    ?>

    <div  style="padding-left:10px;">
        
        <h3> <a href='tin_tuc.php?ma_bai_viet= <?php echo $row["ma_bai_viet"] ?>' style="margin-bottom:10px" >
            <?php echo $row['tieu_de']?> 
        </a>
        </h3>
        <div id ="noiDungTinTuc" style ="margin-top:-15px"> <?php echo $row["noi_dung_tom_tat"] ?>
         </div>

   
    </div>
    <hr/>
    <?php }
}
else
{
    $maBV= $_REQUEST["ma_bai_viet"];
    $tinTuc= mysqli_query($connect,"SELECT * FROM bai_viet where 	ma_bai_viet = ".$maBV);
    while( $row = mysqli_fetch_assoc($tinTuc))
    {
    ?>

    <div  style="padding-left:10px;">
        
        <h2 style="margin-bottom:10px" >
            <?php echo $row['tieu_de']?> 
        </h2>
        <div id ="noiDungBaiViet"> <?php echo $row["noi_dung_chi_tiet"] ?>
         </div>

   
    </div>
    <hr/>
    <?php }
}

?>




