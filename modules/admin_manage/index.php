<?php
require('modules/admin_authenticate/index.php');
if(!isset($_GET['do'])){
$products=$db->getTableasArray('select * from product');
echo "<ul>";
foreach($products as $product){
	if($product){
		echo "<li style='height: 100px;'><p style='width: 200px;float: left'>".$product['name']."</p><p style='width: 420px;float: left'>".$product['description']."</p><p style='width: 150px;text-align: center;float: left'><a href='?u=admin&v=addp&do=edit&id=".$product['id']."'>Edit</a></p><p style='width: 100px;text-align: center;float: left'><a href='?u=admin&do=del&t=".$product['id']."'>Delete</a></p></li>";
		}
	
	}
echo "</ul>";
}
else if($_GET['do']=='del'){
	$sql="DELETE FROM product WHERE id = ";
	$db->Query($sql.$db->__($_GET['t']));
	echo "
	<script>
	window.location='?u=admin';
	</script>
	
	";
}
?>
