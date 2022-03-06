<?php
	include("../cer/source/condb.php");
	if(isset($_POST['qr'])){
	$qr_data = $_POST['qr'];
	$date = date("d/m/Y h:i:s A"); 
	}else{
		$qr_data = "unknown";
	}
	$check = "SELECT * FROM result  WHERE  qr_data = '$qr_data'";
	$result = mysqli_query($condb,$check) or die(mysql_error());
	$num=mysqli_num_rows($result);
	$sql = mysqli_query($condb, "SELECT * FROM result WHERE qr_data = '$qr_data'");
	if(mysqli_num_rows($sql) == 0){
			echo '
			<head>
			<title>ระบบรับใบรับรอง ATK</title>

			<link rel="shortcut icon" href="../../img/Logo.png" type="image/png">

			<link rel="stylesheet" href="../../css/bootstrap.min.css">

			<link rel="stylesheet" href="../../css/popup.css">
			
			<link rel="stylesheet" href="../../css/default.css">

			<link rel="stylesheet" href="../../css/style.css">
			
			<link rel="stylesheet" href="../../css/LineIcons.css">
			

			
			</head>';
			echo '<body style="background-color:#ff003c;">';
			echo '        
			<div class="container">
			<div class="mt-200 mb-100"><div>
			<h1 class="text-center" style="color:#000;">ไม่พบข้อมูล</h1>
			<div class="mt-25"><div>
			<h3 class="text-center" style="color:#000;">โปรดติดต่อเจ้าหน้าที่ หรือ ผู้ดูแลระบบ</h3>
			<div class="mt-25"><div>
			<h5 class="text-center" style="color:#000;">'.$qr_data.'</h5>
			</div>';
			echo "<script>
					window.setInterval('refresh()', 3000); 	
					function refresh() {
					   window.location.replace('index.php');
					}
				</script>";
			echo '</body>';
	}else{
	$check1 = "SELECT * FROM scan WHERE scan = '$qr_data'";
	$result1 = mysqli_query($condb,$check1) or die(mysql_error());
	$sql1 = mysqli_query($condb, "SELECT * FROM scan WHERE scan = '$qr_data'");
	$num1=mysqli_num_rows($result1);
	if($num1 > 0){
		while($row1 = mysqli_fetch_assoc($sql1)){
			echo '
			<head>
			<title>ระบบรับใบรับรอง ATK</title>

			<link rel="shortcut icon" href="../../img/Logo.png" type="image/png">

			<link rel="stylesheet" href="../../css/bootstrap.min.css">

			<link rel="stylesheet" href="../../css/popup.css">
			
			<link rel="stylesheet" href="../../css/default.css">

			<link rel="stylesheet" href="../../css/style.css">
			
			<link rel="stylesheet" href="../../css/LineIcons.css">
			

			
			</head>';
			echo '<body style="background-color:#ffa805;">';
			echo '        
			<div class="container">
			<div class="mt-200 mb-100"><div>
			<h1 class="text-center" style="color:#000;">QR-Code</h1>
			<h2 class="text-center" style="color:#000;">ได้ถูก Scan ไปแล้ว</h2>
			<div class="mt-25"><div>
			<h4 class="text-center" style="color:#000;">'.$row1['scan'].'</h4>
			<div class="mt-25"><div>
			<h6 class="text-center" style="color:#000;">ตอนเวลา : '.$row1['date'].'</h6>
			</div>';
			echo "<script>
					window.setInterval('refresh()', 3000); 	
					function refresh() {
					   window.location.replace('index.php');
					}
				</script>";
			echo '</body>';
		}
		}else if($num > 0){
			while($row = mysqli_fetch_assoc($sql)){
			$insert = mysqli_query($condb, "INSERT INTO scan(scan,date) VALUES('$qr_data','$date')") or die(mysqli_error());
			if($row['outsite_name']== "นักเรียน"){
				$outsite_name = "นักเรียนโรงเรียนอัสสัมชัญ";
			}else{
				$outsite_name = 'บุคคลภายนอก : '.$row['outsite_name'];
			}
			echo '
			<head>
			<title>ระบบรับใบรับรอง ATK</title>

			<link rel="shortcut icon" href="../../img/Logo.png" type="image/png">

			<link rel="stylesheet" href="../../css/bootstrap.min.css">

			<link rel="stylesheet" href="../../css/popup.css">
			
			<link rel="stylesheet" href="../../css/default.css">

			<link rel="stylesheet" href="../../css/style.css">
			
			<link rel="stylesheet" href="../../css/LineIcons.css">
			

			
			</head>';
			echo '<body style="background-color:#00ff26;">';
			echo '        
			<div class="container">
			<div class="mt-200 mb-100"><div>
			<h1 class="text-center" style="color:#000;">'.$row['id'].'</h1>
			<div class="mt-25"><div>
			<h3 class="text-center" style="color:#000;">'.$row['name'].'</h3>
			<div class="mt-25"><div>
			<h4 class="text-center" style="color:#000;">'.$outsite_name.'</h4>
			<div class="mt-25"><div>
			<h5 class="text-center" style="color:#000;">'.$row['qr_data'].'</h5>
			</div>';
			echo "<script>
					window.setInterval('refresh()', 3000); 	
					function refresh() {
					   window.location.replace('index.php');
					}
				</script>";
			echo '</body>';
		}
	}
}
?>