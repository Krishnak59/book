<html>
<body>

<form action="test.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 





<?php

if(!empty($_FILES))
{
    print_r($_FILES);
   $img=$_FILES['file'];
   
   if(move_uploaded_file($img['tmp_name'],"../ressources/images/".$img['name']))
   {
echo"ouiiiouiii";
       
   }
   else
      echo"nonnnn";
    
    
    if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
}