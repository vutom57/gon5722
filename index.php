<?php
	session_start();
 include('./db/connect.php'); 
?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['matkhau']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<p>Xin nhập đủ</p>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
				$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
				header('Location: dashboard.php');
			}else{
				echo '<p>Tài khoản hoặc mật khẩu sai</p>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<div>
	<title >Đăng nhập Admin</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="./css/style1.css">
	<script src="https://kit.fontawesome.com/957f9649c0.js" crossorigin="anonymous"></script>
</head>
<body>
	<div id="wrapper">
	<form action="" method="POST" id="form-login">
	<h1 class="form-heading">Trang đăng nhập</h1>
	<br>

	<div class="form-group">
    <i class="fa-solid fa-user"></i>
		<input type="text" name="taikhoan" placeholder="Điền Email" class="form-input"><br>
		</div>

	<div class="form-group">
    <i class="fa-solid fa-key"></i>
		<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-input"><br>
		  </div>  
		  <div>
		<input type="submit" name="dangnhap" class="form-submit" value="Đăng nhập Admin">
</div>
		</form>
	</div>
	</div>
	</div>

</body>
</html>