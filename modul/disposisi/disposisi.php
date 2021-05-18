<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if($_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_disposisi SET nama_disposisi = '$_POST[nama_disposisi]' where id_disposisi = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=disposisi';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_disposisi 
											  VALUES ('', '$_POST[nama_disposisi]') ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=disposisi';
					  </script>";
			}
		}


		
	}

	//Uji Jika klik tombol edit / hapus
	if(isset($_GET['hal']))
	{

		if($_GET['hal'] == "edit")
		{

			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_disposisi where id_disposisi='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama_disposisi= $data['nama_disposisi'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_disposisi WHERE id_disposisi='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=disposisi';
					  </script>";
			}

		}

		

	}

?>


<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Form Data Bagian 
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="nama_disposisi">Nama Bagian</label>
	    <input type="text" class="form-control" id="nama_disposisi" name="nama_disposisi" value="<?=@$vnama_disposisi?>">
	  </div>
	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Data Disposisi
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Nama Bagian</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from tbl_disposisi order by id_disposisi desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['nama_disposisi']?></td>
    		<td>
    			<a href="?halaman=disposisi&hal=edit&id=<?=$data['id_disposisi']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=disposisi&hal=hapus&id=<?=$data['id_disposisi']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>