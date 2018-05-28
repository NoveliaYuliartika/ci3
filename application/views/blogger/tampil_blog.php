<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main role="main">

<section class="jumbotron text-center">
<div class="container">
		<h1 class="jumbotron-heading">Post Article</h1>
	</div>
</section>
    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="dt-basic" class="table table-striped table-bordered">
		<thead>
			<tr>
				<td><b>ID</b></td>
				<td><b>Judul</b></td>
				<td><b>Isi</b></td>
				<td><b>Tanggal</b></td>
				<td><b>Kategori</b></td>
				<td><b>Gambar</b></td>
				<td colspan="3"><b>Action</b></td>
			</tr>
		</thead>
<tbody>
<?php
foreach ($artikel->result_array() as $row)
		{
			echo "<tr>";
        	echo "<td>".$row['id']."</td>";
        	echo "<td>".$row['title']."</td>";
        	echo "<td>".$row['artikel']."</td>";
        	echo "<td>".$row['tanggal']."</td>";
        	echo "<td>".$row['nama']."</td>";
        	echo "<td><img src='".base_url().'image/'.$row['gambar']."' width='50px' height='50px'></td>";
        	echo "<td><a href='".site_url('blogger/view/'.$row['id'])."'>Tampil</a></td>";
          	echo "<td><a href='".site_url('blogger/edit/'.$row['id'])."'>Edit</a></td>";
          	echo "<td><a href='".site_url('blogger/delete/'.$row['id'])."'>Delete</a></td>";
        	echo "</tr>";

		}
		echo "<td><a href='".site_url('blog')."'>Back</a></td>"; 
?>
<?php echo $links ?>
</table>
</div>
</div>
</section>

<main>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap4.min.js"></script>
<script>
    jQuery(document).ready(function(){

        // Contoh inisialisasi Datatable tanpa konfigurasi apapun
        // #dt-basic adalah id html dari tabel yang diinisialisasi
        $('#dt-basic').DataTable();
    });
</script>