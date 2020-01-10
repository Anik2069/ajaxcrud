<?php
$conn =mysqli_connect("localhost","root","","ajaxdata");
$q="select * from user";
$result = mysqli_query($conn,$q);
while ($row=mysqli_fetch_assoc($result)){
    ?><tr>
        <td><?php echo $row['serial'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['password'] ?></td>
    </tr>
<?php
}

?>
