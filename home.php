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
   <title>Home</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slide">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>compra online</span>
               <h3>frutas</h3>
               <a href="product.php" class="btn">ver productos</a>
            </div>
            <div class="image">
               <img src="imagen/fruta-removebg-preview.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>compra online</span>
               <h3>verduras</h3>
               <a href="product.php" class="btn">ver productos</a>
            </div>
            <div class="image">
               <img src="imagen/ver-removebg-preview.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>compra online</span>
               <h3>menestras</h3>
               <a href="product.php" class="btn">ver producto</a>
            </div>
            <div class="image">
               <img src="imagen/menes-removebg-preview.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">Categoria de productos</h1>

   <div class="box-container">

      <a href="category.php?category=fruta" class="box">
         <img src="imagen/manzana-removebg-preview.png" alt="">
         <h3>fruta</h3>
      </a>

      <a href="category.php?category=verdura" class="box">
         <img src="imagen/papa-removebg-preview.png" alt="">
         <h3>verdura</h3>
      </a>

      <a href="category.php?category=menestra" class="box">
         <img src="imagen/menest-removebg-preview.png" alt="">
         <h3>menestra</h3>
      </a>

   </div>

</section>




<section class="products">

   <h1 class="title">productos destacados</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>S/ </span><?= $fetch_products['price']; ?><span> x Kg</span></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.html" class="btn">mas productos</a>
   </div>

</section>


















<?php include 'components/footer.php'; ?>


   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
         var swiper = new Swiper(".hero-slide", {
            
            spaceBetween: 30,
            centeredSlides: true,
            effect:"flip",
            autoplay: {
               delay: 4500,
               disableOnInteraction: false,
            },
            pagination: {
               el: ".swiper-pagination",
               clickable: true,
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
         });
   </script>

</body>
</html>