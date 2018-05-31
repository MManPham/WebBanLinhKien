
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#them">Thêm loại sản phẩm</button>

<!–Thêm sản phẩm–>

<div class="modal fade" id="them" style="width:auto" role="dialog">
 <div class="modal-dialog"  style="width:auto">
 
   <!-- Modal content-->
   <div class="modal-content" >
     <div class="modal-header">
     
       <h4 class="modal-title">Thêm loại sản phẩm</h4>
     </div>
     <div class="modal-body">
      
<form action="modules/loaisanpham/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">

 <td width="150px" height="37">Tên loại</td>
 <td width="150px"><input type="text" name="tenloaisp" style="width:100%"></td>
</tr>
<tr>
 <td height="42">Mã loại cha</td>
 <td><input type="text" name="maloaicha" style="width:100%"></td>
</tr>
<tr>
 <td height="43">Hình ảnh</td>
 <td><input type="file" name="hinhanh" ></td>
</tr>
<tr>
 <td height="118">Mô tả</td>
 <td><textarea rows="4" name="mota"></textarea></td>
</tr>

<tr>
 <td height="121" colspan="2"><div align="center">
 <button name="them" id="them" value="Thêm" class="btn btn-primary">Thêm</button>
 </div></td>
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


$sql_trang="select * from loai_san_pham";
$sql="SELECT * FROM `loai_san_pham` ORDER BY ma_loai DESC LIMIT $trang,8";
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
 <td width="116"><div align="center">Tên loại sp</div></td>
 <td width="170"><div align="center">Tên loại cha</div></td>

 <td width="73"><div align="center">Hình ảnh</div></td>
 <td width="182"><div align="center">Mô tả</div></td>
 <td colspan="2"><div align="center">Quản lí</div></td>
</tr>
<?php
foreach($data as $loaisp)
{

?>
<tr>
 <td height="70"><div align="center"><?php echo $loaisp['ma_loai']; ?></div></td>
 <td><div align="center"><?php echo $loaisp['ten_loai']; ?></div></td>
 <?php if($loaisp['ma_loai_cha']!=0){ ?>
 <td><div align="center">
 <?php 
     $sql_loaicha="select * from loai_san_pham";
     $stmt_loaicha = $db->prepare($sql_loaicha);
     $stmt_loaicha->setFetchMode(PDO::FETCH_ASSOC);
     $stmt_loaicha->execute();
     $data_loaicha = $stmt_loaicha->fetchAll();
     foreach($data_loaicha as $loaicha){
       if($loaisp['ma_loai_cha']==$loaicha['ma_loai']){
         
         echo $loaicha['ten_loai'];
       }
     }
?>
 </div></td>
 
 <td><div align="center"></div></td>
 <?php
 }else{ ?>
 <td><div align="center"> </div></td>
      <td><div align="center"><img src="modules/loaisanpham/upload/<?php echo $loaisp['hinh_loaisp'];?>" class="img-thumbnail"></div></td>
<?php 
}

  ?>
 <td><div align="center"><?php echo $loaisp['mo_ta']; ?></div></td>
 <td width="64"><div align="center">
 <button type="button" name="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sua-<?php echo $loaisp['ma_loai']?>">Sửa</button>
 
<div class="modal fade" id="sua-<?php echo $loaisp['ma_loai']?>" style="width:auto"  role="dialog">
  <div class="modal-dialog"  style="width:auto">
 
   <!-- Modal content-->
   <div class="modal-content" >
     <div class="modal-header">    
       <h4 class="modal-title">Sửa loại sản phẩm</h4>
     </div>
     <div class="modal-body">
 
<form action="modules/loaisanpham/xuly.php?id=<?php echo $loaisp['ma_loai']?>" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">

<tr>
 <td width="114" height="37">Tên loại</td>
 <td width="210"><input type="text" name="tenloaisp" style="width:100%"
           value="<?php echo $loaisp['ten_loai'] ?>"></td>
</tr>
<tr>
 <td height="42">Mã loại cha</td>
 <td><input type="text" name="maloaicha" style="width:100%"
     value="<?php echo $loaisp['ma_loai_cha']?>"></td>
</tr>
<tr>

 <td height="43">Hình ảnh</td>
 <td><input type="file" name="hinhanh" /><img src="modules/loaisanpham/upload/<?php echo $loaisp['hinh_loaisp'];?>" width="60" height="60"/></td>
</tr>
<tr>
 <td height="118">Mô tả</td>
 <td><textarea rows="4" name="mota"><?php echo $loaisp['mo_ta']?></textarea></td>
</tr>

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
 <td width="75"><div align="center"><a href="modules/loaisanpham/xuly.php?id=<?php echo $loaisp['ma_loai']?>" onclick="return confirm('Bạn có muốn xóa loại sản phẩm này?')"><button class="btn btn-info btn-lg" >Xóa</button></a>
 </div></td>
</tr>
<?php
}
?>
</table>

<ul class="pagination justify-content-end">
 <li class="page-item disabled">
   <a class="page-link" href="#" tabindex="-1">Previous</a>
 </li>
  
  <?php
   $dem=ceil($total_rows/8);
   for($i=1;$i<=$dem;$i++){
   
  ?>
 <li class="page-item"><a class="page-link" href="index.php?quanly=loaisp&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
 <?php } ?>
  <a class="page-link" href="#" >Next</a>
 </ul>
 
 