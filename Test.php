 <?php
include_once("Header.class.php");
include_once("Footer.class.php");

?>


<?= Header::NewHeader() ?>
<div class="container">
  <form action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" name="userfile" value="table"/>
    <input type="submit" name="submit" value="Importer" class=" btn "/ >
  </form>
</div>
