<?php

if(isset($_REQUEST["ma_sp_xoa"]))
{
    mysql_query("DELETE  FROM ct_hoa_don where ma_san_pham =".$_REQUEST["ma_sp_xoa"]);
}
?>