<?php
if($_SERVER["REQUEST_METHOD"]==="GET"&&isset($_GET["type"])&&isset($_GET["url"])){$type=$_GET["type"];$videoUrl=$_GET["url"];$content_type=($type==="video")?"video/mp4":"audio/mp3";$file_extension=($type==="video")?"mp4":"mp3";$filename="downloaded_file.".$file_extension;header('Content-Type: '.$content_type);header('Content-Disposition: attachment; filename="'.$filename.'"');readfile($videoUrl);exit;header('download-preview.php');}?>