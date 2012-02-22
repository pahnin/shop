<?php	
	$product = $db->getTableasArray("select * from product where id='".$db->__($_GET['t'])."'");
	if($product){
		
		echo "<div class='product'>
		<a href='?v=product&t=".$product[0]['id']."'><h2>".$product[0]['name']."</h2></a>
		<br><p>".$product[0]['description']."</p>
		<img width=250 height=250 src='img/".$product[0]['imageurl']."'>
		<p>Price: Rs".(($product[0]['price'])/100)."</p>
		</div>
		<div class='supplier'>
		<h3>Supplier details:</h3>
		<p>".$product[0]['supplier_name']."</p>
		<p style='float: left;'>".$product[0]['supplier_address']."</p><br>
		<p style='float: left;'>".$product[0]['phone']."</p>
		<img width=80 height=80 src='img/".$product[0]['supplier_logo']."'>
		</div>
		";
		
		}
?>
