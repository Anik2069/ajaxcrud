<?php
$conn =mysqli_connect("localhost","root","","ajaxdata");
extract($_POST);












if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM user WHERE serial = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $response = $row;
        }
    }
    //  // agar ek bhi value nai milta hai tho data not found no. of rows 0 hai tho
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode():

    echo json_encode($response);
}

else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}



if(isset($_POST['hidden_user_id']))
{
    // get values
    $hidden_user_id = $_POST['hidden_user_id'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $query = "UPDATE user SET name = '$username', password = '$pass'  WHERE serial = '$hidden_user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}

if(isset($_POST['deleteid']))
{

    $user_id = $_POST['deleteid'];

    $deletequery = " delete from user where serial ='$user_id' ";
    if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

    }

}



if(isset($_POST['read'])){
    $data ='
    <table class="table table-bordered table-striped">
    <tr>
    <th>Serial</th>
    <th>Username</th>
    <th>Password</th>
    <th>Action</th>
</tr>';
    $q1="select * from user";
    $c=1;
    $query1 =mysqli_query($conn,$q1);
    while ($res =mysqli_fetch_assoc($query1)){
        $data .= '<tr>
<td>'.$c.'</td>
<td>'.$res['name'].'</td>
<td>'.$res['password'].'</td>
<td><button onclick="edit('.$res['serial'].')">Edit</button>/
<button onclick="del('.$res['serial'].')">Delete</button>

</td>
</tr>
';
        $c++;
    }

    $data .='</table>';
    echo $data;


}








if(isset($_POST['username']) && isset($_POST['pass'])){
    $q= "insert into user values ('','$username','$pass')";
    $query=mysqli_query($conn,$q);

}
?>