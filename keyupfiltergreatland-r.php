<?php 



	
if ($_POST['filter'] == "first_name") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			//url:'fetch-class2.php',
			url:'fetch-classgreatland2-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
	
});


</script>";
	}
else if ($_POST['filter'] == "last_name") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland3-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";
	}

else if ($_POST['filter'] == "student_no") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland4-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}
	
else if ($_POST['filter'] == "middle_initial") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland5-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "gender") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland6-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "date_of_birth") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland7-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "age") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland8-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "street") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland9-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "province") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland10-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "homecontact") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland11-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "mobile") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland12-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "lrn") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland13-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}	
	
else if ($_POST['filter'] == "gradelevel") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland14-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
});


</script>";

	}		

else {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-classz.php',
			//url:'fetch-class.php',
			url:'fetch-classgreatland-r.php',
			method:'post',
			data:{query:query},
			success:function(data)
			{
				$('.result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search); 		
		}
		else
		{
			load_data(); 			
		}
	});
	
	
});


</script>";
	}




echo $echo;
?>
