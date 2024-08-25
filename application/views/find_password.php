<!DOCTYPE html>
<html lang="ko" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>trippers</title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/css/Navbar-Centered-Brand-icons.css">
  
  <link rel="stylesheet" href="/assets/css/globals.css" />
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/swiper.css" />

  <style>
  a {
    color: black; /* 링크 색깔을 검은색으로 설정 */
    text-decoration: underline;
  }

  .custom-btn {
    background-color: #000; /* Black background */
    color: #fff; /* White text */
    border-radius: 0; /* Remove rounded corners to make the button rectangular */
    border: none; /* Remove any default border */
    padding: 10px; /* Add padding for a better look */
    text-transform: uppercase; /* Uppercase text for consistency */
    font-weight: bold; /* Bold text */
  }

  .custom-btn:hover {
    background-color: #757575; /* Slightly lighter black on hover */
  }

  .custom-input {
    background-color: #f2f2f2; /* Light gray background */
    color: #000; /* Black text */
    border-radius: 0; /* Remove rounded corners to make the input rectangular */
    padding: 10px; /* Add padding for a better look */
    box-shadow: none; /* Remove any default shadow */
  }

  .custom-input:focus {
    background-color: #e6e6e6; /* Slightly darker gray on focus */
    border-color: #999; /* Darker border color on focus */
    outline: none; /* Remove default outline */
  }

  .mt-8 {
    margin-top: 8rem !important;
  }

  .mt-6 {
    margin-top: 5rem !important;
  }

  .logo-container {
    display: inline-block;
    text-align: center;
  }

  .logo-underline {
    height: 5px;
    width: 70px; /* Adjust the width as needed */
    background-color: #000; /* Black color for the underline */
    margin: 0 auto;
    margin-top: 8px; /* Adjust spacing between the image and the underline */
  }

  .logo-img {
    width: 70px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin: 0 auto;
  }
</style>
</head>

<body>
  <div class="container-fluid">
  <?php include_once("layout/navbar.php")?>

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 border-0" style="width: 40rem;">
      <h3 class="text-center text-uppercase mb-5">password</h3>
      <div class="text-center mt-5 mb-5">
        <a href="#">가입한 이메일주소를 입력하시면, 비밀번호 재설정 안내 메일을 보내드립니다.</a>
      </div>
      <form>
        <div class="text-center mb-3">
          <label for="email" class="form-label">이메일주소</label>
          <input type="email" class="form-control custom-input" id="email" style="cursor: text;" required>
        </div>
        <div class="mt-5 d-grid">
          <button type="submit" class="btn custom-btn">이메일 발송하기</button>
        </div>
      </form>
    </div>
  </div>

  <?php include_once("layout/footer_company_info.php")?>

  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
