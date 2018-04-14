<?php 

	include'config.php';
	include'database.php';
?>


<?php
	if(isset($_POST['request'])){
		$val = $_POST['request'];
		$dd = 1;

		$_SESSION['Ad'] = $val;
	}
	
	if(isset($_SESSION['Ad'])){
		echo $_SESSION['Ad'];

		if(isset($_POST['request1'])){

		$val1 = $_POST['request1'];
		echo $val1;
		echo $_SESSION['Ad'].$val1;
	}

	 }
