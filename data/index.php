<!DOCTYPE html>
<?php
include("../cer/source/condb.php");
?>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:url" content="https://podsawee.com" />
	<meta property="og:site_name" content="Podsawee" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="ATK Certificate | Podsawee" />
	<meta property="og:description" content="ระบบรับใบรับรอง ATK | พศวีร์" />
	<meta property="og:image" content="https://podsawee.com/img/etc/Thumbnail_atk.jpg" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="627" />
	<meta name="twitter:card" content="summary_large_image" />
	
    <title>ระบบรับใบรับรอง ATK</title>

    <link rel="shortcut icon" href="../../img/Logo.png" type="image/png">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

	<link rel="stylesheet" href="../../css/popup.css">
	
    <link rel="stylesheet" href="../../css/default.css">

    <link rel="stylesheet" href="../../css/style.css">
	
	<link rel="stylesheet" href="../../css/LineIcons.css">


	
</head>
		<header class="header-area">
			<div class="navigation fixed-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<nav class="navbar navbar-expand-lg">
								<a class="navbar-brand" href="../../">
									<img src="../../img/Logo.png" width = " 50px" alt="Logo" onerror="Error()">
								</a>
								<h4>ระบบรับใบรับรอง ATK</h4>
							</nav>
					</div>
				</div>
			</div>
			</div>
		</header>
<body>
			<?php
			$id = $_GET['id'];
			$sql = mysqli_query($condb, "SELECT * FROM student WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header('Location: ../cer/error/data_not_found.php');
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
<section class="about-area pt-125 pb-130">
<div class="container">
		<div class="col-lg-12">
			<h2 class="mt-80 text-center">ระบบรับใบรับรอง ATK</h2>
			<hr />
			<form class="form-horizontal" action="../cer/" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<h3 class="col-sm-12 control-label text-center mb-3">ข้อมูลนักเรียน</h3>
				<table class="text-center" width="100%">
					<tr>
						<td width="25%"><h5>เลขประจำตัว</h5></td>
						<td width="40%"><h5>ชื่อ - นามสกุล</h5></td>
						<td width="20%"><h5>ห้อง</h5></td>
						<td width="15%"><h5>เลขที่</h5></td>
					</tr>
					<tr>
						<td width="20%"><h6 class="mt-2"><?php echo $row['id']?></h6></td>
						<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']?>" required>
						<td width="40%"><h6 class="mt-2">นาย<?php echo $row['name']?> <?php echo $row['surname']?></h6></td>
						<input type="hidden" name="name_surname" class="form-control" value="<?php echo $row['name']?> <?php echo $row['surname']?>" required>
						<td width="20%"><h6 class="mt-2">ม.<?php echo $row['class']?>/<?php echo $row['room']?></h6></td>
						<input type="hidden" name="class_room" class="form-control" value="<?php echo $row['class']?>/<?php echo $row['room']?>" required>
						<td width="15%"><h6 class="mt-2"><?php echo $row['number']?></h6></td>
						<input type="hidden" name="number" class="form-control" value="<?php echo $row['number']?>" required>
					</tr>
				</table>
				</div>
				<div class="form-group mt-3">
					<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;">สถานะ</b></label>
					<div class="col-sm-12">
						<select class="form-control" id="status" name="status" required>
						<option value="" selected="selected" >กรุณาเลือกสถานะ</option>
						<option value="1">นักเรียน (<?php echo $row['name']?> <?php echo $row['surname']?>)</option>
						<option value="2">ผู้ปกครอง / ญาติ / เพื่อนๆ / อื่นๆ</option>
						</select>
					</div>
				</div>
				<div id="outsite_box" class="form-group mt-3">
					<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;"> ชื่อ - นามสกุล</b></label>
					<div class="col-sm-12">
						<input type="text" name="outsite_name" id="outsite_name" placeholder="ชื่อ - นามสกุล (ไม่ต้องใส่คำนำหน้า)" class="form-control">
					</div>
				</div>
				<div class="form-group mt-3">
					<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;">วันที่</b> ที่ตรวจเชื้อ</label>
					<div class="col-sm-12">
						<input type="date" name="date_check" class="form-control" min="<?php $date = date("Y-m-d"); $date1 = str_replace('-', '/', $date); $yesterday = date('Y-m-d',strtotime($date1 . "-1 days")); echo $yesterday;?>" max="<?php echo date("Y-m-d");?>" required>
					</div>
				</div>
				<div class="form-group mt-3">
					<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;">เวลา</b> ที่ตรวจเชื้อ</label>
					<div class="col-sm-12">
						<input type="time" name="time_check" class="form-control" required>
					</div>
				</div>
				<div class="form-group mt-3">
				<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;">ผล</b> ที่ตรวจเชื้อ</label>
					<div class="form-check">
					<div class="col-sm-12">
					  <input class="form-check-input" type="radio" name="result_check" value="none" id="result_check_ok" checked>
					  <label class="form-check-label" for="result_check_ok">ไม่พบเชื้อโควิด-19</label>
					</div>
					</div>
					<div class="form-check">
					<div class="col-sm-12">
					  <input class="form-check-input" type="radio" name="result_check" id="result_check_covid" value="detected">
					  <label class="form-check-label" for="result_check_covid">พบเชื้อโควิด-19</label>
					</div>
					</div>
				</div>
				<div class="form-group mt-3">
					<label class="col-sm-12 control-label"><b style="color:#000; font-size:24px;">รูป</b> ที่ตรวจเชื้อ (.jpg | .png)</label>
					<div class="col-sm-12">
						<input type="file" name="picture_check" class="form-control" accept="image/*" required>
					</div>
				</div>
				<div class="form-group mt-5">
					<div class="col-sm-12 text-center">
						<input type="submit" name="submit" class="main-btn" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
	
    </section>
</body>
<script src="../../js/jquery-1.12.4.min.js"></script>

<script src="../../js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

$("#outsite_box").hide();

$("#status").change(function(){
	var ddl = $("#status").val();
	if(ddl == "2"){
		$("#outsite_box").show();
		$("#outsite_name").val("").focus();
	}else{
		$("#outsite_box").hide();
	}
	
});

});
</script>
    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-60 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="../../">
                                <img src="../../img/Logo.png" width = "75px" alt="Logo">
                            </a>
                            <ul>
									<li><a target="_blank" href="https://line.me/ti/p/Cg4pt0yWRj"><i class="lni-line"></i></a></li>
									<li><a target="_blank" href="https://www.facebook.com/Podsawee.Wanatham"><i class="lni-facebook-filled"></i></a></li>
									<li><a target="_blank" href="https://www.instagram.com/boss_pod/"><i class="lni-instagram-original"></i></a></li>
									<li><a target="_blank" href="https://twitter.com/Boss__pod"><i class="lni-twitter-original"></i></a></li>
                            </ul>
                        </div> 
                    </div>
                </div> 
            </div> 
        </div> 
        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>ลิขสิทธิ์ © 2020. พศวีร์ วนาธรรม (AC136)</p>
                        </div> 
                    </div>
                </div> 
            </div> 
        </div> 
        </div> 
    </footer>
</html>