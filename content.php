<?php

	@$halaman = $_GET['halaman'];

	if($halaman == "disposisi")
	{
		//tampilkan halaman Disposisi
		//echo "Tampil Halaman Modul disposisi";
		include "modul/disposisi/disposisi.php";

	}
	elseif ($halaman == "pengirim_surat"){
		//tampilkan halaman pengirim surat
		include "modul/pengirim_surat/pengirim_surat.php";
	}


	elseif ($halaman == "user"){
			//tampilkan halaman user 
		include "modul/user/user.php";
		

		
	}

	
	

	elseif($halaman == "surat_masuk")
	{
		//tampilkan halaman arsip surat
		if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus"){
			include "modul/arsip/form.php";
		}else{
			include "modul/arsip/data.php";
		}
	}
	else
	{
		//echo "Tampil Halaman Home";
		include "modul/home.php";
	}

?>