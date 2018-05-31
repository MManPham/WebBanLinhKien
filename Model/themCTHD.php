<?php 
if(isset($_REQUEST["ma_sp_mua"]))
{   
    $timsanpham = mysqli_query($connect,"SELECT * FROM ct_hoa_don where so_hoa_don =0 and ma_san_pham= ".$_REQUEST["ma_sp_mua"] );
    
    if(mysqli_num_rows($timsanpham) ==0)
    {
        $sanpham= mysqli_query($connect,"SELECT * FROM san_pham where ma_san_pham= ".$_REQUEST["ma_sp_mua"]);
        while( $row = mysqli_fetch_assoc($sanpham))
        {   
            $maSP = $_REQUEST["ma_sp_mua"];
            $donGia= $row["don_gia"];
            $soLuong=$_REQUEST["so_luong"];
            
            mysqli_query($connect,"INSERT INTO  ct_hoa_don(so_hoa_don,ma_san_pham,so_luong, don_gia) VALUES(0, '$maSP','$soLuong','$donGia')");
        }
    }
    else
    {   
        $row2= mysqli_fetch_assoc($timsanpham);
        $tongSP = $row2['so_luong']+$_REQUEST["so_luong"];
        mysqli_query($connect,"UPDATE ct_hoa_don SET so_luong = ". $tongSP ." where ma_san_pham = ".$_REQUEST["ma_sp_mua"] );
    }

}