<div class="container">
<table class="table table-hover">
	<h2>Post Article</h2>
	<tr>
		<td><b>ID</b></td>
		<td><b>Judul</b></td>
		<td><b>Isi</b></td>
		<td><b>Tanggal</b></td>
		<td><b>Gambar</b></td>
		<td colspan="3"><b>Action</b></td>
	</tr>
<?php
foreach ($artikel->result_array() as $row)
		{
			echo "<tr>";
        	echo "<td>".$row['id']."</td>";
        	echo "<td>".$row['title']."</td>";
        	echo "<td>".$row['artikel']."</td>";
        	echo "<td>".$row['tanggal']."</td>";
        	echo "<td><img src='".base_url().'image/'.$row['gambar']."' width='50px' height='50px'></td>";
        	echo "<td><a href='".site_url('blogger/view/'.$row['id'])."'>Tampil</a></td>";
          	echo "<td><a href='".site_url('blogger/edit/'.$row['id'])."'>Edit</a></td>";
          	echo "<td><a href='".site_url('blogger/delete/'.$row['id'])."'>Delete</a></td>";
        	echo "</tr>";
        	echo "<td><a href='".site_url('home')."'>Home</a></td>";
		}
?>
</table>
</div>
