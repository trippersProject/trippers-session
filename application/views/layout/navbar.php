<style>
  .menu-overlay,
  .search-overlay {
    display: none; /* 처음에는 숨김 */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0); /* 검정색 불투명 배경 (0.5는 조금 더 투명하게 변경) */
    z-index: 1050; /* Bootstrap modal과 같은 z-index로 설정 */
    overflow-y: auto; /* 세로 스크롤 가능하도록 설정 */
    flex-direction: column; /* 내용이 세로 방향으로 쌓이게 설정 */
    align-items: center; /* 수평 중앙 정렬 */
    justify-content: center; /* 수직 중앙 정렬 */
    padding: 20px; /* 내부 여백 추가 */
  }

  /* 버튼 그룹 스타일 */
  .button-group {
    display: flex;
    justify-content: flex-start;
    gap: 12px; /* 버튼 사이 간격 */
  }

  .search-button {
    background-color: #6c757d; /* 회색 배경색 */
    color: white; /* 흰색 글씨 */
    border: none; /* 테두리 없음 */
    padding: 10px 20px; /* 버튼의 패딩 (상하 10px, 좌우 20px) */
    font-size: 16px; /* 글씨 크기 */
    border-radius: 0; /* 직사각형 모양 */
    cursor: pointer; /* 커서를 포인터로 변경 */
  }
  
  .search-button:hover {
    background-color: #5a6268; /* 마우스를 올렸을 때 배경색 변경 */
  }

  /* 중앙의 검색창 스타일 */
  .search-box {
    width: 80%;
    height: 100vh;
    max-width: 500px;
  }

  .search-box .input-group {
    position: relative;
    width: 100%;
    border-bottom: 5px solid white; /* 검색창 하단의 흰색 테두리 */
    border-radius: 0;
  }

  .search-input {
    background: none;
    border: none; /* 테두리 없애기 */
    padding: 10px;
    font-size: 18px;
    color: white;
    outline: none; /* 클릭 시 외곽선 없애기 */
  }

  /* 검색 인풋 클릭 시 스타일 */
  .search-input:focus {
    background-color: black; /* 클릭 시 배경을 검은색으로 */
    color: white; /* 글씨만 흰색 */
  }

  /* 플레이스홀더 스타일 */
  .search-input::placeholder {
    color: white; /* 플레이스홀더 글씨 흰색 */
    font-size: 24px; /* 글씨 크기 */
  }

  .search-icon {
    position: absolute;
    right: 10px; /* 오른쪽에 검색 아이콘 위치 */
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
  }


  a {
    color: black; /* 링크 색깔을 검은색으로 설정 */
    text-decoration: underline;
  }

  .mt-8 {
    margin-top: 8rem !important;
  }

  .mt-6 {
    margin-top: 5rem !important;
  }

  /* 카드 스타일 */
  .recent-swiper .card,
  .views-swiper .card {
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
  .menu .card-body {
    display: flex;
    flex-direction: column;
    align-items: center; /* 내용 중앙 정렬 */
    padding: 1rem;
    background-color: black; /* 카드 바디 배경 검정색 */
    color: white; /* 텍스트 흰색 */
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

  .centered-text-overlay-container {
    display: flex;
    justify-content: center; /* 가로 방향 중앙 정렬 */
    align-items: center; /* 세로 방향 중앙 정렬 */
    width: 100%;
    height: 100px; /* 높이 조정 */
    margin-top: 20px; /* 상단 여백 */
    position: relative; /* 부모 컨테이너에서 상대 위치 설정 */
  }

  .centered-text-overlay {
    text-align: center; /* 텍스트를 화면 중앙에 위치 */
    position: relative; /* 밑줄을 위한 상대 위치 지정 */
    display: inline-block; /* 텍스트 길이에 맞게 밑줄 적용 */
    margin: 0 auto; /* 중앙 정렬 */
    padding-bottom: 5px; /* 밑줄과 텍스트 간격 조정 */
    font-weight: 800;
    font-size: 24px;
  }
  
  .centered-text-overlay::after {
    content: ""; /* 가상 요소 생성 */
    display: block;
    width: 100%; /* 밑줄의 길이 */
    height: 2px; /* 밑줄의 두께 */
    background-color: #fff; /* 밑줄 색상 */
    position: absolute;
    bottom: 0;
    left: 0;
  }

  #menuTripperLogo {
    margin-right: auto; /* Push the logo to the left */
  }

  #upperArrow {
    margin: 0 auto;
  }

  .icons-container {
    display: flex;
    gap: 10px;
  }

  #searchIcon, #userIcon {
    width: 22px;
    height: 22px;
    margin: 0;
  }

  /* 내비게이션 바의 스타일 */
  .navbar-nav {
    flex-direction: row; /* 메뉴 아이템을 수평으로 배열 */
  }

  .navbar-nav .nav-item {
    margin-left: 15px; /* 메뉴 아이템 간격 조정 */
  }

  .navbar-toggler {
    border: none; /* 버튼 테두리 제거 */
  }

  @media (max-width: 767.98px) {
    .navbar-nav {
      flex-direction: column; /* 작은 화면에서는 메뉴를 수직으로 배열 */
    }

    .navbar-nav .nav-item {
      margin-left: 0; /* 작은 화면에서는 간격 제거 */
      margin-bottom: 10px; /* 메뉴 아이템 간격 조정 */
    }
  }

  .menu-group {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center; /* 수직 중앙 정렬 */
    margin-top: 0; /* 초기 마진 제거 */
    margin-bottom: 0; /* 초기 마진 제거 */
  }

  .menu-group ul {
    list-style-type: none; /* li 스타일 점 제거 */
    padding: 0; /* 기본 padding 제거 */
    margin: 0; /* 기본 margin 제거 */
    text-align: center;
  }

  .menu-group ul li {
    margin-bottom: 10px; /* 각 li 항목 간의 간격 설정 */
  }

  .menu-group ul li a {
    text-decoration: none; /* 기본 밑줄 제거 */
    color: lightgray; /* 텍스트 색상 */
  }

  .menu-group .site-menu li a {
    font-size: 48px; /* 글씨 크기 설정 */
  }

  .menu-group ul li a:hover {
    text-decoration: underline !important;
    color: #F36523 !important;
  }

  .custom-hr {
    width: 30%;
    height: 4px;
    background-color: #fff;
    border: none;
    margin: 0 auto; /* 중앙 정렬 */
    opacity: 1; /* 완전히 흰색으로 설정 */
  }

  .menu-box {
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* 공간을 균등하게 분배 */
    height: 100vh;
  }
</style>

<nav class="navbar navbar-expand-md bg-body mt-3 py-3" style="height: 50px;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="/main" style="margin: 0px -50px 0px 0px;">
      <img src="/assets/img/tripperLogo.png" style="width: 88px;height: 28px;">
    </a>
    <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4">
      <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active pc-mo-menu" href="#">Menu</a></li>
        <li class="nav-item"></li>
      </ul>
      <div class="d-md-none my-2">
        <a class="nav-link" href="#"><i class="fas fa-search text-dark mo-search" style="width: 22px;height: 22px;text-align: center;"></i></a>
        <a class="nav-link" href="#" style="padding: 8px;"><i class="far fa-user" style="width: 22px;height: 22px;text-align: center;"></i></a>
      </div>
    </div>
    <div class="d-none d-md-block">
      <ul class="navbar-nav ms-auto" style="width: 120px;margin: 0px;">
        <li class="nav-item me-5">
          <div class="input-group border-secondary border-0 border-bottom"></div>
        </li>
        <li class="nav-item mx-1"><a class="nav-link" href="#"><i class="fas fa-search text-dark pc-search" style="width: 22px;height: 22px;text-align: center;"></i></a></li>
        <li class="nav-item mx-1"><a class="nav-link" href="/login" style="padding: 8px;"><i class="far fa-user" style="width: 22px;height: 22px;text-align: center;"></i></a></li>
      </ul>
    </div>
  </div>
</nav>
    
<!-- 메뉴 오버레이 -->
<div id="menu-overlay" class="menu-overlay">
  <div class="menu-box">
    <div class="menu-group">
      <ul class="site-menu">
        <li><a href="/main" class="text-light text-uppercase">home</a></li>
        <li><a href="/main/archiveTripper" class="text-light text-uppercase">archive</a></li>
        <li><a href="/main/findTripperGoods" class="text-light text-uppercase">find</a></li>
        <li><a href="/main/aboutTripper" class="text-light text-uppercase">about</a></li>
      </ul>

      <hr class="custom-hr mt-5 mb-5">

      <ul class="sns-menu">
        <li><a href="" class="text-light text-uppercase">shop</a></li>
        <li><a href="" class="text-light text-uppercase">newsletter</a></li>
        <li><a href="" class="text-light text-uppercase">instagram</a></li>
        <li><a href="" class="text-light text-uppercase">youtube</a></li>
      </ul>
    </div>
  </div>

  <div class="container d-flex align-items-center justify-content-between" style="height: 30vh;">
    <a class="me-auto" href="/main">
      <img src="/assets/img/menuTripperLogo.svg" alt="Logo" style="width: 88px; height: 28px;">
    </a>
    <div class="d-flex align-items-center flex-grow-1 justify-content-center pe-5" style="cursor: pointer;">
      <img src="/assets/img/upperArrow.svg" alt="Upper Arrow" id="upperArrow">
    </div>
    <div class="d-flex align-items-center">
      <a class="me-auto" href="#">
        <img src="/assets/img/search.svg" alt="Search" id="searchIcon" class="me-2">
      </a>
      <a class="me-auto" href="/login">
        <img src="/assets/img/user.svg" alt="User" id="userIcon">
      </a>
    </div>
  </div>
</div>

<div id="search-overlay" class="search-overlay">
  <div class="search-box">
    <div class="input-group mt-8">
      <input type="text" class="form-control search-input" placeholder="어떤 여행지 또는 크리에이터를 찾으시나요?" />
      <span class="input-group-text search-icon" onclick="">
        <img src="/assets/img/search.svg" alt="search icon">
      </span>
    </div>
    <div class="button-group mt-5">
      <button class="search-button text-uppercase">dongnae</button>
      <button class="search-button text-uppercase">creator</button>
    </div>

    <div class="mt-5 centered-text-overlay-container">
      <div class="centered-text-overlay text-light">최신 콘텐츠</div>
    </div>

    <!-- Slider main container -->
    <div class="mt-2 w-100 swiper recent-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper mb-5">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test3.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test4.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h5 class="card-title">DONGNAE</h5>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination recent-pagination"></div>
    </div>

    <div class="mt-7 centered-text-overlay-container">
      <div class="centered-text-overlay text-light">조회수 높은 콘텐츠</div>
    </div>

    <!-- Slider main container -->
    <div class="mt-2 w-100 swiper views-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper mb-5">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test3.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test4.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card menu">
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h5 class="card-title">DONGNAE</h5>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination views-pagination"></div>
    </div>

    <div class="arrow-container">
      <img src="/assets/img/upperArrow.svg" alt="Upper Arrow" id="close-overlay">
    </div>
  </div>
</div>

<script src="/assets/js/swiper.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script>
  // menu 클릭 이벤트
  document.querySelector('.pc-mo-menu').addEventListener('click', function() {
    document.getElementById('menu-overlay').style.display = 'flex'; // 오버레이 표시
  });

  // 오버레이 클릭 시 숨기기
  document.getElementById('menu-overlay').addEventListener('click', function(event) {
    if (event.target === this) {
      this.style.display = 'none'; // 오버레이 숨김
    }
  });

  // SVG 클릭 시 오버레이 숨기기
  document.getElementById('upperArrow').addEventListener('click', function() {
    document.getElementById('menu-overlay').style.display = 'none'; // 오버레이 숨김
  });

  // SVG 클릭 시 오버레이 숨기기
  document.getElementById('close-menu-overlay').addEventListener('click', function() {
    document.getElementById('menu-overlay').style.display = 'none'; // 오버레이 숨김
  });


  // PC - 검색 아이콘 클릭 이벤트
  document.querySelector('.pc-search').addEventListener('click', function() {
    document.getElementById('search-overlay').style.display = 'flex'; // 오버레이 표시
  });

  // 모바일 - 검색 아이콘 클릭 이벤트
  document.querySelector('.mo-search').addEventListener('click', function() {
    document.getElementById('search-overlay').style.display = 'flex'; // 오버레이 표시
  });

  // 오버레이 클릭 시 숨기기
  document.getElementById('search-overlay').addEventListener('click', function(event) {
    if (event.target === this) {
      this.style.display = 'none'; // 오버레이 숨김
    }
  });

  // SVG 클릭 시 오버레이 숨기기
  document.getElementById('close-overlay').addEventListener('click', function() {
    document.getElementById('search-overlay').style.display = 'none'; // 오버레이 숨김
  });

  let recentSwiper = new Swiper('.recent-swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: '.recent-pagination',
      clickable: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 10,
      }
    }
  });

  let viewsSwiper = new Swiper('.views-swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: '.views-pagination',
      clickable: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 10,
      }
    }
  });
</script>