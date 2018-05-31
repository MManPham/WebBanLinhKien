<?php

if(!empty($_REQUEST["ma_sp_capnhat"]))
{
    mysqli_query($connect,"UPDATE ct_hoa_don SET so_luong = ".$_REQUEST["soluong"]." where ma_san_pham = ".$_REQUEST["ma_sp_capnhat"] );
}
?>