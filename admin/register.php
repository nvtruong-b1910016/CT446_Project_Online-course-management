<?php

include '../components/connect.php';

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $profession = $_POST['profession'];
   $profession = filter_var($profession, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ?");
   $select_tutor->execute([$email]);
   
   if($select_tutor->rowCount() > 0){
      $message[] = 'Email đã tồn tại!';
   }else{
      if($pass != $cpass){
         $message[] = 'Xác nhận passowrd không khớp!';
      }else{
         $insert_tutor = $conn->prepare("INSERT INTO `tutors`(id, name, profession, email, password, image) VALUES(?,?,?,?,?,?)");
         $insert_tutor->execute([$id, $name, $profession, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'Đăng ký thành công! Đăng nhập ngay bây giờ?';
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
   <title>Đăng ký</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body style="padding-left: 0;">

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message form">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Đăng ký</h3>
      <div class="flex">
         <div class="col">
            <p>Tên của bạn <span>*</span></p>
            <input type="text" name="name" placeholder="Vui lòng nhập tên của bạn!" maxlength="50" required class="box">
            <p>Lĩnh vực chuyên môn <span>*</span></p>
            <select name="profession" class="box" required>
               <option value="" disabled selected><--Chọn lĩnh vực--></option>
               <option value="Development">Development</option>
               <option value="Design">Desgin</option>
               <option value="Music">Music</option>           
               <option value="Business">Business</option>
               <option value="Marketing">Marketing</option>

            </select>
            <p>Email <span>*</span></p>
            <input type="email" name="email" placeholder="Vui lòng nhập email!" maxlength="20" required class="box">
         </div>
         <div class="col">
            <p>Password <span>*</span></p>
            <input type="password" name="pass" placeholder="Vui lòng nhập password!" maxlength="20" required class="box">
            <p>Xác nhận password <span>*</span></p>
            <input type="password" name="cpass" placeholder="Vui lòng xác nhận password!" maxlength="20" required class="box">
            <p>Chọn ảnh đại diện <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
         </div>
      </div>
      <p class="link">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
      <input type="submit" name="submit" value="Đăng ký" class="btn">
   </form>

</section>

<script>

let darkMode = localStorage.getItem('dark-mode');
let body = document.body;

const enabelDarkMode = () =>{
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enabelDarkMode();
}else{
   disableDarkMode();
}

</script>
   
</body>
</html>