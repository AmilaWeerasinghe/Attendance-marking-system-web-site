

<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"attendance");
$output='';
$count=0;
if(isset($_POST['search'])){
    $searchq=$_POST['search'];
    
    $query=mysqli_query($con,"SELECT * FROM A where STUDENT_ID like '%$searchq%'");
    $count=mysqli_num_rows($query);

    if($count==0){
        $output='no results';
    }
    else{
        $output=$count;
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
input.MyButton {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: #3366cc;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}
input.MyButton:hover {
color: #ffff00;
background: #000;
border: 1px solid #fff;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Searching</title>
</head>
<body>
<br>
     Enter Your Student ID number
    <form action="A.php" method="post">
    <input type="text" name="search"/>
    <input type="submit" value=">>"/>
    </form>
    Number of your attended days =
    <?php

    print("$output  "); 
    //printf($_POST['search'], PHP_EOL);
    //print("   $count");
    ?>

<br> Attendance Percentage upto now
<?php
$total_num=0;
$con=mysqli_connect("localhost","root","","hospital");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT pname,paddr FROM patient where pname='A'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    //printf ("%s (%s)\n",$row[0],$row[1]);
    $total_num=$row[1];

    }
  // Free result set
  mysqli_free_result($result);
}


echo($row[1]);
$obtained_num=$count;

$per = ($obtained_num/$total_num)*100;

echo $per;
mysqli_close($con);
?>

<form>
<input class="MyButton" type="button" value="Go Back to Home Page" onclick="window.location.href='index.php'" />
</form>

</body>
</html>

