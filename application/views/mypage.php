<!DOCTYPE html>
<html data-bs-theme="light" lang="ko">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>trippers</title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/css/Navbar-Centered-Brand-icons.css">

  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/swiper.css" />

  <style>
    .modal-content {
      border-radius: 0;
      /* 테두리를 직사각형으로 */
    }

    .modal-body {
      padding: 2rem;
      /* 모달 바디의 패딩을 조절하여 간격을 띄움 */
    }

    .custom-btn {
      margin-top: 1rem;
      /* 버튼과 텍스트 사이의 간격 */
    }

    #findBtn,
    #yourBtn,
    #tripBtn {
      background-color: transparent;
      /* 배경색 제거 */
      border: none;
      /* 테두리 제거 */
      color: #000;
      letter-spacing: 1px;
      /* 글씨 간격 조절 */
      padding: 10px 20px;
      /* 버튼 패딩 조정 (옵션) */
      cursor: pointer;
      /* 버튼 클릭 시 커서 모양 변경 */
    }

    /* :hover 상태에 대한 스타일 */
    #findBtn:hover,
    #yourBtn:hover,
    #tripBtn:hover {
      color: #F36523;
      text-decoration: underline;
    }

    /* 고정된 콘텐츠 영역 스타일 */
    .fixed-content {
      overflow-y: auto;
      /* 콘텐츠가 넘칠 경우 스크롤 추가 */
      box-sizing: border-box;
      /* 패딩을 포함한 박스 모델 */
      width: 100%;
      /* 콘텐츠 영역 너비를 100%로 설정 */
      margin: 0 auto;
      /* 중앙 정렬을 위해 자동 마진 적용 */
    }

    a {
      color: black;
      /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
    }

    .custom-btn {
      background-color: #000;
      /* Black background */
      color: #fff;
      /* White text */
      border-radius: 0;
      /* Remove rounded corners to make the button rectangular */
      border: none;
      /* Remove any default border */
      padding: 10px;
      /* Add padding for a better look */
      text-transform: uppercase;
      /* Uppercase text for consistency */
      font-weight: bold;
      /* Bold text */
      width: 100% !important;
      /* 버튼의 너비를 80%로 설정 */
      margin: 0 auto;
      /* 중앙 정렬을 위해 자동 마진 적용 */
    }

    .custom-btn:hover {
      background-color: #a7a3a3;
      /* Slightly lighter black on hover */
    }

    .custom-input {
      background-color: #f2f2f2;
      /* Light gray background */
      color: #000;
      /* Black text */
      border-radius: 0;
      /* Remove rounded corners to make the input rectangular */
      padding: 10px;
      /* Add padding for a better look */
      box-shadow: none;
      /* Remove any default shadow */
      width: 100% !important;
    }

    .custom-input:focus {
      background-color: #e6e6e6;
      /* Slightly darker gray on focus */
      border-color: #999;
      /* Darker border color on focus */
      outline: none;
      /* Remove default outline */
    }

    .mt-8 {
      margin-top: 8rem !important;
    }

    .mt-6 {
      margin-top: 5rem !important;
    }

    .mb-7 {
      margin-bottom: 6.5rem !important;
    }

    .logo-container {
      display: inline-block;
      text-align: center;
    }

    .logo-underline {
      height: 5px;
      width: 70px;
      /* Adjust the width as needed */
      background-color: #000;
      /* Black color for the underline */
      margin: 0 auto;
      margin-top: 8px;
      /* Adjust spacing between the image and the underline */
    }

    .logo-img {
      width: 70px;
      /* Adjust the width as needed */
      height: auto;
      /* Maintain aspect ratio */
      display: block;
      margin: 0 auto;
    }

    .badge-container {
      display: flex;
      gap: 5px;
      /* 배지 간의 간격 조절 */
    }

    .badge-container h6 {
      margin: 0;
    }

    /* 카드 스타일 */
    .card {
      width: 100%;
      max-width: 23rem; /* 카드 최대 너비 */
      transition: transform 0.2s ease-in-out;
      border: none; /* 테두리 제거 */
      box-shadow: none; /* 그림자 제거 */
      text-align: center; /* 텍스트 중앙 정렬 */
    }

    /* 카드 이미지 */
    .card-img-top {
      width: 100%;
      height: auto;
    }

    /* 카드 내용 */
    .card-body {
      display: flex;
      flex-direction: column;
      align-items: center; /* 내용 중앙 정렬 */
      padding: 1rem;
    }
    
    .card img {
      margin: 0 auto; /* 이미지 중앙 정렬 */
    }

    .card-text {
      font-size: 0.9rem;
    }

    .card-title-sub {
      font-size: 1.0rem;
    }

    @media (max-width: 768px) {
      .card {
        width: 14rem;
      }
    }

    @media (max-width: 576px) {
      .card {
        width: 12rem;
      }
    }

    .badge-container {
      display: flex;
      gap: 5px; /* 배지 간의 간격 조절 */
    }
    
    .badge-container h6 {
      margin: 0;
    }

    .badge {
      display: inline-block;
      padding: 5px 10px;
      margin: 2px;
      background-color: #f0f0f0; /* Light grey background */
      border: 1px solid #ccc; /* Light grey border */
      border-radius: 4px; /* Slightly rounded corners, adjust as needed */
      font-size: 14px;
      color: #000; /* Black text color */
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="container d-flex justify-content-center align-items-center mt-6 mb-7">
      <div class="border-0">
        <div class="container text-center mt-6 fw-bold fs-4">
          <button id="findBtn" class="text-uppercase">find</button>
          <button id="yourBtn" class="text-uppercase">your</button>
          <button id="tripBtn" class="text-uppercase">trip</button>
        </div>
        <div class="container text-center mt-3 fs-5 fixed-content">
          <!-- 각 콘텐츠 영역에 d-none 클래스를 사용하여 기본적으로 숨김 -->
          <div id="findContent" class="content d-none">
            <h4 class="text-center mt-5 mb-5"><?= $info['name'];?> 트리퍼, 안녕하세요 😉</h4>
            <div class="mt-6 d-grid">
              <p>현재 보유중인 <span class="text-uppercase">find point</span></p>
              <button type="text" class="btn custom-btn"><?= $info['point']?> 포인트</button>
            </div>
            <div class="mt-6 d-grid">
              <p><span class="text-uppercase">find shop</span> 사용횟수</p>
              <button type="text" class="btn custom-btn"><?=$use_point ?>회</button>
            </div>
          </div>
          <div id="yourContent" class="content d-none">
              <div class="mt-5 mb-3">
                <label for="username" class="form-label text-start w-100">이름(닉네임) *</label>
                <input type="text" class="form-control custom-input" id="username" name="username" style="cursor: text;" value="<?= $info['name'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label text-start w-100">이메일 주소(변경불가)</label>
                <input type="email" class="form-control custom-input" id="email" name="email" value="<?= $info['email'] ?>"
                  style="cursor: text;" disabled>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label text-start w-100">휴대폰 번호 *</label>
                <input type="text" class="form-control custom-input" id="phone" name="phone" style="cursor: text;" value="<?= $info['phone'] ?>"
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label text-start w-100">비밀번호 *</label>
                <input type="password" class="form-control custom-input" id="password" name="password" style="cursor: text;" required>
              </div>
              <div class="mb-3">
                <label for="password-verify" class="form-label text-start w-100">비밀번호 확인 *</label>
                <input type="password" class="form-control custom-input" id="password-verify" style="cursor: text;"
                  required>
              </div>
              <div class="mt-6 d-grid">
                <button class="btn custom-btn" onclick="modifyUserInfo()">수정하기</button>
              </div>

            <button type="button" class="btn custom-btn mt-5" data-bs-toggle="modal"
              data-bs-target="#withdrawalMembershipModal">
              탈퇴하기
            </button>

            <!-- Modal -->
            <div class="modal fade" id="withdrawalMembershipModal" tabindex="-1"
              aria-labelledby="withdrawalMembershipModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center p-5">
                  <div class="modal-body">
                    <h2 class="fs-5 lh-lg" id="withdrawalMembershipModalLabel">
                      탈퇴하면 모든 데이터가 삭제됩니다.
                      <br />
                      <span class="fw-bold">마무리 하려면 아래 버튼을 클릭해주세요</span>
                    </h2>
                    <button type="button" class="btn custom-btn mt-3" onclick="dismissUser()">탈퇴하기</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div id="tripContent" class="content d-none mb-5">
            <div class="container mt-6 w-100">
              <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
              <div class="row mb-5 g-4">

              <?php foreach($like_article as $list): ?>
                <div class="col-md-3">
                  <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
                    <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                      <h6 class="card-title"><strong><?= $list['category']; ?></strong></h6>
                      <h4 class="card-title-sub"><strong><?= $list['title']; ?></strong></h4>
                      <p class="card-text article-truncate"><?= $list['content_sub']; ?></p>
                      <div class="badge-container">
                      <?php 
                        $tags = explode("#", $list['tag']);
                        for($i = 1; $i < count($tags); $i++): 
                      ?>
                        <h6><span class="badge"><?= $tags[$i]; ?></span></h6>
                      <?php endfor; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

              <?php foreach($scrap_article as $list): ?>
                <div class="col-md-3">
                  <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
                    <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                      <h6 class="card-title"><strong><?= $list['category']; ?></strong></h6>
                      <h4 class="card-title-sub"><strong><?= $list['title']; ?></strong></h4>
                      <p class="card-text article-truncate"><?= $list['content_sub']; ?></p>
                      <div class="badge-container">
                      <?php 
                        $tags = explode("#", $list['tag']);
                        for($i = 1; $i < count($tags); $i++): 
                      ?>
                        <h6><span class="badge"><?= $tags[$i]; ?></span></h6>
                      <?php endfor; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <?php include_once("layout/footer_company_info.php")?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const findBtn = document.getElementById('findBtn');
        const yourBtn = document.getElementById('yourBtn');
        const tripBtn = document.getElementById('tripBtn');

        const findContent = document.getElementById('findContent');
        const yourContent = document.getElementById('yourContent');
        const tripContent = document.getElementById('tripContent');

        const myModal = document.getElementById('withdrawalMembershipModal');
        if (myModal) {
          myModal.addEventListener('shown.bs.modal', () => {

          });
        }

        if (findBtn) {
          setTimeout(() => {
            findBtn.click(); // Ensure this is called after the button is fully loaded
          }, 0);
        }

        // 버튼 클릭 시 관련 콘텐츠만 보이도록 설정하는 함수
        function showContent(contentToShow) {
          [findContent, yourContent, tripContent].forEach(content => {
            if (content) content.classList.add('d-none');
          });
          if (contentToShow) contentToShow.classList.remove('d-none');
        }

        if (findBtn) findBtn.addEventListener('click', () => {
          showContent(findContent);
        });

        if (yourBtn) yourBtn.addEventListener('click', () => {
          showContent(yourContent);
        });

        if (tripBtn) tripBtn.addEventListener('click', () => {
          showContent(tripContent);
        });
      });


    //회원정보 수정
    function modifyUserInfo() {
      // 폼 데이터 수집
      var formData = {
        username: $('#username').val(),
        phone: $('#phone').val(),
        password: $('#password').val(),
        password_verify: $('#password-verify').val(),
      };

      // 입력 데이터 유효성 검사
      if (!formData.username || !formData.phone || !formData.password || !formData.password_verify) {
        alert('모든 필수 입력 항목을 채워주세요.');
        return;
      }
      // 비밀번호와 비밀번호 확인 일치 여부 검사
      if (formData.password !== formData.password_verify) {
        alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
        return;
      }

      // AJAX 요청
      $.ajax({
        url: '/mypage/modify_user_info',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
          // 성공 시 처리할 내용
          if(response.code == '0000') {
            alert(response.msg);
            window.location.href = '/mypage'; // 성공 페이지로 리디렉션
          } else {
            alert(response.msg);
          }
        },
        error: function(xhr, status, error) {
          // 에러 발생 시 처리할 내용
          console.error(error);
          alert('오류가 발생했습니다. 다시 시도해 주세요.');
        }
      });
    }

    //유저 탈퇴하기
    function dismissUser(){
      const password = $('#password').val();
      const password_verify = $('#password-verify').val();

      // 비밀번호와 비밀번호 확인 일치 여부 검사
      if (password || password_verify) {
        alert('비밀번호를 입력해주세요');
        return;
      }

      // 비밀번호와 비밀번호 확인 일치 여부 검사
      if (password !== password_verify) {
        alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
        return;
      }

      // AJAX 요청
      $.ajax({
        url: '/mypage/dismiss_user',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          // 성공 시 처리할 내용
          if(response.code == '0000') {
            alert(response.msg);
            window.location.href = '/main'; // 메인페이지로 리디렉션
          } else {
            alert(response.msg);
          }
        },
        error: function(xhr, status, error) {
          // 에러 발생 시 처리할 내용
          console.error(error);
          alert('오류가 발생했습니다. 다시 시도해 주세요.');
        }
      });
    }
    </script>
</body>

</html>