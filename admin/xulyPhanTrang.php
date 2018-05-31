<?php 
if(isset($_GET["trang"]))
{
  $trang = $_GET["trang"];
  ?>
    <script>
      let a = '<?php echo $trang; ?>';
     $('.pagination .page-item').each(function () {
      $(this).removeClass('active');
      if($(this).text()===a)
        $(this).addClass('active');
     });
      
    </script>
  <?php
}
else
{
  ?>
    <script>
     $('.pagination .page-item').each(function () {
      if($(this).text()=== '1' )
        $(this).addClass('active');
     });
      
    </script>
  <?php
}
?>