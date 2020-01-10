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
<h1 style="text-align: center" class="text-danger">Welcome to Insert Ajax</h1>
<div class="container">
    <div id="loaddata">
        <form id="myform" action="insertdata.php" method="post">
            Username: <input type="text" name="t1" class="form-control">
            Password: <input type="password" name="t2" class="form-control"><br>
            <button id="btnclick" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </form>
    </div>


</div>
<!--serialize is jquery method
-->

<div>
    <br><br>
    <h2 style="text-align: center">Show Data</h2>
    <h2 style="text-align: center"><button id="btnid">CLick Here to show</button></h2>
    <br><br>
    <table class="table table-striped table-bordered">
        <thead>
        <td>Serial</td>
        <td>Username</td>
        <td>Password</td>

        </thead>
        <tbody id="response">



        </tbody>

    </table>
</div>



















<script type="text/javascript">
    $(document).ready(function () {
        var form = $("#myform");
        $("#submit").click(function () {
            $.ajax(
                {
                    url: form.attr("action"),
                    type: 'post',
                    data: $("#myform input").serialize(),
                    success: function (data) {
                        console.log(data);
                    }


                }
            )
            
        });



/*        $("#btnid").click(function () {
            $.ajax({
                url:"display.php",
                type: 'post',
                success: function (data) {
                    $('#response').html(data);
                }
            })

        });*/
display();
function display() {
    $.ajax({
        url:"display.php",
        type: 'post',
        success: function (data) {
            $('#response').html(data);
        }
    })
}





    })




</script>


</body>
</html>


