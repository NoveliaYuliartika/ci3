<div class="container">
<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>
<?php 
	echo validation_errors();
	echo form_open_multipart('blogger/edit/'.$show_article['id']);
?>
<table class="table table-hover">
	<h2>Post Article</h2><br>
<tr>
Title : <input type="text" class="form-control" name="title" value="<?php echo $show_article['title'] ?>"><br>
Artikel : <textarea name="artikel" class="form-control" style="height:150px;"><?php echo $show_article['artikel']?></textarea><br>
File : <input type="file" name="gambar"><br><br>
<b>Kategori :</b> <?php echo form_dropdown('kategori', $dropdown, set_value('kategori'), 'class="form-control" required');?>
<br>
</tr>
<input type="submit" id="submitBtn" class="btn btn-primary" value="Ok">
</table>
</div>