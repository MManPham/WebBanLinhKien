window.onload= function () {
    //Cập Nhật
    $('.btnCN').click(function () {
        $SL = $(this).parent().parent().children().eq(1).children().val();
        $maSP = $(this).attr('id');
        window.location.href = "gio_hang.php?xem_gio_hang&ma_sp_capnhat="+$maSP+"&soluong="+$SL;
    });

    //Thanh Toán
    $('#btnThanhToan').click(function () {
        let gt;
        let hoten =$('#hoten').val();
        let diachi=$('#diachi').val();
        let sdt = $('#sdt').val();
        //get value radio
        if( $('input[type="radio"]:checked').val()==='Nam')
        gt=0;
        else gt = 1;

        if(hoten&&diachi&&sdt)
        {
            if( $('#email').val().indexOf('@')<0)
            {
                alert('Email chưa hợp lệ');
            }
            else
            {
                let TTLH = {
                    GioiTinh : gt,
                    HoTen : hoten,
                    SDT : sdt,
                    DiaChi: diachi,
                    Email : $('#email').val(),
                    NgaySinh: $('#ngaySinh').val() ,
                    TongTien:$('#soTien').text(),
                   };
               var str = jQuery.param(TTLH);
               $('#soTien').text('0đ');
               window.location.href = "gio_hang.php?thanh_toan&dat_hang&"+str;
            }
        }
        else 
        {
            alert('có thông tin bắt buộc chưa được nhập');
        }

});
}