<?php
            session_start();
            
            if(isset($_SESSION['name'])&& !empty($_SESSION['name'])){
                
                session_unset($_SESSION['name']);
                
                header('Location:'.'index.php');
            }
            
                
            (mysql_connect('localhost', 'root', '')and mysql_select_db('indentmanagementsystem'))or die('Error connecting database');
            $wrongpassword=false;
            if(!isset($_POST['submit'])){
            ;
                
            }else{
                
               $username=$_POST['username'];
               $password=$_POST['password'];
                  $sql = "SELECT `Name` FROM `dbuser` WHERE `username`='".  mysql_real_escape_string($username)."'and `password`='".  mysql_real_escape_string($password)."'";
                  if($query =  mysql_query($sql)){
                      if(mysql_num_rows($query)>0){
                      $_SESSION['name']=mysql_result($query, 0);
                      $_SESSION['username']=  $username;
                      $_SESSION['password']=  $password;
                      header('Location:'.'content.php');
                     // echo 'hello'.mysql_result($query, 0);
                  
                      }else{
                      echo "<script>alert('Wrong Username or Password')</script>";
                  }
                  }
            }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Portal</title>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <link href="dashboard.css" rel="stylesheet">
        <link src="./CSS/bootstrap.css" rel="stylesheet">
    </head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

            <meta name="description" content="">
            <meta name="author" content="">

            
   
    <script src="jquery.validate.min.js"></script>
        <script>
        $(function() {
            
            $("#loginform").validate({
                
                // Specify the validation rules
                rules: {
                    username: "required",
                    password: {
                        required:true,
                        minlength:8
                       
                    },
                    type: "required"
                },
                // Specify the validation error messages
                messages: {
                    username: "<div style=\"color: red; font-size: 12\">Please enter your Username</div>",
                    password: {
                        minlength: "<div style=\"color: red; font-size: 12\">Password must be 8 letters long.</div>",
                        required: "<div style=\"color: red; font-size: 12\">This field is required.</div>"
                    },
                    type: "<div style=\"color: red; font-size: 12\">This field is compulsory</div>"
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });


        });
    </script>
    <body class="container">
        <div class="container-fluid">
           <div class="jumbotron">
               <h1 style="text-align: center; color: red">Indent Management System</h1>
           </div>
       </div>
   <!-- <marquee style="color: red; font-style: italic; font-size: x-large;">Indent Management System for V H Patil Petrol Pump</marquee>
       -->    
            <div class="row">
            <div class="col-sm-4 " ></div>
           
            <div class="col-sm-4 " >
                 <div class="jumbotron">       
                    <h4>
                    <p><br><div class="glyphicon glyphicon-lock" style="color: green"></div> Login to your account</p>
                    </h4>

                        
                        <form role="" action="" method="POST" id="loginform">
                            
                                <lable for="username">Username</lable>
                                <input class="form-control" type="text" id="username" name="username"  placeholder="Username">
                                <br>
                                <lable for="password">Password</lable>
                                <input class="form-control" type="password" id="password" name="password"  placeholder="Password">
                                <br>
                                <button type="submit"  name="submit" class="btn btn-primary ">Login</button>
                            
                        </form>
                </div>
            </div>
            <div class="col-sm-4 " ></div>
          </div>       
    </body>
</html>
