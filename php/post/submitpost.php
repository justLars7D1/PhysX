<?php 
session_start();
if (!isset($_SESSION['loggedIn'])) {

	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Post:</strong> You must be logged in in order to post.
	</div>';
	header('Location: ../../index.php');

}
include '../connectdb.php';

$user_id = $_SESSION['loggedIn'];
$selectUserInfo = "SELECT * FROM users WHERE user_id = '".$user_id."'";
$runUserInfo = mysqli_query($connect, $selectUserInfo);
$fetchUserInfo = $runUserInfo->fetch_assoc();

$postCreator = $fetchUserInfo['username'];
$postTitle = $_POST['postTitle'];
$postSubtitle = $_POST['postSubtitle'];
$postContent = $_POST['postContent'];

$query = 'INSERT INTO post (post_title, post_subtitle, post_content, post_creator) VALUES (?, ?, ?, ?)';

if (empty($postTitle || $postSubtitle || $postContent)) {

	$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
  	<strong>Post:</strong> Too few parameters given to upload...
	</div>';
	header('Location: ../../index.php');
} else {

	if ($statement = $connect->prepare($query)) {
		$statement->bind_param(
			"ssss",
			$postTitle,
			$postSubtitle,
			$postContent,
			$postCreator
			);

		if ($statement->execute()) {
			
				$_SESSION['errMsg'] = '<div class="alert alert-success" role="alert">
			  	<strong>Post:</strong> Your post has been uploaded.
				</div>';
				header('Location: ../../index.php');

		} else {
			
				$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
			  	<strong>Post:</strong> The post title is more than 25 characters long or your post subtitle is longer than 24 characters.
				</div>';
				header('Location: ../../index.php');

		}

	} else {
				$_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
			  	<strong>Post:</strong> Could not prepare the statement -> Retry in a little moment.
				</div>';
				header('Location: ../../index.php');
	}

}

?>