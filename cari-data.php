<?php
	include "koneksi.php";
	
	$query = mysql_query("select * from nama_keluarga");
	
	while($data = mysql_fetch_assoc($query)){
		echo $data['nama'];
	}

?>

<table class="table table-striped table-bordered table-hover" id="table_filter_find">
	<thead>
		<tr>
			<th colspan="3">
				<input type="text" class="form-control" name="search" id="search" onkeyup="cari_data_list()" autofocus="">
			</th>
			
		</tr>
	</thead>
	<tbody id="isi_data">
		
		<?php
			include "koneksi.php";
			
			$query = mysql_query("select * from nama_keluarga");
			
			while($data = mysql_fetch_assoc($query)){
		?>
				<tr id="tr" style="cursor: pointer; ">
					<td id="td" name="td3" data-dismiss="modal" onclick="post();" >
						<?= $data['nama']	?>												</td>
					<td data-dismiss="modal" onclick="post();"> <?= $data['alamat'] ?> </td>
					<td data-dismiss="modal" onclick="post();"> <?= $data['hobi'] ?> </td>
				</tr>
		<?php
			}

		?>								
		
										
		
															
	</tbody>
</table>