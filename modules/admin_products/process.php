<?php
if($_GET['update']){
$code=rand(1,9999);
if($_FILES['image']['size']!=0){
$fileextension =explode("/",$_FILES['image']['type']);
$filename=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$code.".".$fileextension[1]);
$imgexist="imageurl = '".$code.".".$fileextension[1]."',";
}
else{$imgexist="";}
if($_FILES['image']['size']!=0){
$fileextension2 =explode("/",$_FILES['logo']['type']);
$filename=$_FILES['logo']['name'];
$tmp_name=$_FILES['logo']['tmp_name'];
move_uploaded_file($_FILES["logo"]["tmp_name"],"img/".$code."_logo.".$fileextension2[1]);
$logoexist=", supplier_logo = '".$code."_logo.".$fileextension2[1]."'";
}
else{$logoexist="";}
$sql="UPDATE product SET name = '".$_POST['name']."',
description = '".$_POST['description']."',
price = '".$_POST['price_rs'].$_POST['price_ps']."',".$imgexist."
supplier_name = '".$_POST['sup_name']."',
supplier_address = '".$_POST['sup_address']."'".$logoexist." WHERE id =7;";
	if($db->Insert($sql)){
	$success=True;
	$id = mysql_insert_id();
	echo "success";
}
}
else{
$fileextension =explode("/",$_FILES['image']['type']);
$filename=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$code=rand(1,9999);
move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$code.".".$fileextension[1]);
$fileextension2 =explode("/",$_FILES['logo']['type']);
$filename=$_FILES['logo']['name'];
$tmp_name=$_FILES['logo']['tmp_name'];
move_uploaded_file($_FILES["logo"]["tmp_name"],"img/".$code."_logo.".$fileextension2[1]);
$sql="INSERT INTO product (
id ,
name ,
description ,
price ,
imageurl ,
supplier_name ,
supplier_address ,
supplier_logo ,
time
)
VALUES (
NULL, '".$_POST['name']."', '".$_POST['description']."', '".$_POST['price_rs'].$_POST['price_ps']."','".$code.".".$fileextension[1]."', '".$_POST['sup_name']."', '".$_POST['sup_address']."', '".$code."_logo.".$fileextension2[1]."', NOW()
);";
if($db->Insert($sql)){
	$success=True;
	$id = mysql_insert_id();
	echo "success";
}
}
?>
