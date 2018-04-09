<div class="container">
<?php 
	echo validation_errors();
	echo form_open('blogger/edit/'.$show_article['id']);
?>
Title : <input type="text" class="form-control" name="title" value="<?php echo $show_article['title'] ?>"><br>
Artikel : <textarea name="artikel" class="form-control" style="height:400px;"><?php echo $show_article['artikel']?></textarea><br>
<input type="submit" class="btn btn-defaule" value="Ok">
</div>