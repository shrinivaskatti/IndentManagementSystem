<?php
session_start();
if(!isset($_SESSION['name'])){  
    session_destroy();
    header('Location:'.'back.php');
       
}
    //$_SESSION['name']=$_SESSION['name'];
   (mysql_connect('localhost', 'root', '')and mysql_select_db('indentmanagementsystem'))or die('Error connecting database');

    
    
    

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>IMS</title>
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
        
        <link rel="stylesheet" href="./bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap.css">
        <script src="./jquery.min.js"></script>
        <script src="./bootstrap.min.js"></script>
       
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
                                echo ' '.$_SESSION['name'];
                             ?>
                            </strong></a>
                </div>
                    
                    <ul class="nav nav-tabs ">
                        <li class="active"><a href="content.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-gift"></span> Products
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li><a href="addproduct.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Product</a></li>
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
              <div class="jumbotron">
                <div class="row">
                    
                    <div class="col-sm-6  " >
                        <marquee direction="up" scrolldelay="10"  height="25%" behavior="scroll">
                            <h3><u> <strong>Current IOC Prices</strong> </u></h3><br>
                            <label style="font-size: 20; font-weight:900; color: #000000"> Petrol Price:  </label>
                        <?php
                            $sql = "SELECT * FROM `product` WHERE `ProductID`='1223' or `ProductID`='1235'";
                            if($res = mysql_query($sql)){
                                if(mysql_num_rows($res)>0){
                                    while($row=  mysql_fetch_assoc($res)){
                                        if($row['ProductID']=='1223'){
                                            $PetrolPrice=$row['PricePerUnit'];
                                        }
                                        if($row['ProductID']=='1235'){
                                            $DieselPrice=$row['PricePerUnit'];
                                        }
                                        $ldate=$row['lastUpdatedDate'];
                                        
                                    }
                                }
                            }   
                            echo '<strong style="color: #000000; font-weight:900; font-size: 20"> '.$PetrolPrice.'  </strong>&#8377/Ltr';
                            echo '<br><br>';
                            ?>
                        
                            <label style="font-size: 20; font-weight:900; color: #000000"> Diesel Price:  </label>
                        <?php
                        
                            echo '<strong style="color:#000000 ;font-weight:900; font-size: 20"> '.$DieselPrice.' </strong>&#8377/Ltr';
                        ?>
                        </marquee>
                    </div>
                    
                    <div class="col-sm-6 ">
                        
                        <center>                                
                                <img id="displaypitcure" class="img-responsive" src="./profilePictures/admin.jpg" style="border-radius: 200%;width:150;height:150; " >
                               
                        
                            <div class="row-sm-6">
                                <br>
                               
                                <?php
                                    echo '<strong style="font-size: 25; color: #666666">'.$_SESSION['name'].'</strong>';
                                ?>
                                 
                            </div>
                        </center>
                        
                    </div>
                        
                             
                </div>
                  
            </div>
            </nav>
                    <marquee scrollamount="8" behavior="alternate"><h4>
                         <?php 
                            if($ldate==NULL){
                                
                                $ldate='Last updated price date is not available';
                                echo $ldate;
                             }
                             else{
                                 echo 'Petrol and Diesel price is last updated on <strong style="color: red"> '.$ldate.'</strong>';
                             }
                          ?>
                        </h4>
                    </marquee>
  </body>
</html>
    
