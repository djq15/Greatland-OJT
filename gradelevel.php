
<select style="width:430px;" name="gradelevel">
	<option value="<?php echo $gradelevel; ?>"><?php echo $gradelevel; ?></option>
	<?php 
	if ($gradelevel == "Nursery"){?>
	<option value="Junior Kinder">Junior Kinder</option>
	<option value="Senior Kinder">Senior Kinder</option>
	
	<option value="Grade 1">Grade 1</option>
	<option value="Grade 2">Grade 2</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>
	<?php } 
	else if ($gradelevel == "Junior Kinder"){ ?>
	<option value="Nursery">Nursery</option>
	<option value="Senior Kinder">Senior Kinder</option>
				
	<option value="Grade 1">Grade 1</option>
	<option value="Grade 2">Grade 2</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>
	<?php } 
	
	else if ($gradelevel == "Senior Kinder"){ ?>
	<option value="Nursery">Nursery</option>
	<option value="Junior Kinder">Junior Kinder</option>
					
	<option value="Grade 1">Grade 1</option>
	<option value="Grade 2">Grade 2</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>
	<?php } 
	
	else if ($gradelevel == "Grade 1"){ ?>
	<option value="Nursery">Nursery</option>
	<option value="Junior Kinder">Junior Kinder</option>
	<option value="Senior Kinder">Senior Kinder</option>
				
	<option value="Grade 2">Grade 2</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>
	<?php } 
	
	else if ($gradelevel == "Grade 2"){ ?>
	<option value="Nursery">Nursery</option>
	<option value="Junior Kinder">Junior Kinder</option>
	<option value="Senior Kinder">Senior Kinder</option>
				
	<option value="Grade 1">Grade 1</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>

	<?php } 
	
	
	
	
	
	
	else {?>
	<option value="Nursery">Nursery</option>
	<option value="Junior Kinder">Junior Kinder</option>
	<option value="Senior Kinder">Senior Kinder</option>
				
	<option value="Grade 1">Grade 1</option>
	<option value="Grade 2">Grade 2</option>
	<option value="Grade 3">Grade 3</option>
	<option value="Grade 4">Grade 4</option>
	<option value="Grade 5">Grade 5</option>
	<option value="Grade 6">Grade 6</option>
	<option value="Grade 7">Grade 7</option>
	<option value="Grade 8">Grade 8</option>
	<option value="Grade 9">Grade 9</option>
	<option value="Grade 10">Grade 10</option>
	<option value="Grade 11">Grade 11</option>
	<option value="Grade 12">Grade 12</option>
	<?php } ?>			
</select>

