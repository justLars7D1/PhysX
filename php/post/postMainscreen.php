<?php

	function getPosts($connect) {

		$sql = "SELECT * FROM post ORDER BY post_id DESC";
		$result = $connect->query($sql);

		while ($row = $result->fetch_assoc()) {
			echo '<div class="container row">';
				echo '<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">';
					echo '<div class="post-preview">';
						echo '<a href="post.php?id='.$row["post_id"].'">';
					echo '<h2 class="post-title">'.$row["post_title"].'</h2>';
					echo '<h3 class="post-subtitle">'.$row["post_subtitle"].'</h3>';	
						echo "</a>";
				echo '<p class="post-meta">Posted by <a href="#">'.$row["post_creator"].'</a>';
					echo "</div>";
				echo "</div>";
			echo "</div>";

		}
	}
?>
        
            
                
                    
         
           
                    
