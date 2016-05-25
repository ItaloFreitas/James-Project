<?php 
	
	$localhost = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'ntec';
	

	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$conn = mysqli_connect($localhost,$user,$pass);
	mysqli_select_db($conn,$db);

	$envia = "INSERT INTO `tab2`(`id`, `nome`, `email`) VALUES ('','$nome','$email')";

	if (isset($_POST['nome'])) {
	
	mysqli_query($conn,$envia);

	header("location:index.php");
	}




 ?>