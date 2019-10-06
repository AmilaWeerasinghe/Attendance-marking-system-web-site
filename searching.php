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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Searching</title>
</head>
<body>
    <form action="searching.php" method="post">
    <input type="text" name="search"/>
    <input type="submit" value=">>"/>
    </form>

    <?php
    print("$output  "); 
    print($_POST['search']);
    print("   $count");
    ?>
</body>
</html>