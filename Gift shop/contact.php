<?php


	try{
		$pdo=new pdo('mysql:host=localhost;dbname=contact','root','');
		session_start();
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$Message=$_POST['Message'];
		
		$insert=$pdo->prepare("insert into feedback(fname,lname,email,Message)values(:fname,:lname,:email,:Message)");
		
		$insert->bindparam(':fname',$fname);
		$insert->bindparam(':lname',$lname);
		$insert->bindparam(':email',$email);
		$insert->bindparam(':Message',$Message);
		
		$insert->execute();
	}
	catch(PDOException $f){
		echo $f->getmessage();
	}
	
	
	header('location:index.html');	
?>