<?php
session_start();
if(!isset($_SESSION['userid'])){

	
	if(isset($_POST['submit'])){
		
		if($_POST['submit']!='login'||$_POST['name']==''||$_POST['pwd']==''){
		echo "Please fill all the fields";
		}
		else{
			$userindb=$db->getTableasArray("select * from admins where name ='".$db->__($_POST['name'])."'");
			if($userindb){
				if($userindb[0]['pass']==$_POST['pwd']){
					session_regenerate_id ();
					$_SESSION['userid'] = $userindb[0]['id'];
					header('Location: ?u=admin');
					exit;
				}
				else{
					echo "Wrong password";
				}
			}
			else{
				echo "User doesnt exist";
			}
			
		}		
	}
?>
<html>
<head>
<title>Login</title>
</head>
<body>
<div style='background: none repeat scroll 0 0 #E4E4E4;border: medium none #EFEFEF;box-shadow: 0 0 3px -2px #3D3D3D;margin: 40px auto;padding: 30px;width: 200px;'>
<form action='?u=admin' method = 'post'>
<label for='name'>Username:</label><br><input type='text' name='name'><br>
<label for='pwd'>Password:</label><br><input type='password' name='pwd'><br>
<input type='submit' name='submit' value='login'>
</form>
</div>
</body>
</html>
<?php
exit;
}
else{
		if(isset($_GET['logout'])){
		$_SESSION['userid']='';
		session_destroy();
		header('Location: ?u=admin');
	}
}
?>
