<?php 
include '../connectdb.php';
session_start();

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

$query = 'INSERT INTO users (username, password)
VALUES (?, ?)';

$sqlUID = mysqli_query($connect, "SELECT username from users WHERE username='".$uid."' ");
$rowsUID = $sqlUID->num_rows;

if ($rowsUID == 0) {
	
	if ($pwd == $cpwd) {
		
		if($statement = $connect->prepare($query)) {

	$statement->bind_param(
        "ss",
        $uid,
        $pwd
        );

	if ($statement->execute()) {

	$_SESSION['errMsg'] = '<div class="alert alert-success" role="alert">
  	<strong>Register:</strong> Succesfully registered. You can now login!
	</div>';
	header('Location: ../../index.php');

      }

    else {
        
	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Register:</strong> Statement was not able to execute -> retry in a little moment.
	</div>';
	header('Location: ../../index.php');

      }

		} else {

	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Register:</strong> Could not prepare query -> retry in a little moment.
	</div>';
	header('Location: ../../index.php');

		}

	} else {

	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Register:</strong> The two password did not match. Please retry.
	</div>';
	header('Location: ../../index.php');

	}

} else {

	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Register:</strong> This username already exists. Please try a different username.
	</div>';
	header('Location: ../../index.php');

}
?>