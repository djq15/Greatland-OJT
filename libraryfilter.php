<?php 

if ($_POST['filter'] == "book_code") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			//url:'fetch-class2.php',
			url:'fetch-classlibrary2.php',
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
else if ($_POST['filter'] == "title") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classlibrary3.php',
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

else if ($_POST['filter'] == "isbn") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classlibrary4.php',
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
	
else if ($_POST['filter'] == "author") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classlibrary5.php',
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

else if ($_POST['filter'] == "category") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classlibrary6.php',
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

else if ($_POST['filter'] == "description") {
$echo = "<script>
$(document).ready(function(){
	load_data(); 
	function load_data(query)
	{
		
		$.ajax({
			//url:'fetch.php',
			//url:'fetch-class.php',
			url:'fetch-classlibrary7.php',
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
			url:'fetch-classlibrary.php',
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
