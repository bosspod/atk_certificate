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

    <link rel="shortcut icon" href="../img/Logo.png" type="image/png">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

	<link rel="stylesheet" href="../css/popup.css">
	
    <link rel="stylesheet" href="../css/default.css">

    <link rel="stylesheet" href="../css/style.css">
	
	<link rel="stylesheet" href="../css/LineIcons.css">

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
		<header class="header-area">
			<div class="navigation fixed-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<nav class="navbar navbar-expand-lg">
								<a class="navbar-brand" href="../">
									<img src="../img/Logo.png" width = " 50px" alt="Logo" onerror="Error()">
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
			if(isset($_POST['submit'])){
				$id = $_POST['id'];
					
					if($id != ""){
						Header("Location: data/?id=$id");  
						}
					}
		
			?>
<section class="about-area pt-125 pb-130">
<div class="container">
		<div class="col-lg-12">
			<h2 class="mt-80 text-center">ระบบรับใบรับรอง ATK</h2>
			<hr />
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-12 control-label">ID [เลขประจำตัว]</label>
					<div class="col-sm-12">
						<input type="text" name="id" class="form-control" required>
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
    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-60 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="../">
                                <img src="../img/Logo.png" width = "75px" alt="Logo">
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