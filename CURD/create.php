<?php 
	include'inc/header.php';
	include'config.php';
	include'database.php';
?>
<?php
	$db = new Database();
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($db->link,$_POST['name']);
		$dep = mysqli_real_escape_string($db->link,$_POST['dep']);
		$age = mysqli_real_escape_string($db->link,$_POST['age']);
		$sex =  $_POST['sex'];

		if(empty($name) OR empty($dep) OR empty($age) OR empty($sex)){
			$error = "Field Must not Be Empty!";
		}else{
			$sql = "INSERT INTO user_tbl (name,dep,age,sex) VALUES ('$name','$dep','$age','$sex')";
			$insertData = $db->InsertData($sql);
		}	
	}
	
?>
<?php 
	if(isset($error)){
		echo "<span style ='color:red'>".$error."</span>";
	}
?>
<form action="create.php" method="post">
	<table>
	 	<tr>
	 		<td>Name:</td>
	 		<td><input type="text" name="name" placeholder="Type Name here.."></td>
	 	</tr>
	 	 <tr>
	 		<td>Deparment:</td>
	 		<td><input type="text" name="dep" placeholder="Deparment.."></td>
	 	</tr>
	 	<tr>
	 		<td>Age:</td>
	 		<td><input type="text" name="age" placeholder="Type Age here.."></td>
	 	</tr>
	 	<tr>
	 		<td>Sex:</td>
	 		<td>
	 			<input type="radio" name="sex" value="Male"> Male
	 			<input type="radio" name="sex" value="Female"> Female
	 		</td>	
	 	</tr>
	 	<tr>
	 		<td></td>
	 		<td><input type="submit" name="submit" value="Insert">
	 		<input type="reset" value="Reset"></td>
	 	</tr>
	</table>
</form>

<a href="index.php">Go Back</a>

<?php include'inc/footer.php';?>