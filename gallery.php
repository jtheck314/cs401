<?php $pageName = "galleries"; ?>
<?php require_once "header.php"; ?>
<?php 
session_start();
require_once "renderGallery.php"; ?>

<div class="gallery">

<?php renderGallery($_GET['id']); ?>

<div class="clear"></div>
</div>


<?php require_once "footer.php"; ?>  
