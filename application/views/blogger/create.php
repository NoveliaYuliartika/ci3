<div class="container">
<?php 
	echo validation_errors();
	echo form_open_multipart('blogger/create')
?>
Title : <input type="text" class="form-control" name="title"><br>
Artikel : <textarea name="artikel" class="form-control" style="height:400px;"></textarea><br>
File : <input type="file" name="gambar" required="">
<input type="submit" class="btn btn-default" value="Tambah">
</div>