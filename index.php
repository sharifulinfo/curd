<?php 
	include'inc/header.php';
	include'config.php';
	include'database.php';
?>
<?php 
	if(isset($_GET['msg'])){
		echo "<span style ='color:green'>".$_GET['msg']."</span>";
	}
?>

<script>
	$(document).ready(function(){
		$('#fatch').on('change',function(){
			var value = $(this).val();
			$.ajax({
				url:'data.php',
				type:'POST',
				data:'request='+value,
				beforeSend:function(){
					$("#table_container").html('working.....');

				},
				success:function(data){
					$("#table_container").html(data);
				},

			});
		});


		$('#fatch1').on('change',function(){
			var value = $(this).val();
			$.ajax({
				url:'data.php',
				type:'POST',
				data:'request1='+value,
				beforeSend:function(){
					$("#table_container").html('working.....');

				},
				success:function(data){
					$("#table_container").html(data);
				},

			});
		});


	});
</script>
 

<select id="fatch">
	<option>Select one</option>	
	<option>20</option>	
	<option>21</option>	
	<option>22</option>	
</select>

<select id="fatch1">
	<option>Select one</option>	
	<option>CSE</option>	
	<option>EEE</option>	
	<option>CIVIL</option>	
</select>

<div id="table_container">
	<table class="tblone" id="tblon">
 	<tr>
 		<th>SL</th> 
 		<th>Name</th> 
 		<th>Dep</th> 
 		<th>Age</th> 
 		<th>Sex</th> 
 		<th>Action</th> 
 	</tr>

 	<?php
		$db = new Database();
		$sql = "SELECT * FROM user_tbl";
		$ViewData = $db->ReadData($sql); 
	?>
 	<?php 
 		if($ViewData){ 
 			$i=1;
 			while($row = $ViewData->fetch_assoc()){
 	?>
 	<tr>
 		<td><?php echo $i++;?></td>
 		<td><?php echo $row['name']?></td> 
 		<td><?php echo $row['dep']?></td> 
 		<td><?php echo $row['age']?></td> 
 		<td><?php echo $row['sex']?></td> 
 		<td><a href="update.php?id=<?php echo $row['id'];?>">Edit</a></td>
 	</tr>
 	<?php }} else{ ?> 
 		<p>Data is not Avabile</p>
 	<?php }?>
</table>

</div>
<div class="add">
	<a href="create.php">Add New</a>
</div>

			

<?php include'inc/footer.php';?>
