<?php
$conn =mysqli_connect("localhost","root","","ajaxdata");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Getting Data Bro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<h1 style="text-align: center" class="text-danger">Welcome to Ajax</h1>
<div class="container">
    <div id="loaddata">
      <form>
         Username: <input type="text" name="t1" class="form-control">
         Password: <input type="password" name="t2" class="form-control"><br>
         Degree: <select class="form-control" onchange="myfun(this.value)">
              <option>Select one</option>
<?php
$result = mysqli_query($conn,"select * from degree");
while($row=mysqli_fetch_assoc($result)){
    ?>
    <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>
<?php
}
?>
          </select>
          Year: <select class="form-control" id="dataset">
              <option>Select one</option>

          </select><br>
          <button id="btnclick" class="btn btn-primary">Submit</button>
      </form>
    </div>

<!--
***************Important COmments**************
url means the place where i need to send data
type means method 1 get 2 post
data means the data what i neeed to pass
success  meaans a function where i need to import data
i have to on change method


-->
</div>
<script type="text/javascript">
 function myfun(value1) {
     $.ajax({
         url:"new.php",
         type:"POST",
         data: {datapost : value1},
         success: function (result) {
             $("#dataset").html(result);
             
         }


     });

 }

</script>


</body>
</html>


