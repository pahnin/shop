<?php
if($view=='home'){
$posts = $db->getTableasArray('select * from product ORDER BY price');

foreach($posts as $post){
	if($post){
		echo "<div class='post'>
		<img height=80 width=80 src='img/".$post['imageurl']."'></img>
		<a href='?v=product&t=".$post['id']."'><h2>".$post['name']."</h2></a><br>
		<p>".$post['description']."</p>
		<p> Price: Rs ".(($post['price'])/100)."</p>
		</div>";
		
		}
	
	}
}
else{
	
	}
	

?>
