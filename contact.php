<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $name = $_POST['name']; 
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $email = $_POST['email']; 
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number']; 
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg']; 
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if($select_contact->rowCount() > 0){
      $message[] = 'Tin nhắn đã được gửi!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'Gửi tin nhắn thành công!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên hệ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>


<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>Liên Hệ</h3>
         <input type="text" placeholder="Vui lòng nhập tên!" required maxlength="100" name="name" class="box">
         <input type="email" placeholder="Vui lòng nhập email!" required maxlength="100" name="email" class="box">
         <input type="number" min="0" max="9999999999" placeholder="Vui lòng nhập số điện thoại!" required maxlength="10" name="number" class="box">
         <textarea name="msg" class="box" placeholder="Vui lòng nhập tin nhắn!" required cols="30" rows="10" maxlength="1000"></textarea>
         <input type="submit" value="Gửi tin nhắn" class="inline-btn" name="submit">
      </form>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Số điện thoại</h3>
         <a href="tel:0907171907">0907171907</a>
         <a href="tel:0794388536">0794388536</a>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>Email</h3>
         <a href="mailto:B1910016@gmail.com">B1910016@gmail.com</a>
         <a href="mailto:B1910020@gmail.com">B1910020@gmail.com</a>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>Địa chỉ</h3>
         <a href="#">Đường 3/2 - Phường Xuân Khánh - Quận Ninh Kiều - Thành Phố Cần Thơ</a>
      </div>


   </div>

</section>

<?php include 'components/footer.php'; ?>  
<script src="js/script.js"></script>
   
</body>
</html>