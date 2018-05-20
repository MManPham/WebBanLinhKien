<?php
if(isset($_REQUEST["xem_gio_hang"]))
{
    $timsanpham = mysql_query("SELECT * FROM ct_hoa_don where so_hoa_don= 0");  
    if(mysql_num_rows($timsanpham)==0)
    {
        echo "<h1>Chưa có sản phẩm trong giỏ hàng</h1>";
    }
    else{

        ?>
        <h2>Giỏ hàng của bạn </h2>
        <table border="0" cellspadding="0" cellspacing="0">
        <tr class ="nameCol">
            <td ><h4>Tên Sản Phẩm</h4> </td>
            <td> <h4>Số lượng</h4></td>
            <td><h4>Đơn giá</h4></td>
            <td><h4>Thành Tiền</h4></td>
            <td ></td>
        </tr>
        <?php

        $bangsp= mysql_query("SELECT * FROM ct_hoa_don where so_hoa_don = 0");
        while( $row = mysql_fetch_assoc($bangsp))
        {
        $hinh =mysql_query("SELECT * FROM san_pham where ma_san_pham = ".$row["ma_san_pham"]) or die(mysql_error());
        $row2= mysql_fetch_assoc($hinh);
        ?>  
        <tr class="rowHang" >
            <td class="tenSP" style="padding:10px" >
                <img src="images/san_pham/<?php echo $row2['hinh']?>" alt=""> 
                <a href="san_pham.php?ma_san_pham=<?php echo $row2["ma_san_pham"]?>"><?php echo $row2['ten_san_pham']?> </a>    
            </td>
            <td ><input class="dongia" type="number" value="<?php echo $row['so_luong']?>"></td>
            <td ><?php echo $row['don_gia']?></td>
            <td><?php echo $row['don_gia'] * $row['so_luong']  ?></td>

            <td >
                <a id="<?php echo $row2["ma_san_pham"]?>" class="btnCN" href="#">CN</a>
                <a class="Xoa" href="gio_hang.php?xem_gio_hang&ma_sp_xoa=<?php echo $row2["ma_san_pham"]?>">Xóa</a>
            </td>   
            
        </tr>

        <?php 
        }?>
        <tr class="chucNang" >
            <td colspan ='2'  ><button class="btn" onclick="window.location.href='san_pham.php'" > < Tiếp Tục mua Hàng</button></td>
            <td colspan ='1'  > <h4>Tổng tiền</h4></td>
            <td><h4  id="TongGia"></h4></td>
            <td  ><button class="btn" style="width: 105px;" onclick="window.location.href='?thanh_toan'">Thanh Toán ></button></td>
            
        </tr>
        </table>   
        <?php 
        }
}
else if(isset($_REQUEST["thanh_toan"]))
{
    include_once('Model/thanhToan.php');

}
?>    

