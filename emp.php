<?php


$DB_HOST = 'localhost';
$DB_USER= 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'company';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD,$DB_DATABASE);
if(!$con) {
    die('Failed to connect to server: ' . mysql_error());
}

// Retrieve the employee’s ID from the request

if(isset($_GET['ID'])){
    $id=$_GET['ID'];
    
}
// Using the employee’s ID, retrieve contact details (Office and Phone) of this employee from the database.
$sql="SELECT Phone,Office FROM employees WHERE ID = '" . $_GET['ID'] . "'";
$result= mysqli_query($con,$sql);
$newarray=array();
if ($result){
    
    while ($row= mysqli_fetch_assoc($result)){
        
     header("Content-Type: text/plain");
     $row= json_encode($row);
                    print_r($row);
    
    }
     
}
// Return the contact details (Office and Phone) of this employee as a plain text response
                   

?>