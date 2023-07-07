<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->

    <div class="heading">
        <h3>payment detail</h3>
        <p><a href="html.php">home</a> <span> / payment detail</span></p>
    </div>
    <section class="orders">

   <h1 class="title">detalle de pago</h1>

   <div class="box-container">

      <?php
         if($user_id == ''){
            echo '<p class="empty">por favor ingrese para ver sus pedidos</p>';
         }else{
            $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY id DESC LIMIT 1");
            $select_orders->execute([$user_id]);
            if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
      ?>
         <div class="row">
            <div class="col-6">
               <h4>sdas</h4>
               <div id="paypal-button-container""></div>
               <h4>adsasd</h4>
               
            </div>
         </div>
         <div class="box">
            <p>pedido n° : <span><?= $fetch_orders['placed_on']; ?></span></p>
            <p>nombre : <span><?= $fetch_orders['name']; ?></span></p>
            <p>email : <span><?= $fetch_orders['email']; ?></span></p>
            <p>numero : <span><?= $fetch_orders['number']; ?></span></p>
            <p>direccion : <span><?= $fetch_orders['address']; ?></span></p>
            <p>metodo de pago : <span><?= $fetch_orders['method']; ?></span></p>
            <p>tu pedido : <span><?= $fetch_orders['total_products']; ?></span></p>
            <p>total : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
         </div>
      <?php
         }
         }else{
            echo '<p class="empty">no orders placed yet!</p>';
         }
         }
      ?>

   </div>

</section>


<script src="https://www.paypal.com/sdk/js?client-id=AUdshouW11PoenQhoNyCDoX4rbFs6qCDsce0vRFsKwKXpptRd0aZGx7kqhnx-KLGmyQheTnC0ZJiN4ca&currency=USD"></script>
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

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>