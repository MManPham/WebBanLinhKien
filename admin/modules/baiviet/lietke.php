
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#them">Thêm bài viết</button>

<!–Thêm bài viết–>

<div class="modal fade" id="them" style="width:auto" role="dialog">
<div class="modal-dialog"  style="width:auto">

 <!-- Modal content-->
 <div class="modal-content" >
   <div class="modal-header">
   
     <h4 class="modal-title">Thêm bài viết</h4>
   </div>
   <div class="modal-body">
    

<form action="modules/baiviet/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">

<?php
$sql_loaisp="select * from loai_bai_viet ";
$stmt = $db->prepare($sql_loaisp);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$data = $stmt->fetchAll();

?>

<tr>
<td height="61">Loại bài viết</td>

<td><select name="loaibv">
<?php
   foreach($data as $loaibv){
?>
<option value="<?php echo $loaibv['ma_loai_bai_viet'] ?>"><?php echo $loaibv['ten_loai_bai_viet']?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td width="150px" height="37">Tên người đăng</td>
<td width="150px"><input type="text" name="tennguoidang" style="width:100%"></td>
</tr>
<tr>
<td height="42">Tittle</td>
<td><input type="text" name="tittle" style="width:100%"></td>
</tr>

<tr>
<td height="118">Nội dung tóm tắt</td>
<td><textarea rows="4" name="tomtat"></textarea></td>
</tr>

<tr>
<td height="118">Nội dung chi tiết</td>
<td><textarea rows="4" name="chitiet"></textarea></td>
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
   if(session_id() == '') {
    session_start();
}
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


$sql_trang="select * from bai_viet";
$sql="SELECT * FROM bai_viet,loai_bai_viet,nguoi_dung where bai_viet.ma_loai_bai_viet=loai_bai_viet.ma_loai_bai_viet and bai_viet.ma_nguoi_dung=nguoi_dung.ma_nguoi_dung  ORDER BY ma_bai_viet DESC LIMIT $trang,8";
$stmt = $db->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$data = $stmt->fetchAll();

$stmt2 = $db->query($sql_trang);
$total_rows= $stmt2->rowCount();


?>

<table class="table table-hover" width="100%" border="0">
<tr>
<td width="83"><div align="center">Tên loại bài viết</div></td>
<td width="77"><div align="center">Tên người đăng</div></td>
<td width="45"><div align="center">Tiêu đề</div></td>
<td width="72"><div align="center">Nội dung tóm tắt</div></td>
<td width="79"><div align="center">Ngày gửi bài</div></td>
<td width="82"><div align="center">Ngày xuất bản</div></td>
<td colspan="2"><div align="center">Quản lí</div></td>
</tr>
<?php
foreach($data as $bv)
{

?>
<tr>

<td><?php echo $bv['ten_loai_bai_viet']; ?></td>
<td><?php echo $bv['ho_ten'] ?></td>

<td><div align="center"><?php echo $bv['tieu_de'] ?></div></td>
<td><?php echo $bv['noi_dung_tom_tat']; ?></td>
<td><?php echo $bv['ngay_gui_bai']; ?></td>
<td><?php echo $bv['ngay_xuat_ban']; ?></td>
<td width="216"><div align="center">

<button type="button" name="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sua-<?php echo $bv['ma_bai_viet']?>">Sửa</button>


<div class="modal fade" id="sua-<?php echo $bv['ma_bai_viet']?>" style="width:auto"  role="dialog">
<div class="modal-dialog"  style="width:auto">

 <!-- Modal content-->
 <div class="modal-content" >
   <div class="modal-header">
   
     <h4 class="modal-title">Sửa bài viết</h4>
   </div>
   <div class="modal-body">
   

<form action="modules/baiviet/xuly.php?id=<?php echo $bv['ma_bai_viet']?>" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">

<?php
 $sql_loaisp="select * from loai_bai_viet";
$stmt = $db->prepare($sql_loaisp);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$data2 = $stmt->fetchAll();

?>
<tr>
<td height="61">Loại bài viết</td>

<td><select name="loaibv">
<?php
   foreach($data2 as $loaibv){
       if($bv['ma_loai_bai_viet']==$loaibv['ma_loai_bai_viet']){
?>
<option selected="selected" value="<?php echo $loaibv['ma_loai_bai_viet'] ?>"><?php echo $loaibv['ten_loai_bai_viet']?></option>
<?php }else{
   ?>
<option value="<?php echo $loaibv['ma_loai_bai_viet'] ?>"><?php echo $loaibv['ten_loai_bai_viet']?></option>
<?php
       }
}
?>
</select></td>
</tr>
<tr>
<td width="114" height="37">Tên người đăng</td>
<td width="210"><input type="text" name="tennguoidang" style="width:100%"
                   value="<?php echo $bv['ho_ten'] ?>"></td>
</tr>
<tr>
<td height="42">Tittle</td>
<td><input type="text" name="tittle" style="width:100%"
       value="<?php echo $bv['tieu_de'] ?>"></td>
</tr>

<tr>
<td height="118">Nội dung tóm tắt</td>
<td><textarea rows="4" name="tomtat"><?php echo $bv['noi_dung_tom_tat']?></textarea></td>
</tr>

<tr>
<td height="118">Nội dung chi tiết</td>
<td><textarea rows="4" name="chitiet"><?php echo $bv['noi_dung_chi_tiet']?></textarea></td>
</tr>
<tr>

<td height="43">Ngày gửi bài</td>
<td><input type="datetime" name="guibai" value="<?php echo $bv['ngay_gui_bai'] ?>" /></td>
</tr>

<tr>

<td height="43">Ngày xuất bản</td>
<td><input type="datetime" name="xuatban" value="<?php echo $bv['ngay_xuat_ban'] ?>" /></td>
</tr>

<tr>




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
<td width="56"><div align="center">
<a href="modules/baiviet/xuly.php?id=<?php echo $bv['ma_bai_viet']?>" onclick="return confirm('Bạn có muốn xóa bài viết này này?')"><button class="btn btn-info btn-lg">Xóa</button></a>
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
<li class="page-item"><a class="page-link" href="index.php?quanly=baiviet&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
<?php } ?>
<a class="page-link" href="#" >Next</a>
</ul>




<?php 
if(isset($_SESSION['error'])) { ?>
<div class="modal fade" id="modal" style="width:auto" role="dialog" data-show="true" aria-hidden="true">
       <div class="modal-dialog"  style="width:auto">

     <!-- Modal content-->
     <div class="modal-content" >
       <div class="modal-header">
       
         <h4 class="modal-title">Lỗi</h4>
       </div>
       <div class="modal-body">
       <?php echo $_SESSION['error'] ?>
       </div>
       <div class="modal-footer">

             <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
           </div>
          
         </div>
    
       </div>
     </div>
     
   <script>
       $(document).ready(function(){
           $('#modal').modal('show');
       
       }); 
   </script>

   <?php
   unset($_SESSION['error']);
}
   ?>

