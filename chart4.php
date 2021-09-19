<?php  
 $connectz = mysqli_connect("localhost", "root", "ieti19", "greatland_db");  
 //$queryz = "SELECT Gender, count(*) as gender FROM birthright_db.masterlist GROUP By Gender ORDER BY Gender DESC";
 //$queryz = "SELECT verified, Gender, count(*) as gender FROM birthright_db.masterlist, birthright_db.login where verified='1' and user_id=Student_No GROUP By Gender ORDER BY Gender DESC";
 $queryz = "SELECT description, count(*) as Description FROM greatland_db.library GROUP By description ORDER BY description DESC";

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
                          ['Description', 'description'],  
                          <?php  
                          while($row = mysqli_fetch_array($resultz))  
                          {  
                               echo "['".addslashes($row["description"])."', ".addslashes($row["Description"])."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of book description',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart5'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head> 