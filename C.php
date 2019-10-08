

<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"attendance");
$output='';
$count=0;
if(isset($_POST['search'])){
    $searchq=$_POST['search'];
    
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

<form>
<input class="MyButton" type="button" value="Go Back to Home Page" onclick="window.location.href='index.php'" />
</form>

</body>
</html>

