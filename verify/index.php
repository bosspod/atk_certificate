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
	
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
	
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
	
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

	
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
<section class="about-area pt-125 pb-130">
<div class="container">
		<div class="col-lg-12 text-center">
		<h2 class="mt-80 mb-40">ระบบตรวจสอบใบรับรอง ATK</h2>
			<div id="app">
			  <div class="container">
				<video id="preview" width="50%"></video>
			  </div>
				<section class="scans">
				  <h2 class="mt-50 mb-20" >ข้อมูล</h2>
				<form id="myForm" action="check.php" method="POST">
					<input class="form-control text-center" type="text" id="text" name="qr" onchange="myFunction()" readonly>
				</form>
				</section>
					<div class="text-right mt-50 mb-50" id="cam" style="display: ;">
						<a class="btn btn-sm btn-danger white" onclick="cam()" style="color:white;">ตั้งค่ากล้อง</a>
					</div>
				<section class="cameras" id="spoiler" style="display:none ;">
				  <h2>Cameras</h2>
				  <ul>
					<li v-if="cameras.length === 0" class="empty">No cameras found</li>
					<li v-for="camera in cameras">
					  <a href="#" v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">กำลังใช้งาน --></a>
					  <a href="#" v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
						<a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
					  </span>
					</li>
				  </ul>
				</section>
			</div>
		</div>
	</div>
</section>
<script>
var app = new Vue({
  el: '#app',
  data: {
    scanner: null,
    activeCameraId: null,
    cameras: [],
    scans: []
  },
  mounted: function () {
    var self = this;
    self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
	self.scanner.addListener('scan', function (content, image) {
		document.getElementById("text").value=content;
		document.getElementById("myForm").submit();
	});
    Instascan.Camera.getCameras().then(function (cameras) {
      self.cameras = cameras;
      if (cameras.length > 0) {
        self.activeCameraId = cameras[0].id;
        self.scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  },
  methods: {
    formatName: function (name) {
      return name || '(unknown)';
    },
    selectCamera: function (camera) {
      this.activeCameraId = camera.id;
      this.scanner.start(camera);
    }
  }
});

</script>
<script>
function cam() {
    if(document.getElementById('spoiler') .style.display=='none') {
        document.getElementById('spoiler') .style.display='';
    }else{
        document.getElementById('spoiler') .style.display='';
		document.getElementById('spoiler') .style.display='none';
    }
}

</script>
  </body>
</html>
