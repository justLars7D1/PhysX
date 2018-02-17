<html>
<head>
	<title>PhysX - Edit your comment</title>
</head>
<body>

<?php
include '../connectdb.php';

echo "

     <form method='POST' action='".editComment($connect)."'>
     <input type='hidden' name='cid' value='".$_POST['cid']."'>
     <input type='hidden' name='pid' value='".$_POST['pid']."'>
     <textarea name='newMsg'>".$_POST['message']."</textarea>
        <button name='commentSubmit' class='editComment'>Edit</p> 
     </form>

";


function editComment($connect) {
 if(isset($_POST['commentSubmit'])) {
  $cid = $_POST['cid'];
  $pid = $_POST['pid'];
  $message = $_POST['newMsg'];

  $sql = "UPDATE comment SET comment_message='$message' WHERE comment_id='$cid'";
  $result = mysqli_query($connect, $sql);
  header('Location: ../../post.php?id='.$pid.'');
 }
}
?>

</body>
</html>

