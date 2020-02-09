<?php
function UploadFoto($namafile,$folder,$ukuran){
	$fileupload=$folder . $namafile;
	//Simpan file ukuran asli
	move_uploaded_file($_FILES['foto']['tmp_name'], $fileupload);
}
?>
