<div class="container">
<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
<?php 
	echo validation_errors();
	echo form_open_multipart('blogger/create', array('class' => 'needs-validation', 'novalidate' => '') );
?>
<table class="table table-hover">
	<h2>Create Article</h2><br>
<tr>
<b>Title :</b> <input type="text" class="form-control" name="title"><br>
<b>Artikel :</b> <textarea name="artikel" class="form-control" style="height:150px;"></textarea><br>
<b>File :</b>  <input type="file" name="gambar"><br><br>
<b>Kategori :</b> <?php echo form_dropdown('kategori', $dropdown, set_value('kategori'), 'class="form-control" required');?>
<br>
</tr>
<input type="submit" id="submitBtn" class="btn btn-primary" value="Tambah">
</table>
</div>
