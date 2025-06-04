<?php
include('../config/database.php');
session_start();

if(!isset($_SESSION['user_id'])){
    header('refresh:0; URL=http://localhost/pet-store2/src/');
}


$email = $_POST['e_mail'];  
$passw = $_POST['p_assw'];

//$hashed_password = passw($passw, PASSWORD_DEFAULT);
$hashed_password = $passw;
//$hashed_password = passw($passw, PASSWORD_DEFAULT);

$sql="
select
--u.id,
count(u.id) as total
from 
users u
where
email='$email' and password='$hashed_password'
--group by 
--id"
;
$res = pg_query($conn, $sql);
if($res){
    $row = pg_fetch_assoc($res);
    if($row['total'] > 0){

$sql_data="
select
u.id, u.firstname
from 
users u
where
email='$email' and password='$hashed_password'
limit 1
";
$res_data = pg_query($conn, $sql_data);
$row_data = pg_fetch_assoc($res_data);

        $_SESSION['user_id'] = $row_data['id'];
        $_SESSION['user_name'] = $row_data['firstname'];
       
        header('refresh:0; URL=http://localhost/pet-store2/src/');
    } else {
      
        echo "<script>alert('Login failed!!!!')</script>";
        header('refresh: 0; URL=http://localhost/pet-store2/src/login.html');
    }
} 
?>