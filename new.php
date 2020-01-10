<?php
$conn =mysqli_connect("localhost","root","","ajaxdata");
$idd= $_POST['datapost'];
$result = mysqli_query($conn,"select * from year where id=$idd ");
while($row=mysqli_fetch_assoc($result)){
?>
    <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>
    <?php
    }
    ?>


?>

