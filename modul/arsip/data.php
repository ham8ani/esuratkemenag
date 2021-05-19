<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Data Surat Masuk


  </div>

    <div class="card-body">
  	<a href="?halaman=surat_masuk&hal=tambahdata" class="btn btn-dark mb-3" >Tambah Surat</a>
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>No Surat</th>
    		<th>Tanggal Surat</th>
    		<th>Tanggal Diterima</th>
    		<th>Prihal</th>
    		<th>Disposisi</th>
    		<th>Pengirim</th>
    		<th>File</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "
    				  SELECT 
    				  	tbl_suratmasuk.*,
    				  	tbl_disposisi.nama_disposisi,
    				  	tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
    				  FROM 
    				  	tbl_suratmasuk, tbl_disposisi, tbl_pengirim_surat
    				  WHERE 
    				  	tbl_suratmasuk.id_disposisi = tbl_disposisi.id_disposisi
    				  	and tbl_suratmasuk.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
    				  ");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['no_surat']?></td>
    		<td><?=$data['tanggal_surat']?></td>
    		<td><?=$data['tanggal_diterima']?></td>
    		<td><?=$data['prihal']?></td>
    		<td><?=$data['nama_disposisi']?></td>
    		<td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
    		<td>
    			<?php
    				//uji apakah file nya ada atau tidak
    				if(empty($data['file'])){
    					echo " - ";
    				}else{
    			?>
    				<a href="file/<?=$data['file']?>" target="$_blank"  class="btn btn-secondary"> Baca Surat </a>
    			<?php
    				}
    			?>
    		</td>
    		<td>
    			<a href="?halaman=surat_masuk&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=surat_masuk&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>