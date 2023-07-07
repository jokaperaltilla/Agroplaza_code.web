<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

$json = file_get_contents('php://input');
$data = json_decode($json, true);


if(is_array($data)){
    $id_transaccion = $data['detalles']['id'];
    echo($data);
}

?>