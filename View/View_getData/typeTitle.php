<?php 
                        $bspMaLoaiCha= mysqli_query($connect,"SELECT * FROM  loai_san_pham where ma_loai_cha=0 ");
                    while( $rowCha = mysqli_fetch_assoc($bspMaLoaiCha))
                    {
				?>
                   <li class ="titleProduct"><?php echo $rowCha["ten_loai"] ?></li>
                      <ul class="ListProduct">
                      
                    <?php 
                    $bspMaLoaiCon= mysqli_query($connect,'SELECT * FROM  loai_san_pham where ma_loai_cha='.$rowCha["ma_loai"]);
                    while( $rowCon = mysqli_fetch_assoc($bspMaLoaiCon))
                    {
                     ?>
                                <li><a href='index.php?ma_loai=<?php echo $rowCon["ma_loai"] ?>&ten_loai=<?php echo $rowCon["ten_loai"] ?>'> 
                                <?php echo $rowCon["ten_loai"] ?>
                                </a></li>
                        
                   <?php
                  }
                    echo "</ul>";
                    }
                   ?>

<script>
 $('.ListProduct').hide();
  $('.titleProduct').click(function () {
    $(this).next().slideToggle(500);
});
</script>

 