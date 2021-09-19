<?php 


echo $record['Grade_level'];

$array = array(
			   '<option value="Nursery">Nursery</option>',
			   '<option value="Junior Kinder">Junior Kinder</option>', 
			   '<option value="Senior Kinder">Senior Kinder</option>', 
			   '<option value="Grade 1">Grade 1</option>', 
			   '<option value="Grade 2">Grade 2</option>',
			   '<option value="Grade 3">Grade 3</option>',
			   '<option value="Grade 4">Grade 4</option>',
			   '<option value="Grade 5">Grade 5</option>',
			   '<option value="Grade 6">Grade 6</option>',
			   '<option value="Grade 7">Grade 7</option>',
			   '<option value="Grade 8">Grade 8</option>',
			   '<option value="Grade 9">Grade 9</option>',
			   '<option value="Grade 10">Grade 10</option>',
			   '<option value="Grade 11">Grade 11</option>',
			   '<option value="Grade 12">Grade 12</option>'
			   );

if ($record['Grade_level'] == "Nursery"){
	$x = '<option value="Nursery">Nursery</option>';
}
else if ($record['Grade_level'] == "Junior Kinder"){
	$x = '<option value="Junior Kinder">Junior Kinder</option>';
}
else if ($record['Grade_level'] == "Senior Kinder"){
	$x = '<option value="Senior Kinder">Senior Kinder</option>';
}
else if ($record['Grade_level'] == "Grade 1"){
	$x = '<option value="Grade 1">Grade 1</option>';
}
else if ($record['Grade_level'] == "Grade 2"){
	$x = '<option value="Grade 2">Grade 2</option>';
}
else if ($record['Grade_level'] == "Grade 3"){
	$x = '<option value="Grade 3">Grade 3</option>';
}
else if ($record['Grade_level'] == "Grade 4"){
	$x = '<option value="Grade 4">Grade 4</option>';
}
else if ($record['Grade_level'] == "Grade 5"){
	$x = '<option value="Grade 5">Grade 5</option>';
}
else if ($record['Grade_level'] == "Grade 6"){
	$x = '<option value="Grade 6">Grade 6</option>';
}
else if ($record['Grade_level'] == "Grade 7"){
	$x = '<option value="Grade 7">Grade 7</option>';
}
else if ($record['Grade_level'] == "Grade 8"){
	$x = '<option value="Grade 8">Grade 8</option>';
}
else if ($record['Grade_level'] == "Grade 9"){
	$x = '<option value="Grade 9">Grade 9</option>';
}
else if ($record['Grade_level'] == "Grade 10"){
	$x = '<option value="Grade 10">Grade 10</option>';
}
else if ($record['Grade_level'] == "Grade 11"){
	$x = '<option value="Grade 11">Grade 11</option>';
}
else if ($record['Grade_level'] == "Grade 12"){
	$x = '<option value="Grade 12">Grade 12</option>';
}


foreach (array_keys($array, $x) as $key) {
    unset($array[$key]);
	//echo $key . "<br>";
}
//echo '<select style="width:430px;" name="gradelevel">';
foreach($array as $value){
	
    echo $value . "<br>";
}
//echo '</select>';



?>

