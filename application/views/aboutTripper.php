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

    .mt-8 {
      margin-top: 8rem !important;
    }
    
    .mt-7 {
      margin-top: 6.5rem !important;
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

    <div class="container h-100 mt-7">
      <div class="row h-100">
        <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
          <div>
            <h2 class="text-uppercase fw-bold mb-3 text-secondary">find your trip</h2>
            <h2 class="fw-bold mb-3">일상속 새로운 국내여행의 가치 발견</h2>

            <img src="/assets/img/aboutTripper.svg" alt="" class="mt-4 mb-4 img-fluid">
            
            <p class="text-center fs-5">
              트리퍼는 국내 여행 크리에이터들과 함께
              <br />
              <span class="fw-bold">국내 매력있는 동네를 콘텐츠로 알리고 관광지를 모티브로 매력있는 굿즈를 만들고 있어요</span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Slider main container -->
    <div class="mt-8 w-95 swiper first-about-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination first-about-pagination"></div> -->
    </div>
    

    <!-- Slider main container -->
    <div class="mt-6 w-95 swiper second-about-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
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
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination second-about-pagination"></div> -->
    </div>

    <?php include_once("layout/footer_company_info.php")?>

    <!-- 스크립트 위치를 body 태그 안으로 이동 -->
    <script src="/assets/js/swiper.js"></script>
    <script>
      let firstAboutSwiper = new Swiper('.first-about-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.first-about-pagination',
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          576: {
            slidesPerView: 2,
            spaceBetween: 5,
          }
        }
      });
      
      let secondAboutSwiper = new Swiper('.second-about-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.second-about-pagination',
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          576: {
            slidesPerView: 2,
            spaceBetween: 5,
          }
        }
      });
    </script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>
