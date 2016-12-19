<?php
session_start();

if ($con = mysql_connect('localhost', 'root', '')) {
    if (mysql_select_db('indentmanagementsystem')) {


        $customerName=$_GET['cstName'];
        $mobileNumber=$_GET['mobile'];
        $address=$_GET['addr'];
        
        $sql = "INSERT INTO `customer`(`Address`, `CustomerName`, `mobileNumber`) VALUES ('" . mysql_real_escape_string($address)
                . "'," .($customerName) . "," .($mobileNumber) . ")";

        if (!mysql_query($sql, $con)) {
            echo '<div class="container">
                                                <h3 class="jumbotran" style="color: blue">' . mysql_error() . '</h3>
                                            </div>
                                            ';
        } else {
            echo '<div class="container">
                                                <h3 class="jumbotran" style="color: blue">Product Added Successfully!</h3>
                                            </div>
                                            ';
        }
    }

    //echo ' db selected true';
    else {
        echo 'err in db select';
    }
} else {
    echo 'false';
}
//          
?>
