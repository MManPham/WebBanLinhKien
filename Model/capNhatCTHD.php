<?php

if(!empty($_REQUEST["ma_sp_capnhat"]))
{
    mysql_query("UPDATE ct_hoa_don SET so_luong = ".$_REQUEST["soluong"]." where ma_san_pham = ".$_REQUEST["ma_sp_capnhat"] );
}
?>