<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

    session_start();
//            
            
                
//            ($con=mysql_connect('localhost', 'root', '')and mysql_select_db('indentmanagementsystem'))or die('Error connecting database');
            if($con=mysql_connect('localhost', 'root', '')){
                if( mysql_select_db('indentmanagementsystem')){
                                
                    
                                $productName=$_GET['prdName'];
                                $productType=$_GET['prdType'];
                                $price=$_GET['price'];
                                $d=date('Y-m-d',  strtotime($_GET['date']) );
                                //$d= date(,$_GET['date']);
                                
                                $sql = "INSERT INTO `product`(`ProductName`, `ProductType`, `PricePerUnit`, `lastUpdatedDate`) VALUES 
                                    (".$productName.",".$productType."," .$price.",'".$d."')";
                             
                                  if(!mysql_query($sql, $con)){
                                    echo '<div class="container">
                                                <h3 class="jumbotran" style="color: blue">'.'Error in adding product'.'</h3>
                                            </div>
                                            ' ;  
                                  }else{
                                      echo '<div class="container">
                                                <h3 class="jumbotran" style="color: blue">Product Added Successfully!</h3>
                                            </div>
                                            ';
                                  }
                                    
                }
                
                //echo ' db selected true';
                    
                else{
                    echo 'err in db select';
                }
            }else{
                echo 'false';
            }
//            echo ''.mysql_connect('localhost', 'root', '');
           // echo '<html>   <h1 style="color: red" ><strong>*Date is last price updated date</strong></h1></html>';

           // echo mysql_query($sql,$con);
//            if(!mysql_query($sql)){
//                echo '<script>alert("error in entering data")</script>';
//                //header('Location:'.'addproduct.php');
//            }else{
//                echo '<script>alert("Product Added")</script>';
//                //header('Location:'.'content.php');
//            }
?>
