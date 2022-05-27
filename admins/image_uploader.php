<?php
$admin_photo = $_FILES["filename"]["name"];
  $temp_photo_name = $_FILES["filename"]["tmp_name"];
  move_uploaded_file($temp_photo_name, "../admin/images/".$admin_photo);
?>