<?php 
$tongTien=0;
if(isset($_REQUEST['dat_hang']))
{
    $tongTien=0;
}
else
{
    $giohang= mysqli_query($connect,"SELECT * FROM ct_hoa_don where so_hoa_don  = 0 ");
    while( $row = mysqli_fetch_assoc($giohang))
    {
        $tongTien = $tongTien+ ($row['don_gia'] * $row['so_luong']);
    }
}    
    echo " <div style='padding-left: 10px; padding-bottom: 10px;'>";
    echo "  <div>Số tiền: <span id='soTien'>".$tongTien."đ</span></div> <br />";
    echo "  <a href='gio_hang.php?xem_gio_hang'>Xem giỏ hàng</a><br />";
    echo "  <a href='gio_hang.php?thanh_toan'>Thanh toán</a>";
    echo "</div>";
?>
    