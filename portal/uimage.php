<?php 
$return_value = '';

if ($_FILES['image']['name']) {
if (!$_FILES['image']['error']) {
$name = md5(rand(100, 200));
$ext = explode('.', $_FILES['image']['name']);
$filename = $name . '.' . $ext[1];
$destination = 'diagram/' . $filename;
$destination = '../result/diagram/' . $filename;
$location = $_FILES['image']['tmp_name'];
move_uploaded_file($location, $destination);
$return_value = 'diagram/' . $filename;
$return_value = '../result/diagram/' . $filename;

}else{
$return_value = 'Ooops! Your upload triggered the following error: '.$_FILES['image']['error'];
}
}

echo $return_value;




?>