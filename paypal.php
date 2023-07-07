<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AUdshouW11PoenQhoNyCDoX4rbFs6qCDsce0vRFsKwKXpptRd0aZGx7kqhnx-KLGmyQheTnC0ZJiN4ca&currency=USD"></script>
</head>


<body>

    <div id="paypal-button-container""></div>
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape:'pill',
                label:'pay'
            },
            createOrder:function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value:100
                        }
                    }]
                });
            },

            onApprove: function(data,actions){
                actions.order.capture().then(function(detalles){
                    window.location.href="http://localhost:8081/food%20website%20backend/home.php"
                });
            },

            onCancel:function(data){
                alert("pago cancelado");
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>