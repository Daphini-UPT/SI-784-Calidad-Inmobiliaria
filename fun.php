<?php 
function rename_file($dest){
    $dir = pathinfo($dest,PATHINFO_DIRNAME);
    $name = pathinfo($dest,PATHINFO_FILENAME);
    $ext = pathinfo($dest,PATHINFO_EXTENSION);

$filename = basename($dest);
$sum =1;
while(file_exists($dir.'/'.$filename))
    $filename = $name.($sum++).'.'.$ext;
    return array($dir.'/'.$filename,$filename);
}
function is_image($imagen_temporal){
    $image_size = getimagesize($imagen_temporal);
    return(is_array($image_size));
}
?>