<?php
$msg = "";
 
    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
 
        $filename = $_FILES["image_file"]["name"];
        $tempname = $_FILES["image_file"]["tmp_name"];   
        $folder = "media/" . $filename;
            
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
  ?>