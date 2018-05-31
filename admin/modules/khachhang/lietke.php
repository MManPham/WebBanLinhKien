
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#them">Thêm khách hàng</button>

	 <!–Thêm sản phẩm–>

  <div class="modal fade" id="them" style="width:auto" role="dialog">
    <div class="modal-dialog"  style="width:auto">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
        
          <h4 class="modal-title">Thêm khách hàng</h4>
        </div>
        <div class="modal-body">
         
<form action="modules/khachhang/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" style="border-collapse:collapse">
 
  <tr>
    <td width="150px" height="37">Tên khách hàng</td>
    <td width="150px"><input type="text" name="tenkh" style="width:100%"></td>
  </tr>
  <tr>
    <td height="42">Giới tính</td>
    <td><input type="text" name="gt" style="width:100%"></td>
  </tr>
  <tr>
    <td height="43">Ngày sinh</td>
    <td><input type="date" name="ngaysinh" ></td>
  </tr>
  <tr>
    <td height="118">Địa chỉ</td>
    <td><textarea rows="4" name="diachi"></textarea></td>
  </tr>
  
  <tr>
    <td height="50">Điện thoại</td>
    <td><input type="text" name="dt"/></td>
  </tr>
  
  <tr>
    <td height="50">Email</td>
    <td><input type="email" name="email" /></td>
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
	

	$sql_trang="select * from khach_hang";
	$sql="SELECT * FROM `khach_hang` ORDER BY ma_khach_hang DESC LIMIT $trang,8";
	$stmt = $db->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$data = $stmt->fetchAll();
	
	$stmt2 = $db->query($sql_trang);
	$total_rows= $stmt2->rowCount();
	
	
?>

<table class="table table-hover" width="100%" border="0">
  <tr>
    <td width="123"><div align="center">Tên khách hàng</div></td>
    <td width="78"><div align="center">Giới tính</div></td>

    <td width="100"><div align="center">Ngày sinh</div></td>
    <td width="109"><div align="center">Địa chỉ</div></td>
    <td width="115"><div align="center">Điện thoại</div></td>
    <td width="93"><div align="center">Email</div></td>
    <td colspan="2"><div align="center">Quản lí</div></td>
  </tr>
  <?php
 	foreach($data as $kh)
	{

	?>
  <tr>

    <td><?php echo $kh['ten_khach_hang']; ?></td>
    <td><?php if($kh['phai']==1)
				echo "Nữ";
				else echo "Nam"; ?></td>
    
    <td><div align="center"><?php echo $kh['ngay_sinh'] ?></div></td>
    <td><?php echo $kh['dia_chi']; ?></td>
    <td><?php echo $kh['dien_thoai']; ?></td>
     <td><?php echo $kh['email']; ?></td>
    <td width="48"><div align="center">
   
	 <button type="button" name="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sua-<?php echo $kh['ma_khach_hang']?>">Sửa</button>
    
     <div class="modal fade" id="sua-<?php echo $kh['ma_khach_hang']?>" style="width:auto"  role="dialog">
   	<div class="modal-dialog"  style="width:auto">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">    
          <h4 class="modal-title">Sửa thông tin khách hàng</h4>
        </div>
        <div class="modal-body">        
        <form action="modules/khachhang/xuly.php?id=<?php echo $kh['ma_khach_hang']?>" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" style="border-collapse:collapse">
          <tr>
            <td width="114" height="37">Tên khách hàng</td>
            <td width="210"><input type="text" name="tenkh" style="width:100%"
                                value="<?php echo $kh['ten_khach_hang'] ?>"></td>
          </tr>
          <tr>
            <td height="42">Giới tính</td>
            <td><input type="text" name="gt" style="width:100%"
                    value="<?php if($kh['phai']==1)
                        echo "Nữ";
                        else echo "Nam"; ?>"></td>
          </tr>
          <tr>
        
            <td height="43">Ngày sinh</td>
            <td><input type="date" name="ngaysinh" value="<?php echo $kh['ngay_sinh'] ?>" /></td>
          </tr>
          <tr>
            <td height="118">Địa chỉ</td>
            <td><textarea rows="4" name="diachi"><?php echo $kh['dia_chi']?></textarea></td>
          </tr>
           <tr>
            <td height="118">Điện thoại</td>
            <td><input type="tel" name="dt" value="<?php echo $kh['dien_thoai']?>" /></td>
          </tr>
           <tr>
            <td height="118">Email</td>
            <td><input type="email" name="email" value="<?php echo $kh['email']?>"  /></td>
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
    <td width="61"><div align="center">
    <a href="modules/khachhang/xuly.php?id=<?php echo $kh['ma_khach_hang']?>" onclick="return confirm('Bạn có muốn xóa khách hàng này?')"><button class="btn btn-info btn-lg" >Xóa</button></a>
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
    
    
    
    