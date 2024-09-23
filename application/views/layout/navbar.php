<style>
  .menu-overlay {
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

  .search-overlay {
    display: none;
    position: fixed; /* 화면에 고정 */
    top: 0; /* 화면의 맨 위에 위치 */
    left: 0;
    width: 100vw; /* 전체 화면 너비 */
    height: 100vh; /* 전체 화면 높이 */
    background-color: rgba(0, 0, 0);
    z-index: 1050; /* 다른 요소들보다 위에 표시되도록 설정 */
    overflow-y: auto; /* 내용이 넘칠 경우 스크롤 허용 */
    flex-direction: column; /* 세로 방향 정렬 */
    align-items: center; /* 수평 중앙 정렬 */
    padding: 20px; /* 상하좌우 여백 */
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
    width: 100%;
    max-width: 500px; /* 최대 너비 설정 */
    padding: 40px 20px; /* 상하좌우 여백 */
    border-radius: 10px; /* 모서리를 둥글게 */
    margin-top: 20px; /* 상단에서 약간의 여백 */
  }

  .search-box .input-group {
    position: relative;
    width: 100%;
    border-bottom: 5px solid white; /* 검색창 하단의 흰색 테두리 */
    border-radius: 0;
  }

  .search-input {
    width: 100%;
    background: none;
    border: none;
    padding: 10px;
    font-size: 18px;
    color: white;
    outline: none;
  }

  /* 검색 인풋 클릭 시 스타일 */
  .search-input:focus {
    background-color: black; /* 클릭 시 배경을 검은색으로 */
    color: white; /* 글씨만 흰색 */
  }

  /* 플레이스홀더 스타일 */
  .search-input::placeholder {
    color: white; /* 플레이스홀더 글씨 흰색 */
    font-size: 20px; /* 글씨 크기 */
  }
  @media (max-width: 768px) {
    .search-input::placeholder {
      color: white; /* 플레이스홀더 글씨 흰색 */
      font-size: 1.0rem; /* 글씨 크기 */
    }
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
    z-index: 10;
  }
  @media (max-width: 768px) {
    .search-icon > img {
      width : 20px;
      z-index: 10;
    }
  }


  a {
    color: black; /* 링크 색깔을 검은색으로 설정 */
    text-decoration: underline;
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

  /* 모바일 뷰에서 아이콘을 한 줄에 배치 */
  @media (max-width: 767.98px) {
    .navbar-nav, .d-flex {
      flex-direction: row; /* 아이콘들이 한 줄에 배치되도록 설정 */
      align-items: center;
    }
  }

  /* 기본적인 부트스트랩5 유틸리티 클래스를 활용 */
  .navbar-nav {
    margin-left: 0;
    margin-right: auto;
  }

  .navbar-nav .nav-item {
    margin-left: 15px;
  }

  .navbar-toggler {
    border: none;
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
    font-size: 39px; /* 글씨 크기 설정 */
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

  .site-menu {
    font-family: "Pretendard Variable-ExtraBold";
  }

  .sns-menu {
    font-family: "Pretendard Variable-SemiBold";
  }

  @font-face {
    font-family: "Pretendard Variable-ExtraBold";
    src: url('/assets/fonts/Pretendard-ExtraBold.woff') format('woff-variations');
  }

  @font-face {
    font-family: "Pretendard Variable-SemiBold";
    src: url('/assets/fonts/Pretendard-SemiBold.woff') format('woff-variations');
  }
</style>

<nav class="navbar navbar-expand-md bg-body mt-3 py-3">
  <div class="container d-flex align-items-center">
    <!-- 메뉴 아이템 (왼쪽) -->
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link active pc-mo-menu" href="#">Menu</a>
      </li>
    </ul>

    <!-- 로고 (중앙) -->
    <a class="navbar-brand mx-auto" href="/main">
      <img src="/assets/img/tripperLogo.png" alt="Logo" style="width: 88px; height: 28px;">
    </a>

    <!-- 검색 아이콘 및 사용자 아이콘 (오른쪽) -->
    <div class="d-flex align-items-center ms-auto">
      <div class="d-none d-md-block me-1">
        <div class="input-group border-secondary border-0 border-bottom"></div>
      </div>
      <!-- <a class="nav-link me-3" href="#">
        <i class="fas fa-search text-dark" style="width: 22px; height: 22px;"></i>
      </a> -->
      <?php if($this->agent->is_mobile()){?>
        <a class="nav-link" href="#" style="padding: 3px;"><i class="fas fa-search pc-search text-dark" style="width: 22px; height: 22px;"></i></a>
      <?php }else{ ?>
        <a class="nav-link" href="#" style="padding: 3px;"><i class="fas fa-search pc-search text-dark" style="width: 22px; height: 22px;"></i></a>
      <?php } ?>
      <!-- 로그인 상태에 따른 마이페이지 또는 로그인 링크 -->
      <?php if($this->session->userdata('user_id')) { ?>
        <a class="nav-link" href="/mypage" style="padding: 3px;">
          <i class="far fa-user" style="width: 22px; height: 22px;"></i>
        </a>
      <?php } else { ?>
        <a class="nav-link" href="/login" style="padding: 3px;">
          <i class="far fa-user" style="width: 22px; height: 22px;"></i>
        </a>
      <?php } ?>
    </div>
  </div>
</nav>

<!-- 메뉴 오버레이 -->
<div id="menu-overlay" class="menu-overlay">
  <div class="menu-box mt-4">
    <div class="menu-group">
      <ul class="site-menu">
        <li><a href="/main" class="text-light text-uppercase">home</a></li>
        <li><a href="/main/archiveTripper" class="text-light text-uppercase">archive</a></li>
        <li><a href="/main/findTripperGoods" class="text-light text-uppercase">find</a></li>
        <li><a href="/main/aboutTripper" class="text-light text-uppercase">about</a></li>
      </ul>

      <hr class="custom-hr mt-5 mb-5">

      <ul class="sns-menu">
        <li><a href="https://smartstore.naver.com/tripper_lounge" class="text-light text-uppercase">shop</a></li>
        <li><a href="https://page.stibee.com/subscriptions/240273" class="text-light text-uppercase">newsletter</a></li>
        <li><a href="https://www.instagram.com/trippers_me/" class="text-light text-uppercase">instagram</a></li>
        <li><a href="https://www.youtube.com/channel/UCqKnJKhEXwjd0_oXRtFCD2g" class="text-light text-uppercase">youtube</a></li>
      </ul>
    </div>
  </div>

  <div class="container d-flex align-items-center justify-content-between" style="height: 30vh;">
    <a class="me-auto align-items-center" href="/main">
      <img src="/assets/img/menuTripperLogo.svg" alt="Logo" style="width: 50%; height: 28px;">
    </a>
    <div class="d-flex align-items-center flex-grow-1 justify-content-center pe-5" style="cursor: pointer;">
      <img src="/assets/img/upperArrow.svg" alt="Upper Arrow" id="upperArrow1">
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
    <div class="input-group mt-5">
      <input type="text" class="form-control search-input" id="searchKeyword" placeholder="어떤 여행지 또는 크리에이터를 찾으시나요?" />
      <span class="input-group-text search-icon" onclick="searchArticle()">
        <img src="/assets/img/search.svg" alt="search icon">
      </span>
    </div>
    <div class="button-group mt-5">
      <button class="search-button text-uppercase">space</button>
      <button class="search-button text-uppercase">creator</button>
    </div>

    <div class="mt-5 centered-text-overlay-container">
      <div class="centered-text-overlay text-light">RECENTLY CONTENTS</div>
    </div>

    <!-- Slider main container -->
    <div class="mt-2 w-100 swiper recent-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper mb-5">
        <!-- Slides -->
        <?php foreach($article_recent as $list): ?>
        <div class="swiper-slide">
          <div class="card menu" onclick="location.href='/main/articleDetail?id=<?= $list['id'] ?>'">
            <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?= $list['c_name']; ?></h6>
              <h4 class="card-title"><?= $list['title']; ?></h4>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination recent-pagination"></div>
    </div>

    <div class="mt-7 centered-text-overlay-container">
      <div class="centered-text-overlay text-light">BEST CONTENTS</div>
    </div>

    <!-- Slider main container -->
    <div class="mt-2 w-100 swiper views-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper mb-5">
        <!-- Slides -->
        <?php foreach($article_popular as $list): ?>
        <div class="swiper-slide">
          <div class="card menu" onclick="location.href='/main/articleDetail?id=<?= $list['id'] ?>'">
            <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?= $list['c_name']; ?></h6>
              <h4 class="card-title"><?= $list['title']; ?></h4>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination views-pagination"></div>
    </div>
  </div>

  <div class="container d-flex align-items-center justify-content-between" style="height: 30vh;">
    <a class="me-auto align-items-center" href="/main">
      <img src="/assets/img/menuTripperLogo.svg" alt="Logo" style="width: 50%; height: 28px;">
    </a>
    <div class="d-flex align-items-center flex-grow-1 justify-content-center pe-5" style="cursor: pointer;">
      <img src="/assets/img/upperArrow.svg" alt="Upper Arrow" id="upperArrow2">
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

<script src="/assets/js/swiper.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script>
  // 메뉴 버튼 클릭 이벤트
  document.querySelector('.pc-mo-menu').addEventListener('click', function() {
    document.getElementById('menu-overlay').style.display = 'flex'; // 메뉴 오버레이 표시
  });

  // 메뉴 오버레이에서 바깥 영역 클릭 시 숨기기
  document.getElementById('menu-overlay').addEventListener('click', function(event) {
    if (event.target === this) {
      this.style.display = 'none'; // 메뉴 오버레이 숨김
    }
  });

  //오버레이 내부 화살표 클릭 시 오버레이 숨기기
  document.addEventListener('DOMContentLoaded', function() {
    const upperArrow1 = document.getElementById('upperArrow1');
    const upperArrow2 = document.getElementById('upperArrow2');

    if (upperArrow1) {
      upperArrow1.addEventListener('click', function() {
        document.getElementById('menu-overlay').style.display = 'none';
      });
    }

    if (upperArrow2) {
      upperArrow2.addEventListener('click', function() {
        document.getElementById('search-overlay').style.display = 'none';
      });
    }
  });

  //검색 버튼 클릭 이벤트 (PC)
  document.querySelector('.pc-search').addEventListener('click', function() {
    document.getElementById('search-overlay').style.display = 'flex'; // 검색 오버레이 표시
  });

  //검색 버튼 클릭 이벤트 (모바일)
  // document.querySelector('.mo-search').addEventListener('click', function() {
  //   document.getElementById('search-overlay').style.display = 'flex'; // 검색 오버레이 표시
  // });

  // 검색 오버레이에서 바깥 영역 클릭 시 숨기기
  document.getElementById('search-overlay').addEventListener('click', function(event) {
    if (event.target === this) {
      this.style.display = 'none'; // 검색 오버레이 숨김
    }
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

  //글 검색
  function searchArticle(){
    var keyword = document.getElementById('searchKeyword').value;

    location.href="/main/search_article_list?sk="+encodeURIComponent(keyword);

    return;
  }
</script>