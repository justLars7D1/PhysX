<?php
$query = "SELECT * FROM comment WHERE post_id='".$_GET['id']."' ORDER BY comment_id ASC";
$result = $connect->query($query);

while ($row = $result->fetch_assoc()) {

echo "      
      <div class='lead MessageOfPerson'>
        <div>
    ";

    $selectId = mysqli_query($connect, "SELECT * FROM users WHERE username='".$row['comment_creator']."'");
    $fetchId = $selectId->fetch_assoc();

if (!empty($_SESSION['loggedIn'])) {

    if ($_SESSION['loggedIn'] == $fetchId['user_id']) {
     echo "
     <form method='POST' action='".deleteComment($connect)."'>
        <input type='hidden' name='cid' value='".$row['comment_id']."'>
        <button type='submit' name='commentDelete' class='deleteComment'>Delete</p>
     </form>

     <form method='POST' action='./php/comment/editComment.php'>
      <input type='hidden' name='pid' value='".$_GET['id']."'>
      <input type='hidden' name='cid' value='".$row['comment_id']."'>
      <input type='hidden' name='uid' value='".$row['comment_creator']."'>
      <input type='hidden' name='message' value='".$row['comment_message']."'>
        <button class='editComment'>Edit</p> 
     </form>
     ";
    }
}


echo "        </div>
        <div class='NameOfPerson'> 
          <p>".$row['comment_creator']."</p>
        </div>
        <div class='MessageText'>
          <p>".nl2br($row['comment_message'])."</p>
        </div>
      </div>
        <hr class='my-3'>
";

}

function deleteComment($connect) {
if(isset($_POST['commentDelete'])) {
  $cid = $_POST['cid'];

  $sql = "DELETE FROM comment WHERE comment_id='$cid'";
  $result = mysqli_query($connect, $sql);
  header("Refresh:0");
  }
}

?>

<!--MODAL VOOR EDIT COMMENT-->
 <!-- Modal 3 Comment Edit Menu start-->
  <div class="modal fade" id="" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal 3 content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Don't have an account?<br>Register!</h4>
        </div>
        <div class="modal-body">
            <form action="./php/reglog/registeruser.php" method="POST">

                <h5>What do you want your username to be?</h5>
                <input type="text" required placeholder="username" name="uid"><br>

                <h5>Let's create a password, make sure it's a strong one!</h5>
                <input type="password" required placeholder="password" name="pwd"><br>

                <h5>Let's type it out one more time to make sure it's good.</h5>
                <input type="password" required placeholder="confirm password" name="cpwd"><br>

                <h5>All done? <i>Hit</i> that register button</h5>
                <button class="btn btn-default" type="submit">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
    <!--Modal 3 end-->