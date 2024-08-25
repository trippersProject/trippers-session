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
    a {
      color: black; /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
    }
    
    a:hover {
      color: darkgray; /* 마우스를 올렸을 때 색깔을 어두운 회색으로 변경 (선택 사항) */
    }
    
    .container button {
      background-color: transparent; /* 배경색 제거 */
      border: none; /* 테두리 제거 */
      color: #000;
      letter-spacing: 1px; /* 글씨 간격 조절 */
      padding: 10px 20px; /* 버튼 패딩 조정 (옵션) */
      cursor: pointer; /* 버튼 클릭 시 커서 모양 변경 */
    }

    .container button:hover {
      color: #F36523;
      text-decoration: underline;
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

    .fixed-size {
      width: 1400px;
      height: 800px;
      object-fit: cover;
    }

    .badge-container {
      display: flex;
      gap: 5px; /* 배지 간의 간격 조절 */
    }
    
    .badge-container h6 {
      margin: 0;
    }

    /* Swiper 카드 슬라이드 스타일 */
    .swiper-slide {
      display: flex;
      justify-content: center; /* 카드 가운데 정렬 */
      align-items: center; /* 카드 가운데 정렬 */
      padding: 10px; /* 카드 간격 조정 */
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
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="mt-2">
      <div style="height: 600px; background-image: url(https://cdn.bootstrapstudio.io/placeholders/1400x800.png); background-position: center; background-size: cover;">
        <div class="container h-100">
          <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-6 text-center">
              <h1 class="fw-bold">‘아마도’라는 말로 일단 시작했어요</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container text-center mt-6 fw-bold fs-4">
      <button class="text-uppercase">all</button>
      <button class="text-uppercase">dongnae</button>
      <button class="text-uppercase">creator</button>
    </div>

    <div class="container mt-6 w-95">
      <div class="row mb-5 g-4"> <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test3.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test4.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="row g-4"> <!-- 두 번째 행 카드 사이 간격 조정 -->
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h5 class="card-title">DONGNAE</h5>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge bg-secondary">경남김해</span></h6>
                <h6><span class="badge bg-secondary">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-8">
      <img src="/assets/img/tripletter.png" alt="Trip Letter Image" class="img-fluid d-block mx-auto">
    </div>
  </div>

  <?php include_once("layout/footer_company_info.php")?>

  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
