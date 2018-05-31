<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#them">Thêm sản phẩm</button>


<!–Thêm sản phẩm–>

<div class="modal fade" id="them" style="width:auto" role="dialog">
  <div class="modal-dialog"  style="width:auto">
  
    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
      
        <h4 class="modal-title">Thêm sản phẩm</h4>
      </div>
      <div class="modal-body">
        <form action="modules/sanpham/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">

<tr>
  <td width="150px" height="37">Tên sản phẩm</td>
  <td width="150px"><input type="text" name="tensp" style="width:100%"></td>
</tr>
<tr>
  <td height="42">Giá</td>
  <td><input type="text" name="gia" style="width:100%"></td>
</tr>
<tr>
  <td height="43">Hình ảnh</td>
  <td><input type="file" name="hinhanh" ></td>
</tr>
<tr>
  <td height="118">Mô tả</td>
  <td><textarea rows="4" name="mota"></textarea></td>
</tr>
<?php
  $sql_loaisp="select * from loai_san_pham ";
$stmt = $db->prepare($sql_loaisp);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$data = $stmt->fetchAll();

?>
<tr>
  <td height="61">Loại sản phẩm</td>
  
  <td><select name="loaisp">
 <?php
  foreach($data as $loaisp){
  ?>
  <option value="<?php echo $loaisp['ma_loai'] ?>"><?php echo $loaisp['ten_loai']?></option>
  <?php
}
?>
  </select></td>
</tr>

</table>

      </div>
      <div class="modal-footer">
       <button name="them" id="them" value="Thêm" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
      </div>
      </form>  
    </div>

  </div>
</div>


<?php

include('conn.php');
if(isset($_GET['trang'])){
  $get_trang=$_GET['trang'];
}else{
  $get_trang='';
}

if($get_trang=='' || $get_trang==1){
  $trang=0;
}else{
  $trang=($get_trang*8)-8;
}	


$sql_trang="select * from san_pham";
$sql="SELECT * FROM `san_pham`,`loai_san_pham` WHERE `san_pham`.`ma_loai`=`loai_san_pham`.ma_loai Order by ma_san_pham DESC limit $trang,8";
$stmt = $db->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$data = $stmt->fetchAll();

$stmt2 = $db->query($sql_trang);
$total_rows= $stmt2->rowCount();


?>

<table class="table table-hover" width="100%" border="0">
<tr>
  <td width="51"><div align="center">ID</div></td>
  <td width="58"><div align="center">Tên sp</div></td>
  <td width="118"><div align="center">Loại sp</div></td>

  <td width="183"><div align="center">Hình ảnh</div></td>
  <td width="182"><div align="center">Mô tả</div></td>
  <td colspan="2"><div align="center">Quản lí</div></td>
</tr>
<?php
 foreach($data as $sp1)
{

?>
<tr>
  <td height="70"><?php echo $sp1['ma_san_pham']; ?></td>
  <td><?php echo $sp1['ten_san_pham']; ?></td>
  <td><?php echo $sp1['ten_loai']; ?></td>
  
  <td><div align="center"><img src="modules/sanpham/upload/<?php echo $sp1['hinh'];?>" class="img-thumbnail"></div></td>
  <td><?php echo $sp1['mo_ta_tom_tat']; ?></td>
  <td width="64"><div align="center">
  <button type="button" name="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sua-<?php echo $sp1['ma_san_pham']?>">Sửa</button>
  
  
  <div class="modal fade" id="sua-<?php echo $sp1['ma_san_pham']?>" style="width:auto"  role="dialog">
 <div class="modal-dialog"  style="width:auto">
  
    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
      
        <h4 class="modal-title">Sửa sản phẩm</h4>
      </div>
      <div class="modal-body">
       <?php
  $sql_chitietsp="select * from san_pham where ma_san_pham='$sp1[ma_san_pham]'";
  $stmt_sua = $db->prepare($sql_chitietsp);
  $stmt_sua->setFetchMode(PDO::FETCH_ASSOC);
  $stmt_sua->execute();
  $data_sua = $stmt_sua->fetchAll();
  foreach($data_sua as $sp_sua){
?>

<form action="modules/sanpham/xuly.php?id=<?php echo $sp_sua['ma_san_pham']?>" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">
  
  <tr>
  <td width="114" height="37">Tên sản phẩm</td>
  <td width="210"><input type="text" name="tensp" style="width:100%"
            value="<?php echo $sp_sua['ten_san_pham'] ?>"></td>
  </tr>
  <tr>
  <td height="42">Giá</td>
  <td><input type="text" name="gia" style="width:100%"
      value="<?php echo $sp_sua['don_gia']?>"></td>
  </tr>
  <tr>

  <td height="43">Hình ảnh</td>
  <td><input type="file" name="hinhanh" /><img src="modules/sanpham/upload/<?php echo $sp_sua['hinh'];?>" width="60" height="60"/></td>
  </tr>
  <tr>
  <td height="118">Mô tả</td>
  <td><textarea rows="4" style="width:100%" name="mota"><?php echo $sp_sua['mo_ta_tom_tat']?></textarea></td>
  </tr>
  <?php
  $sql_loaisp="select * from loai_san_pham";
  $stmt_loaisp = $db->prepare($sql_loaisp);
  $stmt_loaisp->setFetchMode(PDO::FETCH_ASSOC);
  $stmt_loaisp->execute();
  $data2 = $stmt_loaisp->fetchAll();
  
  ?>
  <tr>
  <td height="61">Loại sản phẩm</td>
  
  <td><select name="loaisp">
  <?php
    foreach($data2 as $loaisp){
      if($sp_sua['ma_loai']==$loaisp['ma_loai']){
  ?>
  <option selected="selected" value="<?php echo $loaisp['ma_loai'] ?>"><?php echo $loaisp['ten_loai']?></option>
  <?php }else{
    ?>
  <option value="<?php echo $loaisp['ma_loai'] ?>"><?php echo $loaisp['ten_loai']?></option>
  <?php
      }
  }
?>
  </select></td>
</tr>
 <?php } ?>
</table>
      </div>
      <div class="modal-footer">
       <button name="sua" id="sua" value="Sửa" class="btn btn-primary">Sửa</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
      </div>
       </form>  

    </div>
 
  </div>
</div>
  </div></td>
  <td width="75"><div align="center">
  <a  href="modules/sanpham/xuly.php?id=<?php echo $sp1['ma_san_pham']?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"><button  class="btn btn-info btn-lg" >Xóa</button></a>
  </div></td>
  
</tr>


 
<?php
}
?>
</table>



<ul class="pagination justify-content-end sanpham">
  <li class="page-item disabled">
    <a class="page-link" href="#" tabindex="-1">Previous</a>
  </li>

   <?php
   
    $dem=ceil($total_rows/15);
    for($i=1;$i<=$dem;$i++){
    
   ?>
  <li class="page-item"><a class="page-link" href="index.php?quanly=sanpham&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
  <?php } ?>
<a class="page-link" href="#" >Next</a>
  </ul>


 
  


