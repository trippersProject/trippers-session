<?php include_once("layout/header.php")?>

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
    background-color: #333; /* Slightly lighter black on hover */
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

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="card p-4 border-0" style="width: 26rem;">
        <h3 class="text-center text-uppercase mb-5">Login</h3>
        <form action="/login/user_login" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">이메일</label>
            <input type="email" class="form-control custom-input" id="email" name="email" style="cursor: text;" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control custom-input" id="password" name="password" style="cursor: text;" required>
          </div>
          <div class="d-flex mt-6 gap-2">
            <button class="btn custom-btn w-50" onclick="location.href='/login/user_join'">회원가입</button>
            <button type="submit" class="btn custom-btn w-50">로그인</button>
          </div>
          <div class="mt-5 d-grid">
            <button type="submit" class="btn custom-btn" id="kakao-login-btn">카카오로 로그인</button>
          </div>
          <!-- TODO:API키 발급시 추가예정 -->
          <!--<div class="mt-5 d-grid">
            <button type="submit" class="btn custom-btn">네이버로 로그인</button>
          </div> -->
        </form>
        <div class="text-start mt-5">
          <a href="/login/find_password">비밀번호를 찾으셔야 하나요?</a>
        </div>
      </div>
    </div>

    <?php include_once("layout/footer_company_info.php")?>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!--카카오 로그인SDK-->
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script type="text/javascript">
      Kakao.init('56a1c900f2e28369e788af88ad6d2bd6'); // 여기에 Kakao API 키를 입력합니다.

      // Kakao 로그인 버튼 클릭 시 실행될 함수
      document.getElementById('kakao-login-btn').addEventListener('click', function() {
        Kakao.Auth.login({
          success: function(authObj) {
            // 로그인이 성공하면 Kakao 사용자 정보를 가져옵니다.
            Kakao.API.request({
              url: '/v2/user/me',
              success: function(res) {
                // 로그인 성공 후 사용자 정보를 처리합니다.
                // 예: 서버로 사용자 정보 전달
                var userData = {
                  id: res.id,
                  nickname: res.properties.nickname,
                  email: res.kakao_account.email
                };
                
                // AJAX로 서버에 로그인 정보 전달
                $.ajax({
                  url: '/login/kakao_login',
                  method: 'POST',
                  data: userData,
                  success: function(response) {
                    // 서버 처리 성공 시 원하는 작업 수행
                    console.log(response);
                  }
                });
              },
              fail: function(error) {
                console.log(error);
              }
            });
          },
          fail: function(err) {
            alert('Kakao 로그인 실패');
            console.log(err);
          }
        });
      });
    </script>
  </body>

</html>
