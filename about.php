<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Về chúng tôi</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Tại sao bạn nên chọn chúng tôi?</h3>
         <p>Bởi đây là một điểm đến chất lượng mang đến nhiều lợi ích thiết thực nhất. Với học sinh khi học dưới sự chỉ dạy của gia sư đều được cải thiện vè kiến thức nhanh chóng. Chỉ trong vòng một thời gian rất ngắn phụ huynh giáo viên sẽ ngạc nhiên với sự tiến bộ vượt bậc của học sinh.</p>
         <a href="courses.php" class="inline-btn">Khóa học của chúng tôi</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>Khóa học trực tuyến</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+25k</h3>
            <span>Học viên xuất sắc</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>Gia sư chuyên môn cao</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>>90%</h3>
            <span>Cơ hội việc làm</span>
         </div>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="heading">Đánh giá của học viên</h1>

   <div class="box-container">

      <div class="box">
         <p>Mình rất hài lòng về phương pháp giảng dạy, kiến thức mới luôn được cập nhật, học viên dễ dàng tiếp thu, nguồn tài liệu phong phú.</p>
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>Khả như</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Tôi cảm nhận được sau khoảng thời gian theo học là gia sư có chuyên môn rất tốt, thái độ nhiệt tình, sẵn sàng giúp đỡ học viên trong lúc khó khăn.</p>
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>Bảo Nguyễn</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Mình và các bạn có thể học tập mọi lúc mọi nơi, bất kì nơi đâu có interner, rất thuận tiện cho những người bận rộn mà vẫn muốn trao dồi thêm kiến thức như mình.</p>
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>Nguyễn Việt Hoàng</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Các video giảng dạy khá dễ hiểu, luôn được cập nhật kịp thời những kiến thức mới, phương pháp học có ví dụ minh họa rất trực quan và sinh động.</p>
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>Như tâm</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Có nhiều chủ đề khác nhau để chúng ta lựa chọn, tin tôi đi bạn sẽ thấy rất cuốn hút với những kiến thức sẽ được học ở đây, sự bổ trợ tuyệt vời đấy các bạn.</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>Hải Trần</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Mình và các bạn có thể học tập mọi lúc mọi nơi, bất kì nơi đâu có interner, rất thuận tiện cho những người bận rộn mà vẫn muốn trao dồi thêm kiến thức như mình.</p>
         <div class="user">
            <img src="images/pic-7.jpg" alt="">
            <div>
               <h3>Ái my</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

   </div>

</section>

<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
   
</body>
</html>