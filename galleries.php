<?php $pageName = "galleries";
require_once "header.php";
require_once "renderPreview.php";

if(isset($_SESSION['form'])){
        $name_preset = $_SESSION['form']['name'];
        $name1_preset = $_SESSION['form']['name1'];
        $name2_preset = $_SESSION['form']['name2'];
        $name3_preset = $_SESSION['form']['name3'];
	$name4_preset = $_SESSION['form']['name4'];
}

?>

<?php renderPreviews(); ?>

<?php if($_SESSION['permissions']){ ?>

<h2> Upload New Gallery </h2>
<form action="uploadGallery.php" method="POST" enctype="multipart/form-data" name="upload">
 <div>Gallery Name: <input value="<?php echo $name_preset; ?>" type="text" id="name" name="name"></div>
 <div>Highlight 1 Name: <input value="<?php echo $name1_preset; ?>" type="text" id="name1" name="name1"></div>
 <div>Highlight 2 Name: <input value="<?php echo $name2_preset; ?>" type="text" id="name2" name="name2"></div>
 <div>Highlight 3 Name: <input value="<?php echo $name3_preset; ?>" type="text" id="name3" name="name3"></div>
 <div>Highlight 4 Name: <input value="<?php echo $name4_preset; ?>" type="text" id="name4" name="name4"></div>
 <div>Select Zip File: <input name="ufile" type="file" id="ufile"></div>
 <input type="submit" name="Submit" value="Upload" />
</form>

<?php if($_SESSION['error']){
	echo "<div>" . $_SESSION['error'] . "</div>";
} ?>
<?php } ?>

<?php require_once "footer.php"; ?>  
