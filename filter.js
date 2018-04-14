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
	});
</script>