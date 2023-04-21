<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $playlist = $_POST['playlist'];
   $playlist = filter_var($playlist, FILTER_SANITIZE_STRING);

   $thumb = $_FILES['thumb']['name'];
   $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
   $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
   $rename_thumb = unique_id().'.'.$thumb_ext;
   $thumb_size = $_FILES['thumb']['size'];
   $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
   $thumb_folder = '../uploaded_files/'.$rename_thumb;

   $video = $_FILES['video']['name'];
   $video = filter_var($video, FILTER_SANITIZE_STRING);
   $video_ext = pathinfo($video, PATHINFO_EXTENSION);
   $rename_video = unique_id().'.'.$video_ext;
   $video_tmp_name = $_FILES['video']['tmp_name'];
   $video_folder = '../uploaded_files/'.$rename_video;

   if($thumb_size > 2000000){
      $message[] = 'Kích thước hình ảnh quá lớn!';
   }else{
      $add_playlist = $conn->prepare("INSERT INTO `content`(id, tutor_id, playlist_id, title, description, video, thumb, status) VALUES(?,?,?,?,?,?,?,?)");
      $add_playlist->execute([$id, $tutor_id, $playlist, $title, $description, $rename_video, $rename_thumb, $status]);
      move_uploaded_file($thumb_tmp_name, $thumb_folder);
      move_uploaded_file($video_tmp_name, $video_folder);
      $message[] = 'Khóa học mới đã được upload thành công!';
   }

   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="video-form">

   <h1 class="heading">Upload khóa học</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Trạng thái video<span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled><--Trạng thái--></option>
         <option value="active">Hoạt động</option>
         <option value="deactive">Ngưng hoạt động</option>
      </select>
      <p>Tiêu đề<span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="Vui lòng nhập tiêu đề video!" class="box">
      <p>Mô tả<span>*</span></p>
      <textarea name="description" class="box" required placeholder="Vui lòng nhập mô tả!" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Danh sách phát video<span>*</span></p>
      <select name="playlist" class="box" required>
         <option value="" disabled selected><--Chọn danh sách phát--></option>
         <?php
         $select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
         $select_playlists->execute([$tutor_id]);
         if($select_playlists->rowCount() > 0){
            while($fetch_playlist = $select_playlists->fetch(PDO::FETCH_ASSOC)){ //tra ve du lieu dang mang la ten cot 
         ?>
         <option value="<?= $fetch_playlist['id']; ?>"><?= $fetch_playlist['title']; ?></option>
         <?php
            }
         ?>
         <?php
         }else{
            echo '<option value="" disabled>Danh sách phát chưa được thêm!</option>';
         }
         ?>
      </select>
      <p>Chọn thumbnail <span>*</span></p>
      <input type="file" name="thumb" accept="image/*" required class="box">
      <p>Chọn video <span>*</span></p>
      <input type="file" name="video" accept="video/*" required class="box">
      <input type="submit" value="Upload khóa học" name="submit" class="btn">
   </form>

</section>

<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>