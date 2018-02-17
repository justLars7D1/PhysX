<?php 
session_start();
include '../connectdb.php';

$selectAll = "SELECT * FROM users WHERE username='".$_POST['uid']."' AND password='".$_POST['pwd']."'";
$runAll = mysqli_query($connect, $selectAll);
$row5 = $runAll->fetch_assoc();

if (mysqli_num_rows($runAll) > 0) {

		$_SESSION['loggedIn'] = $row5['user_id'];
		header('Location: ../../index.php');

} else {

		$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
	  	<strong>Login:</strong> Incorrect username or password.
		</div>';
		header('Location: ../../index.php');
}
?>