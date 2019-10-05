<!--attendance count-->
<!DOCTYPE html>
<html>
<head>
   <title>Inventory System</title>
   <style type="text/css">
      table{
        margin: 200px;
      	border:10 px solid red;
      }
      th{
      	border-bottom: 5px solid #000;
      }
      td{
      	border-bottom: 2px solid #666;
      }
   </style>
</head>

<body>
    <style>
    body {
        background-image: url("download (11).jpg");
        /*height: 100%; */

      /* Center and scale the image nicely */
      /*background-position: center;*/
      background-repeat: no-repeat;
        background-size: cover;
    } 
 
    </style>
	   
      <?php

   
   $purchaseid="";
   $psupplierid="";
   $pproductid="";
   $punitprice="";
   $pqnty="";
    
   $db=mysqli_connect('localhost','root','','attendance');
   
   
      
     //$query=mysqli_query($db,"SELECT PurchaseId,FORMAT (SUM(Qnty * UnitPrice),2) Amount FROM PURCHASE GROUP BY PurchaseId ORDER BY SUM(Qnty * UnitPrice) DESC");
     $query=mysqli_query($db,"SELECT SUBJECT_ID, STUDENT_ID,FORMAT (COUNT(FINGERPRINT_ID),0) FINGERPRINT_ID FROM mark_attendance GROUP BY SUBJECT_ID,STUDENT_ID ");
      echo "<table>";
      echo "<tr><th>SUBJECT_ID</th><th>STUDENT_ID</th><th>ATTENDANCE</th></tr>";

      while ($row    = mysqli_fetch_array($query,MYSQLI_NUM)){
      	echo "<tr><td>";
      	echo $row[0];
      	echo "</td><td>";
      	echo $row[1];
        echo "</td><td>";
        echo $row[2];
      	echo "</td></tr>";
      }
     
     echo "</table>";
             
     


   if(!$db){
   echo "Error: " . mysqli_error($link);
   }
 
?>



</body>
</html>