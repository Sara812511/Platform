<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  $username = $_POST['username'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (isset($_POST['reg_user'])) { // إرسال بيانات إنشاء الحساب للداتابيز
    $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) { // للتأكد من ان الإيميل استخدم في حساب اخر ام لا؟
      echo "<script> alert('عذراً هذا الإيميل أستخدم في حساب اخر'); </script>";
    } else {  //في حالة عدم وجود الإيميل في حساب اخر
      if (!empty($username) && !empty($password) && !empty($email) && !is_numeric($username)) {
        $query = "insert into user (username,email,password) values ('$username','$email','$password')";
        mysqli_query($con, $query);
        echo "<script> alert('تم إنشاء الحساب بنجاح'); </script>";
      } else {
        echo "<script> alert('عذراً لا يتم قبول الأرقام في إسم المستخدم'); </script>";
      }
    }
  }
}
if (isset($_POST['login_user'])) { //إدخال بيانات حسابك لتسجيل الدخول والتحقق منها من الداتا بيز
  if (isset($_POST['username']) && isset($_POST['password'])) {

    if (empty($username)) {
      echo "<script> alert('الأسم مطلوب'); </script>";
    } else if (empty($password)) {
      echo "<script> alert('كلمة السر مطلوبة'); </script>";
    } else {
      $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $username && $row['password'] === $password) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          header("Location: mrhila.php");
        } else {
          echo "<script> alert('خطأ في الإسم أو كلمة السر'); </script>";
        }
      } else {
        echo "<script> alert('خطأ في الإسم أو كلمة السر'); </script>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="new.css" />
  <title>تسجيل الدخول</title>
  <script>
  </script>
</head>


<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form method="post" action="" class="sign-in-form">
          <h2 class="title">تسجيل الدخول</h2>
          <div class="input-field">
            <i class="fasfa-user"></i>
            <input style="text-align: right;" name="username" id="text" type="text" placeholder="اسم المستخدم" required value="" />
          </div>
          <div class="input-field">
            <i class="fasfa-lock" style="float: right;"></i>
            <input style="text-align: right;" name="password" id="password" type="password" placeholder="كلمة السر" required value="" />
          </div>
          <input type="submit" class="btn" name="login_user" href="mrhila.php" value="تسجيل دخول" />
        </form>


        <form method="post" action="" class="sign-up-form">
          <h2 class="title">إنشاء حساب</h2>
          <div class="input-field">
            <i class="fasfa-user"></i>
            <input style="text-align: right;" name="username" id="text" type="text" placeholder=" اسم المستخدم" required value="" />
          </div>
          <div class="input-field">
            <i class="fasfa-envelope"></i>
            <input style="text-align: right;" name="email" id="email" type="email" placeholder=" الايميل" required value="" />
          </div>
          <div class="input-field">
            <i class="fasfa-lock"></i>
            <input style="text-align: right;" name="password" id="password" type="password" placeholder="كلمة السر " required value="" />
          </div>
          <input type="submit" class="btn" name="reg_user" href="new.php" value="إنشاء حساب" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>ليس لديك حساب بالفعل؟</h3>
          <p style=" font-size: large;">
            ! الرجاء انشاء حساب حتى تتمكن من الدخول الى المنصة؛ والتفاعل معها
          </p>
          <button style="font-family: monospace;" class="btn transparent" id="sign-up-btn">
            إنشاء حساب
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>لديك حساب بالفعل؟</h3>
          <p style="font-size: large;">

          </p>
          <button style="font-family: monospace;" class="btn transparent" id="sign-in-btn">
            تسجيل الدخول
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>


</body>
<script src="app.js"></script>

</html>