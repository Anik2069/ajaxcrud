<?php
?>
<html>
<head>
    <title>Ajax CRUD - the Final Chapter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<hr>
<h2 style="text-align: center">
It Ajax final Chapter -  CRUD operation USing Ajax
</h2>
<hr>
<div class="container">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open modal
        </button>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Insert Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="myform" action="" method="post">
                        Username: <input type="text" id="t1" name="t1" class="form-control">
                        Password: <input type="password" id="t2" name="t2" class="form-control"><br>
                        <button id="btnclick" class="btn btn-primary" name="submit" id="submit" onclick="addrecord()">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <h2 class="text-danger">All Data</h2>
    <div id="loaddata">

    </div>
    <div class="modal fade" id="update_user_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ajax Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-group">
                        <label> User Name </label>
                        <input type="text" name="firstname" id="update_firstname" placeholder="First Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password </label>
                        <input type="text" name="firstname" id="update_pass" placeholder="" class="form-control">
                    </div>
                    <!-- 	<div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
                        </div> -->




                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update</button>
                    <input type="hidden" id="hidden_user_id">
                </div>



            </div>
        </div>
    </div>


</div>
<footer>
    <div>
        <p class="d-flex justify-content-center">It All about to @ <a href="">AIon Intelligence</a> </p>
    </div>
</footer>







<script type="text/javascript">
  $(document).ready(function () {
      display();
  });

  function del(deleteid){

      var conf = confirm("are u sure");
      if(conf == true) {
          $.ajax({
              url:"crudinsert.php",
              type:'post',
              data: {  deleteid : deleteid},

              success:function(data, status){
                  display();
              }
          });
      }
  }



  function display() {
        var read="read";
        $.ajax({
           url: "crudinsert.php",
           type:'post',
        data:{read:read },
            success:function (data,status) {
                $('#loaddata').html(data);
            }
        });

    }


    function addrecord() {
        var username = $('#t1').val();
        var pass = $('#t2').val();
        $.ajax(
            {
                url: "crudinsert.php",
                type: 'post',
                data: {
                    username:username,
                    pass:pass
                },
                success:function (data,status) {
                    display();
                }


            }
        );

    }
  function edit(id){
      $("#hidden_user_id").val(id);
      $.post("crudinsert.php", {
              id: id
          },
          function (data, status) {

              //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
              var user = JSON.parse(data);


              $("#update_firstname").val(user.name);
              $("#update_pass").val(user.password);

          }
      );
      $("#update_user_modal").modal("show");
  }


  function UpdateUserDetails() {
      var username = $("#update_firstname").val();
      var pass = $("#update_pass").val();

      var hidden_user_id = $("#hidden_user_id").val();
      $.post("crudinsert.php", {
              hidden_user_id: hidden_user_id,
              username: username,
              pass: pass,
          },
          function (data, status) {
              $("#update_user_modal").modal("hide");
              display();
          }
      );
  }


</script>


</body>
</html>
