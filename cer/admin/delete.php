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
<?php
$sql = mysqli_query($condb, "SELECT * FROM result ORDER BY no DESC");
	if(mysqli_num_rows($sql) == 0){
		echo '<tr><td colspan="8">Data not found.</td></tr>';
	}else{
		$no = 1;
		while($row = mysqli_fetch_assoc($sql)){
if(isset($_POST['aksi']) == 'delete'){
	$no = $_POST['no'];
	$cek = mysqli_query($condb, "SELECT * FROM result WHERE no='$no'");
	
	if(mysqli_num_rows($cek) == 0){
		echo '<script>alert("ไม่พบข้อมูลที่ต้องการลบ");window.location.replace("index.php");</script>';
	}else{
		$delete = mysqli_query($condb, "DELETE FROM result WHERE no='$no'");
		$delete_atk = '../atk/'.$row['file_name'].'.jpg';
		$delete_cer = '../cer/'.$row['file_name'].'.jpg';
		$delete_qr = '../qr/'.$row['file_name'].'.jpg';
		@unlink($delete_atk);
		@unlink($delete_cer);
		@unlink($delete_qr);
		if($delete){
			echo '<script>alert("การลบเสร็จสิ้น");window.location.replace("index.php");</script>';
		}else{
			echo '<script>alert("เกิดข้อผิดพลาดกับการลบ");window.location.replace("index.php");</script>';
		}
				}
			}
		}
	}

			?>