<?php 
	
	session_start();
	include "conn.php";

	$username = $_POST['input_user'];
	$password = $_POST['input_pass'];

	$sql = "SELECT * FROM users WHERE username = '$username'  AND password = '$password'";

	$chk_login = $conn->query($sql)->num_rows;

	if($chk_login == 1){
		//echo "ล็อกอินสำเร็จ";
		$_SESSION['login'] = "$username ";
		header('location: showdata.php'); //ถ้าล้อกอินได้ อยากให้ไปหน้าไหน ใส่ตรงนี้นะ
	}
	else{
		//echo "ไม่พบรหัสผ่านหรือยูสเซอร์เนม";
		echo '<script type="text/javascript">'; 
		echo 'alert("ไม่พบผู้ใช้งานดังกล่าวในระบบ หรือรหัสผ่านไม่ถูกต้อง!");'; 
		echo 'window.history.back();';
		echo '</script>';
	}


?>