    
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    session_destroy();
    header('Location:' . 'back.php');
}
//$_SESSION['name']=$_SESSION['name'];
(mysql_connect('localhost', 'root', '') and mysql_select_db('indentmanagementsystem')) or die('Error connecting database');

$ps=$_SESSION['password'];



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        
        <title>Register Customer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags-->
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <link href="dashboard.css" rel="stylesheet">
        <link src="./CSS/bootstrap.css" rel="stylesheet">
      
    <meta name="description" content="">
    <meta name="author" content="">
        
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="./jquery.min.js"></script>
    <script src="./bootstrap.min.js"></script>
     <script>
            function regCustomer() {
                
                var cn=document.getElementById("customerName").value;
                var mobile= document.getElementById("mobileNumber").value;
                var addr= document.getElementById("address").value;
                
                
                var data="?cstName='"+cn+"'&mobile="+mobile+"&addr="+addr;
                
                var xmlhttp;
                if (cn==" "||mobile==' ') { 
                   
                    document.getElementById("response").innerHTML = "Pleease Provide Details";
                    return;
                } else {
                     
                     var pass = prompt("Authentication Required!\nEnter your password","");
                     if(!pass){
                            alert('Cancel Clicked!!!');
                            location.reload();
                         }else{
                           while(pass!=<?php echo $ps;?>){
                            pass=prompt("Wrong password..! Enter Again");
                                if(!pass){
                                alert('Calcel Clicked!!!');
                                
                                location.reload();
                                break;
                             }
                           }
                           if(pass==<?php echo $ps;?>){
                              xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("mainDiv").style.display= 'none';
                            document.getElementById("response").style.display='block' ;
                            document.getElementById("responseSpan").innerHTML = xmlhttp.responseText;
                        }
                    };
                    
                    
                    xmlhttp.open("GET", "addCustomer.php"+data , true);
                    xmlhttp.send(); 
                           }
                         }
                     
                    
                }
            }
            
        </script>
        <script>
            function load(loc){
                window.location=loc;
            }
        </script>    
    </head>    
    <body class="container" style="background: palegreen;">
        
        <nav class="navbar navbar-inverse" style="margin-top: -15  ">
            <div class="container-fluid" style=" height: 70">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        
                    <a class="navbar-brand" href="content.php" style="font-size: 30; color: #ffffff">Indent Management System- IMS </a>
                        
                </div>
                <a class="nav navbar-brand navbar-right  " style="font-size: 20; color: #ffffff"><strong>Welcome: 
                        <?php
                        echo ' ' . $_SESSION['name'];
                        ?>
                    </strong></a>
            </div>
                
            <ul class="nav nav-tabs ">
                <li ><a href="content.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-gift"></span> Products
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addproduct.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Product</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Product</a></li>
                    </ul>
                        
                </li>
                    
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-user"></span> Customers
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Register Customer</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-open"></span> View Customer</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Customer</a></li>
                    </ul>
                        
                </li>
                    
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Purchases
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-credit-card"></span> Sale Bill</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-print"></span> Monthly Statement</a></li>
                    </ul>
                        
                </li>
                <li class="nav nav-tabs navbar-right"><a href="logout.php" style="margin-right: 30"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    
            </ul>
                
                
            <br>
            <div class="container" id="mainDiv">
                
                <div class="row">
                    <div class="col-sm-2"></div>   
                        
                    <form method="GET">
                        <div class="col-sm-8 jumbotron">
                            <h3 style="color: red; inline-box-align: last">Enter Customer Details</h3><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                    <label for="customerName" >Customer Name: </label>
                                    <input type="text" id="customerName" class="form-control" placeholder="Name">
                                        
                                </div>
                                <div class="col-sm-4">
                                    
                                    <label for="mobileNumber">Mobile:</label>
                                    <input id="mobileNumber" type="number" class="form-control" placeholder="Mobile Number">
                                </div>
                                <div class="col-sm-2"></div>
                                    
                            </div>
                            <br>
                            <div class=" row">
                                <div class="col-sm-6">
                                     <label for="address">Address:</label><br>
                                    <textarea  id="address" cols="40" rows="5" style="font-family: serif" placeholder="Enter Address Here"></textarea>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <br>
                                
                            <div>
                                <button class="btn btn-primary" type="button" onclick="regCustomer();" >Register</button>
                            </div>
                                
                                
                        </div> 
                    </form>
                        
                     
                    <div class="col-sm-2"></div>
                        
                </div>
                    
                    
            </div>
                
        <div id="response" style="display: none">
            <center>   <span id="responseSpan"></span>
                
                <button class="btn btn-info" id="backButton" onclick="load('registerCustomer.php')">Back</button>
                &nbsp;
                <button class="btn btn-info" id="backButton" onclick="load('content.php')">Home</button>
                    
            </center>
        </div>
                
        </nav>
       
    </body>
</html>
    

