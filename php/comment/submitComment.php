<?php
include '../connectdb.php';
session_start();
if (empty($_POST['commentContent']) || empty($_POST['postId']) || empty($_SESSION['loggedIn'])) {
	header('Location: ../../index.php');
	$_SESSION['errMsg'] = "Error, failed uploading comment...";
}

$selectUID = mysqli_query($connect, "SELECT * FROM users WHERE user_id=".$_SESSION['loggedIn']."");
$fetchUID = $selectUID->fetch_assoc();

$query = "INSERT INTO comment (post_id, comment_creator, comment_message)
VALUES (?, ?, ?)";

if ($statement = $connect->prepare($query)) {

        $statement->bind_param(
        "iss",
        $_POST['postId'],
        $fetchUID['username'],
        $_POST['commentContent']
        );

        if ($statement->execute()) {
        	header('Location: ../../post.php?id='.$_POST["postId"].'');
        } else {
        	echo "test1";
        }

} else {
	echo "test2";
}
?>