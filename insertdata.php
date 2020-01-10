<?php
$conn =mysqli_connect("localhost","root","","ajaxdata");
extract($_POST);
if(isset($_POST['submit'])){
    $q= "insert into user values ('','$t1','$t2')";
    $query=mysqli_query($conn,$q);
    header("location:insert.php");
}
?>