<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_user SET 
											username = '$_POST[username]',
											password = '$_POST[password]',
											where id_user = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=user';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=user';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
		
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_user
											  VALUES (	'', 
											  		  	'$_POST[username]', 
                                                        '$_POST[password]', 
											  		  	
											  		  ) ");
			
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=user';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=user';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_user where id_user='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$username = $data['username'];
				$password = $data['password'];
		
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=user';
					  </script>";
			}

		}

		

	}

?>


<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Tambah User E-Surat
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" id="username" name="username" value="<?=@$username?>">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" name="password" value="<?=@$password?>">
	  </div>


	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>




<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Data User
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Username</th>
    		<th>Password</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from tbl_user order by id_user desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['username']?></td>
    		<td><?=$data['password']?></td>
    	
    		<td>
    			<a href="?halaman=user&hal=edit&id=<?=$data['id_user']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=user&hal=hapus&id=<?=$data['id_user']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>