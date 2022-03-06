<?php
include('source/condb.php');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
} else {
	header('Location: ../');
}
if ($_POST['result_check']=="detected") {
	header('Location: error/contact_teacher.php');
}else{
	
header('Content-type: image/jpeg');
$font = realpath('source/PrintAble4U.ttf');
$image = imagecreatefromjpeg("source/format.jpg");
$color = imagecolorallocate($image, 255, 255, 255);

$name_surname = $_POST['name_surname'];
$class_room = $_POST['class_room'];
$number = $_POST['number'];
$date_check = $_POST['date_check'];
$time_check = $_POST['time_check'];
$result = $_POST['result_check'];
if($_POST['status']=="2"){
	$outsite_name = $_POST['outsite_name'];
}else{
	$outsite_name = "นักเรียน";
}

$class_number = "ม.".$class_room." เลขที่ ".$number;

$date_time = date("d/m/Y h:i:s A"); 
$date_time_file = date("d-m-Y-h-i-s-A"); 

$qr_link = $date_time_file.'_'.$id.'_'.$date_check.'-'.$time_check.'_'.$result;
$filename = $date_time_file.'-'.$id;

$picture_check = $_FILES['picture_check'];
if($picture_check != '') {
	$path="atk/";
	
	$type = strrchr($_FILES['picture_check']['name'],".");
	
	$newname = $filename.'.jpg';
	$path_copy=$path.$newname;
	$path_link="atk/".$newname;
	if($_FILES["picture_check"]["type"]=='image/png' || $_FILES["picture_check"]["type"]=='image/jpeg'){
		move_uploaded_file($_FILES['picture_check']['tmp_name'],$path_copy);
		
		$url = 'https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl='.$qr_link.'';
		$qr = file_get_contents($url);
		file_put_contents('qr/'.$filename.'.jpg',$qr);
		
		$insert = mysqli_query($condb, "INSERT INTO result(timestamp, id, name, outsite_name, qr_data, file_name) VALUES('$date_time','$id','$name_surname','$outsite_name','$qr_link','$filename')") or die(mysqli_error());
		
		$bbox_0 = imageftbbox(90, 0, $font, $id);
		$x_0 = $bbox_0[0] + (imagesx($image) / 2) - (($bbox_0[2] - $bbox_0[0]) / 2) - 5;
		imagettftext($image,90, 0, (int)$x_0, 440, $color, $font, $id);

		$bbox_1 = imageftbbox(65, 0, $font, $name_surname);
		$x_1 = $bbox_1[0] + (imagesx($image) / 2) - (($bbox_1[2] - $bbox_1[0]) / 2) - 5;
		imagettftext($image, 65, 0, (int)$x_1, 580, $color, $font, $name_surname);

		$bbox_2 = imageftbbox(55, 0, $font, $class_number);
		$x_2 = $bbox_2[0] + (imagesx($image) / 2) - (($bbox_2[2] - $bbox_2[0]) / 2) - 5;
		imagettftext($image, 55, 0, (int)$x_2, 650, $color, $font, $class_number);
		
		$bbox_3 = imageftbbox(40, 0, $font, $outsite_name);
		$x_3 = $bbox_3[0] + (imagesx($image) / 2) - (($bbox_3[2] - $bbox_3[0]) / 2) - 5;
		imagettftext($image, 40, 0, (int)$x_3, 750, $color, $font, $outsite_name);
		
		imagettftext($image, 20, 0, 800, 40, $color, $font, $date_time);

		$frame = imagecreatefromstring(file_get_contents('qr/'.$filename.'.jpg'));
		imagecopymerge($image, $frame, 290, 1210, 0, 0, 500, 500, 100);
		imagejpeg($image,'cer/'.$filename.'.jpg');
		//imagejpeg($image);
		imagedestroy($image);

		header('Location: cer/'.$filename.'.jpg');
	}else{
		header('Location: error/file_not_support.php');
	}
}
}
	

?>