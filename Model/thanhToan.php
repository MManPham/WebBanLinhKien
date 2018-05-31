<?php
    if(isset($_REQUEST["dat_hang"]))
    {
        //Them Khach Hang
        $tenKH = $_REQUEST['HoTen'];
        $phai = $_REQUEST['GioiTinh'];
        $ngaySinh = $_REQUEST['NgaySinh'];
        $diaChi = $_REQUEST['DiaChi'];
        $SDT = $_REQUEST['SDT'];
        $email = $_REQUEST['Email'];
        $KH_moi = mysqli_query($connect,"INSERT INTO  khach_hang(ten_khach_hang,phai,ngay_sinh, dia_chi, dien_thoai, email) 
                    VALUES('$tenKH', '$phai','$ngaySinh','$diaChi','$SDT','$email')") ;
        
        //Them hoa don
        $TongTien=$_REQUEST['TongTien'];
        $ma_KH=mysqli_insert_id($connect);
        $ngayHd =date("Y-m-d");
        mysqli_query($connect,"INSERT INTO  hoa_don(ngay_hd,ma_khach_hang,tri_gia) 
                    VALUES('$ngayHd' ,'$ma_KH','$TongTien')") ;

        $soHD = mysqli_insert_id($connect);
        mysqli_query($connect,"UPDATE ct_hoa_don SET so_hoa_don = ".$soHD." where so_hoa_don = 0");
        echo "<h1>Bạn đã thanh toán thành công</h1>";
    }
    else 
    {       
        $timsanpham = mysqli_query ( $connect,"SELECT * FROM ct_hoa_don where so_hoa_don= 0");  
        if(mysqli_num_rows($timsanpham)==0)
        {
            echo "<h1>Chưa có sản phẩm nào trong giỏ hàng của bạn</h1>";
        }
        else
        {
            ?>
            <h2>Thanh Toán</h2>
            <table id="tableCheckOut" border="1" cellspadding="0" cellspacing="0">
                <tr  class ="nameCol" style='background-color:#3A6076'>
                    <td colspan ='2' ><h3  style="color:white" >Thông tin liên hệ của bạn</h3> </td>
                </tr>  
                <tr class="rowHang" >
                    <td class='titleText'>Họ và Tên: <span style="color:red">(*)</span></td>
                    <td ><input class="textinput" id='hoten'   type="text" ></td>
                </tr>
                <tr class="rowHang" >
                    <td class='titleText'>Số điện thoại: <span style="color:red">(*)</span></td>
                    <td ><input class="textinput" id='sdt'  type="number" ></td>
                </tr>
                <tr class="rowHang" >
                    <td class='titleText'>Địa chỉ:<span style="color:red">(*)</span></td>
                    <td ><input class="textinput" id ='diachi'  type="text" ></td>
                </tr>
                <tr class="rowHang" >
                    <td class='titleText'>Email:</td>
                    <td ><input class="textinput" id='email'  type="email"  value="<?php echo $row['so_luong']?>"></td>
                </tr>
                <tr class="rowHang" >
                    <td class='titleText'>Giới Tính:</td>
                    <td >
                    Nam: <input type="radio" id='nam' name="gender" value="Nam">
                    Nữ:<input type="radio" id='nu' name="gender" value="Nữ">
                    </td>
                </tr>
                <tr class="rowHang" >
                    <td class='titleText'>Ngày Sinh:</td>
                    <td ><input class="textinput" id="ngaySinh" type="date" ></td>
                </tr>
                <tr class="rowHang" >
                    <td colspan="2" style='text-align:center'>
                    <button class="btn"onclick="window.location.href='san_pham.php'">< Tiếp tục mua hàng </button>
                    <button id="btnThanhToan" class="btn" type="button" >Đặt Hàng ></button>
                    </td>
                </tr>
                <tr class="rowHang" >
                    <td colspan="2" style='text-align:center'>
                    <span style="color:red">(*)</span>: bắt buộc nhập.</br>
                    Phương thức thanh toán:<span style="color:red"> Trả tiền khi nhận được hàng.</span> </br>
                    </td>
                </tr>
        </table>
        <?php
        } 
    }
?>