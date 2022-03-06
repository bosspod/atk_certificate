<?php session_start(); 
include('../../../login/condb.php');
 
  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
 	if($level!='admin'){
    Header("Location: ../../../login/logout.php");  
  }  
?>
<?php
include("../source/condb.php");
?>
<!DOCTYPE html>
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

    <link rel="shortcut icon" href="../../../img/Logo.png" type="image/png">

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

	<link rel="stylesheet" href="../../../css/popup.css">
	
    <link rel="stylesheet" href="../../../css/default.css">

    <link rel="stylesheet" href="../../../css/style.css">
	
	<link rel="stylesheet" href="../../../css/LineIcons.css">


</head>
<body>
		<header class="header-area">
			<div class="navigation fixed-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<nav class="navbar navbar-expand-lg">
								<a class="navbar-brand" href="../">
									<img src="../../../img/Logo.png" width = "50px" alt="Logo" onerror="Error()">
								</a>
								<h4>ระบบรับใบรับรอง ATK</h4>
							</nav>
					</div>
				</div>
			</div>
			</div>
		</header> 
<section class="about-area pt-125 pb-130">
			<center>
        	<div class="col-lg-11">
			<h2 class="mt-80">ใบรับรอง ATK ที่สแกนแล้ว</h2>
			<hr/>

			<div class="table-responsive">
			<table class="table table-striped table-hover text-center">
				<tr>
                    <th>ลำดับ</th>
					<th>เวลา</th>
					<th>ข้อมูล</th>
					<th>ลบ</th>
				</tr>
				<?php
				$sql = mysqli_query($condb, "SELECT * FROM scan ORDER BY date DESC");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data not found.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['scan'].'</td>
                            <td>'.$row['date'].'</td>
							<td>
								<form action="delete_scan.php" method="post">
									<input type="hidden" name="scan" value="'.$row['scan'].'">
									<button class="btn btn-danger btn-sm mt-1" name="aksi" title="Delete Data" onclick="return confirm(\'Are you sure to delete data. '.$row['scan'].'?\')" value="delete"><span class="lni-trash" aria-hidden="true"></span></button>
								</form>
							</td>
							</tr>';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
		</center>
    </section>
	</body>
</html>							

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-60 pb-60 gray-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="">
                                <img src="../../../img/Logo.png" width = "75px" alt="Logo">
                            </a>
                            <p class="mt-">     </p>
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
                            <p>Copyright © 2020. Podsawee Wanatham</p>
                        </div> 
                    </div>
                </div> 
            </div> 
        </div> 
        </div> 
    </footer>

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    <script src="../../../js/jquery-1.12.4.min.js"></script>

    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/popper.min.js"></script>

    <script src="../../../js/jquery.magnific-popup.min.js"></script>

    <script src="../../../js/parallax.min.js"></script>

    <script src="../../../js/waypoints.min.js"></script>
    <script src="../../../js/jquery.counterup.min.js"></script>

    <script src="../../../js/jquery.appear.min.js"></script>

    <script src="../../../js/scrolling-nav.js"></script>
    <script src="../../../js/jquery.easing.min.js"></script>

    <script src="../../../js/main.js"></script>
	
	<script src="../../../js/required-en.js"></script>
	
</body>

</html>


