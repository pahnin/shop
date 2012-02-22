<?php
require('modules/admin_authenticate/index.php');
	if(isset($_POST['submit'])){
		$c=0;
		foreach($_POST as $input){
			if($input==NULL||$input==''){
				echo "<p>missing$input</p><br>";
				$c++;
			}
		}
		if($c==0||$_GET['update']=='true'){
		require(__DIR__.'/process.php');
		}
	}
	else{
	if(isset($_GET['do'])){
		if($_GET['do']=='edit'&&$_GET['id']!=''){
			$update='&update=true';
			$product = $db->getTableasArray("select * from product where id='".$db->__($_GET['id'])."'");
		if($product){
			echo "<form action='?u=admin&v=addp".$update."' method='POST' enctype='multipart/form-data'>
	<label for='name'>Product Name: </label><input type='text' name='name' value='".$product[0]['name']."'><br>
	<label for='description'>Product Description: </label><textarea name='description'>".$product[0]['description']."</textarea>
	<div style='display: block;'><label for='price_rs' style='display: inline;' >Price: Rs </label><input style='height: 15px;width: 70px;padding: 0 5px;' type='text' name='price_rs' value=".(($product[0]['price'])/100)."><label style='display: inline;' for='price_ps'> Ps </label><input style='height: 15px;width: 30px;padding: 0 5px;' type='text' name='price_ps' value=".(($product[0]['price'])%100)."></div><br>
	<label for='image'>Product Image: </label><input type='file' name='image'><br>
	<label for='sup_name'>Supplier Name: </label><input type='text' name='sup_name' value=".$product[0]['supplier_name']."><br>
	<label for='sup_address'>Supplier Address: </label><textarea name='sup_address'>".$product[0]['supplier_address']."</textarea>
	<label for='phone'>Supplier phone: </label><input type='text' name='phone' value=".$product[0]['phone']."><br>
	<label for='logo'>Suplpier Logo: </label><input type='file' name='logo'><br>
	<input type='submit' value='Add' name='submit'>
</form>";			
		}
		else{
			echo "No product found check your link";
		}
		}
	}
	else{
		echo "<form action='?u=admin&v=addp' method='POST' enctype='multipart/form-data'>
	<label for='name'>Product Name: </label><input type='text' name='name' ><br>
	<label for='description'>Product Description: </label><textarea name='description'></textarea>
	<div style='display: block;'><label for='price_rs' style='display: inline;' >Price: Rs </label><input style='height: 15px;width: 70px;padding: 0 5px;' type='text' name='price_rs' <label style='display: inline;' for='price_ps'> Ps </label><input style='height: 15px;width: 30px;padding: 0 5px;' type='text' name='price_ps'></div><br>
	<label for='image'>Product Image: </label><input type='file' name='image'><br>
	<label for='sup_name'>Supplier Name: </label><input type='text' name='sup_name'><br>
	<label for='sup_address'>Supplier Address: </label><textarea name='sup_address'></textarea>
	<label for='phone'>Supplier phone: </label><input type='text' name='phone'><br>
	<label for='logo'>Suplpier Logo: </label><input type='file' name='logo'><br>
	<input type='submit' value='Add' name='submit'>
</form>";
		
		}
	}
	
?>
