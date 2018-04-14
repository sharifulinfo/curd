<?php 
	include'inc/header.php';
	include'config.php';
	include'database.php';
?>
<?php
	$id = $_GET['id'];
	$db = new Database(); 
	$sql = "SELECT * FROM user_tbl WHERE id=$id";
	$GetData = $db->ReadData($sql)->fetch_assoc(); 

	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($db->link,$_POST['name']);
		$dep = mysqli_real_escape_string($db->link,$_POST['dep']);
		$age = mysqli_real_escape_string($db->link,$_POST['age']);
		$sex =  $_POST['sex'];

		if(empty($name) OR empty($dep) OR empty($age) OR empty($sex)){
			$error = "Field Must not Be Empty!";
		}else{
			$sql = "UPDATE user_tbl SET
				name = '$name',
				dep = '$dep',
				age = '$age',
				sex = '$sex' WHERE id = '$id'
			";
			$Updates = $db->UpdateData($sql);
		}	
	}
	
?>
<?php 
	if(isset($error)){
		echo "<span style ='color:red'>".$error."</span>";
	}
?>
<?php 
	if(isset($_POST['delete'])){
		$sql = "DELETE FROM user_tbl WHERE id = $id";
		$deleteData = $db->DeleteData($sql);
	}

?>


<form action="update.php?id=<?php echo $id;?>" method="post">
	<table>
	 	<tr>
	 		<td>Name:</td>
	 		<td><input type="text" name="name" value="<?php echo $GetData['name'];?>"></td>
	 	</tr>
	 	 <tr>
	 		<td>Deparment:</td>
	 		<td><input type="text" name="dep" value="<?php echo $GetData['dep'];?>"></td>
	 	</tr>
	 	<tr>
	 		<td>Age:</td>
	 		<td><input type="text" name="age" value="<?php echo $GetData['age'];?>"></td>
	 	</tr>
	 	<tr>
	 		<td>Sex:</td>
	 		<td> 
	 			<?php if($GetData['sex'] == 'Male'){?>
		 			<input type="radio" name="sex" value="Male" checked> Male
		 			<input type="radio" name="sex" value="Female"> Female
	 			<?php } else{ ?>
		 			<input type="radio" name="sex" value="Male"> Male
		 			<input type="radio" name="sex" value="Female" checked> Female
	 			<?php }?>
	 		</td>	
	 	</tr>
	 	<tr>
	 		<td></td>
	 		<td> 
		 		<input type="submit" name="submit" value="Update">
		 		<input type="submit" name="delete" value="Delete">
	 		</td>
	 	</tr>
	</table>
</form>

<a href="index.php">Go Back</a>

<?php include'inc/footer.php';?>
