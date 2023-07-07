<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>about us</h3>
   <p><a href="home.php">home</a> <span> / about</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="imagen/tiend-r.png" alt="">
      </div>
     
      <div class="content">
         <h3>porque confiar en nosotros?</h3>
         <p>En nuestra empresa de venta de alimentos agrícolas, nos enorgullecemos de ofrecer a nuestros clientes una amplia variedad de productos agrícolas frescos y de alta calidad. Trabajamos directamente con agricultores locales que comparten nuestros valores de sostenibilidad y agricultura responsable, lo que nos permite ofrecer una amplia variedad de productos orgánicos y de temporada. Nos esforzamos por mantener los más altos estándares de calidad en todos nuestros productos y en todo el proceso de compra y entrega. Puede confiar en nosotros para proporcionarle alimentos frescos y saludables, mientras apoyamos a los agricultores locales y promovemos prácticas agrícolas sostenibles.</p>
         <a href="product.html" class="btn">nuestros productos</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">3 simples pasos</h1>
     
   <div class="box-container">
  
      <div class="box">
         <img src="imagen/step-1.png" alt="">
         <h3>selecciona tu producto</h3>
         <p>En nuestra tienda, ofrecemos una cuidadosa selección de productos de alta calidad.</p>
      </div>
  
      <div class="box">
         <img src="imagen/step-2.png" alt="">
         <h3>delivery</h3>
         <p>En nuestra tienda en línea, ofrecemos un servicio de entrega confiable y conveniente. </p>
      </div>
  
      <div class="box">
         <img src="imagen/step-3.png" alt="">
         <h3>a disfrutar!</h3>
         <p>Nos encanta ver a nuestros clientes disfrutar de nuestros productos frescos.</p>
      </div>
  
   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">comentarios</h1>
     
   <div class="swiper reviews-slider">
  
      <div class="swiper-wrapper">
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-1.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-2.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-3.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-4.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-5.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
         <div class="swiper-slide slide">
            <img src="imagen/pic-6.png" alt="">
            <p>Estoy muy impresionado con la calidad de los productos que compré en esta tienda en línea. Los productos frescos y sabrosos llegaron en perfectas condiciones gracias al servicio de entrega rápido y eficiente.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>
  
      </div>
  
      <div class="swiper-pagination"></div>
  
   </div>

   

      

</section>

<!-- reviews section ends -->



















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>