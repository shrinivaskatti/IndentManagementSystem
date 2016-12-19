<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Add Product</title>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <script src="./js/jquery.min_2.js"></script>
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
        
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="jquery.validate.min.js"></script>
        <script>
            $(function(){
                
                $("#addproduct").validate({
                    
                        rules:{
                    productName: "required",
                    prductType:{
                        required:true
                    },
                    price: {
                        required:true
                        
                    }
                },
                
                message:{
                    
                    productName:"<div style=\"color: red; font-size: 12\">Please enter Product Name</div>",
                    productType:"<div style=\"color: red; font-size: 12\">Please Select Type</div>",
                    price:"<div style=\"color: red; font-size: 12\">Please enter valid price</div>"
                }
                    
                });
                
                submitHandler: function(form) {
                    form.submit();
                }
                
          });
        </script>
        
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
                    <a class="nav navbar-brand navbar-right  " style="font-size: 20; color: #ffffff "><strong>Welcome: 
                            <?php
                                echo ' '.$_SESSION['name'];
                             ?>
                            </strong></a>
                </div>
                    
                    <ul class="nav nav-tabs ">
                        <li ><a href="content.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-plus-sign"></span> Add Product
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <!-- <li><a href="addproduct.php">Add Product</a></li>-->
                                <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Product</a></li>
                            </ul>
                            
                        </li>
                        
                      
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-user"></span> Customers
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="registerCustomer.php"><span class="glyphicon glyphicon-plus-sign"></span> Register Customer</a></li>
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
                    
                    <div class="row" id="mainDiv">
                        <div class="col-sm-2"></div>
                       
                            <div class="col-sm-8 jumbotron" >
                                <h3 style="color: red; inline-box-align: last">Add Product Details</h3><br>
                                <form  id="addproduct">
                                   <div class="row">
                                       <div class="col-sm-4">
                                           
                                            <div class="form-group">
                                                <label >Product Name:</label>
                                     
                                                <input type="text" id="productName" class="form-control" placeholder="Product Name"> 
                                            </div>
                                       </div>
                                       <div class="col-sm-2"></div>
                                       <div class="col-sm-4">
                                            <div class="form-group ">
                            
                                                    <div class="dropdown">
                                                        <label for="productType" class=" cotrol-label">Product Type:</label>
                                                        <div >
<!--                                                        <button id="dpButton" class=" btn btn-info dropdown-toggle input-mini" data-toggle="dropdown" type="button">
                                                            Select Product Type    <span class="caret"></span></button>-->
                                                        <select class=" form-control " id="productType">
                                                            <option  value="-1">Product Type </option>
                                                           <?php
                                                               
                                                           //$_SESSION['name']=$_SESSION['name'];
                                                           (mysql_connect('localhost', 'root', '')and mysql_select_db('indentmanagementsystem'))or die('Error connecting database');
                                                           
                                                           $sql = "SELECT `productTypeId`, `productType` FROM `producttype`";
                                                          
                                                       
                                                           if ($res = mysql_query($sql)) {
                                                                    if (mysql_num_rows($res) > 0) {
                                                                        while ($row = mysql_fetch_assoc($res)) {
                                                                            echo '<option value="'.$row['productTypeId'].'">'.($row['productType']).'</option>';
                                                                                 
                                                                        }
            
                                                                    }
                                                            }
                                                           
                                                           ?>
                                                        </select>
                                                        </div>
                                                    </div>         
                                                        
                                            </div>
                                       </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-sm-4">
                                            <label for="price">Price per Unit: </label>
                                            <input type="tel" id="price" class="form-control " placeholder="Price per unit" >
                                        </div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <label for="dateUpdated"  >Date:</label>
                                            
                                            <input type="date" id="dateUpdated" class="form-control" placeholder="Enter last price updated date">
                                            <h6 style="color: red" ><strong>*Date is last price updated date</strong></h6>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    
                                    <div>
                                        
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                        <center>
                                            <button type="button" class="btn btn-info"  onclick="addProductFunc();" >Add Product</button>
                                        </center>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    
                                </form> 
                                
                            </div>
                       
                        <div class="col-sm-2"></div>
                       
                    </div>
                    
                    <div id="response" style="display: none">
                      <center>   <span id="responseSpan"></span>
                         
                          <button class="btn btn-info" id="backButton" onclick="load('addproduct.php')">Back</button>
                          &nbsp;
                          <button class="btn btn-info" id="backButton" onclick="load('content.php')">Home</button>
                         
                      </center>
                     </div>
            </nav>
            <script>
                function load(loc){
                     window.location=loc;
                }
            </script>

            <script>
            function addProductFunc() {
                
                var pn=document.getElementById("productName").value;
                var pt= document.getElementById("productType").value;
                var pr= document.getElementById("price").value;
                var date=document.getElementById("dateUpdated").value;
                
                var data="?prdName='"+pn+"'&prdType="+pt+"&price="+pr+"&date="+date;
                
                var xmlhttp;
                if (pn==' '||pt==' '||pr==-1) { 
                    document.getElementById("response").innerHTML = "";
                    return;
                } else {
                     xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("mainDiv").style.display= 'none';
                            document.getElementById("response").style.display='block' ;
                            document.getElementById("responseSpan").innerHTML = xmlhttp.responseText;
                        }
                    };
                                       
                
                  xmlhttp.open("GET", "add.php"+data , true);
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>