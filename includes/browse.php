<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1 class="pageHeadingBig">You Might Also Like</h1>
     <div class="gridViewContainer">
	     <?php
		     while($row = mysqli_fetch_array($albumQuery)) {
			     echo    "<div class='gridViewItem'>
					     <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						 <img src='" . $row['artworkPath'] . "'>
						 <div class='gridViewInfo'>"
							. $row['title'] .
						 "</div>
					 </span>
				 </div>";
		 }
	 ?>
      </div>
    
</body>
</html>