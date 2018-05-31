<?php
	include('../../conn.php');

	@$id=$_GET['id'];
	if(isset($_POST['them'])){
		//them
	$loaibv=$_POST['loaibv'];
	$tennguoidang=$_POST['tennguoidang'];
	$tittle=$_POST['tittle'];
	$tomtat=$_POST['tomtat'];
	$chitiet=$_POST['chitiet'];
	$sql_temp="SELECT * FROM `nguoi_dung`";
	$stmt_temp = $db->prepare($sql_temp);
	$stmt_temp->setFetchMode(PDO::FETCH_ASSOC);
	$stmt_temp->execute();
	$data_temp = $stmt_temp->fetchAll();
	$find=true;
	$manguoidung="";
	foreach($data_temp as $user){
		if($tennguoidang==$user['ho_ten']){
			$manguoidung=$user['ma_nguoi_dung'];
				$find=true;
			break;
		}
		$find=false;	
	}


	$today = date("Y-m-d H:i:s");
	if($find==false){
		$_session['error']="Không tồn tại user";
		header('location:../../index.php?quanly=baiviet');
	}else{

		$sql="INSERT INTO `bai_viet`(`ma_loai_bai_viet`, `ma_nguoi_dung`, `tieu_de`, `noi_dung_tom_tat`, `noi_dung_chi_tiet`, `ngay_gui_bai`, `ngay_xuat_ban`) VALUES ('$loaibv','$manguoidung','$tittle','$tomtat','$chitiet','$today','$today')";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		header('location:../../index.php?quanly=baiviet');}
	}elseif(isset($_POST['sua'])){
		//sua
	$loaibv=$_POST['loaibv'];
	$tennguoidang=$_POST['tennguoidang'];
	$tittle=$_POST['tittle'];
	$tomtat=$_POST['tomtat'];
	$chitiet=$_POST['chitiet'];
	$ngay_guibai=$_POST['guibai'];
	$ngay_xuatban=$_POST['xuatban'];
	$ngay_hethan=$_POST['hethan'];
	$sql_temp="SELECT * FROM `nguoi_dung` WHERE";
	$stmt_temp = $db->prepare($sql_temp);
	$stmt_temp->setFetchMode(PDO::FETCH_ASSOC);
	$stmt_temp->execute();
	$data_temp = $stmt_temp->fetchAll();
	$find=true;
		$manguoidung="";
	foreach($data_temp as $user){
		if($tennguoidang==$user['ho_ten']){
			$manguoidung=$user['ma_nguoi_dung'];
				$find=true;
			break;
		}
		$find=false;	
	}


	$today = date("Y-m-d H:i:s");
	$sql="UPDATE `bai_viet` SET `ma_loai_bai_viet`='$loaibv',`ma_nguoi_dung`='$manguoidung',`tieu_de`='$tittle',`noi_dung_tom_tat`='$tomtat',`noi_dung_chi_tiet`='$chitiet',`ngay_gui_bai`='$ngay_guibai',`ngay_xuat_ban`='$ngay_xuatban',`ngay_het_han`='$ngay_hethan' WHERE  ma_bai_viet='$id'";
		
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		header('location:../../index.php?quanly=baiviet&id='.$id);
	}else{
		//xoa
		$sql="delete from bai_viet where ma_bai_viet='$id'";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		header('location:../../index.php?quanly=baiviet');
	}
?>