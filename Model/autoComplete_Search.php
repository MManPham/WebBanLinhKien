<script>

        // body...
        var ListSP =[];
        var ListTenSP =[];
        var SP={
            TenSP:"",
            MaSP:"",
        }
        <?php
          $sql= mysql_query("SELECT * FROM san_pham ");
            while( $row = mysql_fetch_assoc($sql))
            {
         ?>     
                SP = {
                    TenSP:'<?php echo $row["ten_san_pham"];?>',
                    MaSP:'<?php echo $row["ma_san_pham"];?>'
                }

                 ListSP.push(SP);
                 ListTenSP.push(SP.TenSP);

        <?php }
         ?>
$(document).ready(function () {
    $('#btnSearch').click(function () {
        let name = $('#textSearch').val();
        var dem=0;
        ListSP.forEach(function (item) {
            if(name === item.TenSP)
            {   dem++;
                $(location).attr('href','san_pham.php?ma_san_pham='+item.MaSP);   
            }
        })
        if(dem===0) alert('không có sản phẩm cần tìm ');
    })
    $('#textSearch').keypress(function(e){
                     $('#textSearch').autocomplete(
                     {
                         source:  ListTenSP,
                     });

                     if(e.which == 13 || e.keyCode == 13)
                     {  
                        $('#btnSearch').click();
                     }
                });
    })


</script>