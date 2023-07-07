<?php
use PHPMailer\PHPMailer\{PHPMailer, SMTP, Eception};
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email, $number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email or number already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
         $insert_user->execute([$name, $email, $number, $cpass]);
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $select_user->execute([$email, $pass]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){

            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';
            require 'phpmailer/src/Exception.php';

            $mail = new PHPMailer(true);

            try {
               //Server settings
               //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
               $mail->isSMTP();
               $mail->Host       = 'smtp.gmail.com';
               $mail->SMTPAuth   = true;
               $mail->Username   = 'wilberpaitan1612@gmail.com';
               $mail->Password   = 'fdetmdrfwfcgkgfz';
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
               $mail->Port       = 465;

               //Recipients
               $mail->setFrom('wilberpaitan1612@gmail.com', 'Agroplaza');
               $mail->addAddress($email);

               //Content
               $mail->isHTML(true);
               $mail->Subject = 'Activar cuenta - Agroplaza';
               
               $cuerpo = 'Estimado usuario <br> Para continuar con el proceso de registro es necesario de click en el siguiente link <a href="http://localhost/Agroplaza.final/home.php">Activar cuenta</a>';
              
               $mail->Body    = utf8_decode($cuerpo);
               $mail->AltBody = 'le enviamos su correo';

               $mail->setLanguage('es','phpmailer/language/phpmailer.lang-es.php');

               $mail->send();
               echo "Para culminar el proceso de registro siga las instrucciones que se enviaron a su correo";
            } catch (Exception $e) {
               echo "error al enviar el correo: {$mail->ErrorInfo}";
            }

            //$_SESSION['user_id'] = $row['id'];
            // require 'mailer.php';
            // $mailer = new mailer();
            // $url = "http://localhost:8081/food%20website%20backend/home.php" . 'activa_cliente.php?id=';
            // $asunto = "Activar cuenta - Agroplaza";
            // $cuerpo = "Estimado $name: <br> Para continuar con el proceso de registro es necesario de click en el siguiente link <a href='$url'>Activar cuenta</a>";
            // //header('location:home.php');
            // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //    if($mailer->enviarEmail($email,$asunto,$cuerpo)){
            //       echo "Para culminar el proceso de registro siga las instrucciones que se enviaron a su correo";
            //    }
            // }
            
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">

   <form action="" method="post">
      <h3>registrate ahora</h3>
      <input type="text" name="name" required placeholder="ingresa tu nombre" class="box" maxlength="50">
      <input type="email" name="email" required placeholder="ingresa tu correo" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="number" name="number" required placeholder="ingresa tu numero" class="box" min="0" max="9999999999" maxlength="10">
      <input type="password" name="pass" required placeholder="ingresa tu contraseña" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirma tu contraseña" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="registrate" name="submit" class="btn">
      <p>ya tienes una cuenta? <a href="login.php">login now</a></p>
   </form>

</section>











<?php include 'components/footer.php'; ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>