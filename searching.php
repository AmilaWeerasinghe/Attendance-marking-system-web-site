
<form action="searching.php" method="post">
<select name="class">
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
$selected_val='';
if(isset($_POST['submit'])){
$selected_val = $_POST['class'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;  // Displaying Selected Value
}

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"attendance");
$output='';
$count=0;
if(isset($_POST['search'])){
    $searchq=$_POST['search'];

    
    print($selected_val);
    
    $query=mysqli_query($con,"SELECT * FROM mark_attendance where STUDENT_ID like '%$searchq%'");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Searching</title>
</head>
<body>
<br>
     Enter Your Student ID number
    <form action="searching.php" method="post">
    <input type="text" name="search"/>
    <input type="submit" value=">>"/>
    </form>
    Number of your attended days =
    <?php

    //print("$output  "); 
    //printf($_POST['search'], PHP_EOL);
    print("   $count");
    ?>
     
    <br> Attendance Percentage upto now
    <?php
$obtained_num=$count;
$total_num=10;
$per = ($obtained_num/$total_num)*100;

echo $per;

?>

</body>
</html>

