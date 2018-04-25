<div class="container">
<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
<?php 
	echo validation_errors();
	echo form_open_multipart('blogger/create', array('class' => 'needs-validation', 'novalidate' => '') );
?>
Title : <input type="text" class="form-control" name="title"><br>
Artikel : <textarea name="artikel" class="form-control" style="height:400px;"></textarea><br>
File : <input type="file" name="gambar">
<input type="submit" id="submitBtn" class="btn btn-primary" value="Tambah">

</div>