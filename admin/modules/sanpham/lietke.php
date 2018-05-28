

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
 	foreach($data as $sp)
	{

	?>
  <tr>
    <td height="70"><?php echo $sp['ma_san_pham']; ?></td>
    <td><?php echo $sp['ten_san_pham']; ?></td>
    <td><?php echo $sp['ten_loai']; ?></td>
    
    <td><div align="center"><img src="modules/sanpham/upload/<?php echo $sp['hinh'];?>" class="img-thumbnail"></div></td>
    <td><?php echo $sp['mo_ta_tom_tat']; ?></td>
    <td width="64"><div align="center">
   <form method="post" enctype="multipart/form-data">
    <button type="button" name="submit" class="btn btn-info btn-lg ChangInfo" data-toggle="modal"  data-target="#sua-modal-<?php echo $sp['ma_san_pham']?>">Sửa</button>
    <input type="text" name="bienphp" id="bienphp" value="<?php echo $sp['ma_san_pham']?>" /> 
	<a   href="index.php?quanly=sanpham&event=sua&trang=<?php echo $get_trang;?>&id=<?php echo $sp['ma_san_pham']?>"  >Sửa</a>
    
    
    </form>
    </div></td>
    <td width="75"><div align="center">
    <a  href="modules/sanpham/xuly.php?id=<?php echo $sp['ma_san_pham']?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
    </div></td>

    <!–-sua sản phẩm -–>

    <div class="modal fade" id="sua-modal-<?php echo $sp['ma_san_pham']?>" style="width:auto" role="dialog">
  <div class="modal-dialog"  style="width:auto">
    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title">Sửa sản phẩm</h4>
      </div>
      <div class="modal-body">
     <?php
     if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
       
       $_SESSION['error'] = "Thanks for your message!";
       header("HTTP/1.1 303 See Other");
       die("redirecting");
     }
     if ( isset($_SESSION['error']) )
     {
          print "The result of your submission: ".$_SESSION['error'];
          unset($_SESSION['error']);
     } 

      $sql_chitietsp="select * from san_pham where ma_san_pham='$_POST[bienphp]'";
      $stmt = $db->prepare($sql_chitietsp);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $data1 = $stmt->fetchAll();
      ?>

     
      </div>
      <div class="modal-footer">
       <button name="sua" id="sua" value="Sua" class="btn btn-primary">Sua</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
      </div>
       </form>  
    </div>
 
  </div>
</div>

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
    <li class="page-item"><a class="page-link" href="index.php?quanly=sanpham&event=them&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php } ?>
 <a class="page-link" href="#" >Next</a>
    </ul>
    
    
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#them-modal">Thêm sản phẩm</button>


 

  <!–Thêm sản phẩm–>

  <div class="modal fade" id="them-modal" style="width:auto" role="dialog">
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
    <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
  </tr>
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




<!–-sua sản phẩm -–>

