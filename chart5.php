<?php  
 $connectz = mysqli_connect("localhost", "root", "ieti19", "greatland_db");  
 //$queryz = "SELECT Gender, count(*) as gender FROM birthright_db.masterlist GROUP By Gender ORDER BY Gender DESC";
 //$queryz = "SELECT verified, Gender, count(*) as gender FROM birthright_db.masterlist, birthright_db.login where verified='1' and user_id=Student_No GROUP By Gender ORDER BY Gender DESC";
 $queryz = "SELECT Grade_level, count(*) as gradelevel FROM greatland_db.masterlist GROUP By Grade_level ORDER BY CASE
 WHEN Grade_level = 'Nursery' THEN 'a' 
 WHEN Grade_level = 'Junior Kinder' THEN 'b' 
 WHEN Grade_level = 'Senior Kinder' THEN 'c' 
 

 WHEN Grade_level = 'Grade 1' THEN 'd' 
 WHEN Grade_level = 'Grade 2' THEN 'e' 
 WHEN Grade_level = 'Grade 3' THEN 'f' 
 WHEN Grade_level = 'Grade 4' THEN 'g' 
 WHEN Grade_level = 'Grade 5' THEN 'h' 
 WHEN Grade_level = 'Grade 6' THEN 'i' 

 WHEN Grade_level = 'Grade 7' THEN 'j' 
 WHEN Grade_level = 'Grade 8' THEN 'k' 
 WHEN Grade_level = 'Grade 9' THEN 'l' 
 WHEN Grade_level = 'Grade 10' THEN 'm' 
 WHEN Grade_level = 'Grade 11' THEN 'n' 
 WHEN Grade_level = 'Grade 12' THEN 'o' 

 ELSE Grade_level END ASC
 ";
 
 

 $resultz = mysqli_query($connectz, $queryz);  
 ?>  

      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
            
		   <script type="text/javascript" src="gstatic.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gradelevel', 'gradelevel'],  
                          <?php  
                          while($row = mysqli_fetch_array($resultz))  
                          {  
                               echo "['".addslashes($row["Grade_level"])."', ".addslashes($row["gradelevel"])."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage fo students by grade level',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart5'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head> 