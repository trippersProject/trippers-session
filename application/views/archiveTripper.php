<?php $category=''; ?>
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
      width: 100%;
      height: auto;
      max-height: 1000px; /* 최대 높이 설정 */
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

    .article-truncate {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3; /* 최대 줄 수 */
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .responsive-image {
      display: block;
      max-width: 100%;
    }

    @media (max-width: 768px) {
      .card {
        width: 24rem !important;
      }

      .fixed-size {
        width: 100%; /* 부모 요소의 가로 크기에 맞게 */
        height: 200px; /* 원하는 고정 높이 */
        object-fit: cover; /* 이미지가 고정된 영역을 덮도록 비율 조정 */
        object-position: center; /* 이미지의 중앙 부분을 표시 */
      }
    }

    @media (max-width: 576px) {
      .card {
        width: 24rem !important;
      }

      .fixed-size {
        width: 100%; /* 부모 요소의 가로 크기에 맞게 */
        height: 650px; /* 원하는 고정 높이 */
        object-fit: cover; /* 이미지가 고정된 영역을 덮도록 비율 조정 */
        object-position: center; /* 이미지의 중앙 부분을 표시 */
      }
    }

    @media (max-width: 600px) {
      .responsive-image {
        content: url('/assets/img/moTripletter.svg');
      }
    }

    @media (min-width: 601px) {
      .responsive-image {
        content: url('/assets/img/tripletter.png');
      }
    }

    .card img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <!-- Slider main container -->
    <div class="mt-2 swiper swiper-archive">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($banner as $list): ?>
          <div class="swiper-slide">
            <img class="w-100 d-block fixed-size" src="<?= get_banner_upload_path() . ($this->agent->is_mobile() ? $list['filename_mobile'] : $list['filename_pc']); ?>" alt="Slide Image" />
          </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination swiper-archive-pagination"></div>
    </div>
    
    <!-- <div class="container text-center mt-6 fw-bold fs-4">
      <button class="text-uppercase filter-btn" onclick="changeCategory('all')">all</button>
      <button class="text-uppercase filter-btn" onclick="changeCategory('dongnae')">dongnae</button>
      <button class="text-uppercase filter-btn" onclick="changeCategory('creator')">creator</button>
    </div> -->
    <div class="container text-center mt-6 fw-bold fs-5">
      <div class="d-flex flex-nowrap justify-content-center">
        <button class="text-uppercase filter-btn mx-2 my-1" onclick="changeCategory('all')">all</button>
        <button class="text-uppercase filter-btn mx-2 my-1" onclick="changeCategory('dongnae')">dongnae</button>
        <button class="text-uppercase filter-btn mx-2 my-1" onclick="changeCategory('creator')">creator</button>
      </div>
    </div>


    <!-- 글 리스트(ALL)-->
    <div class="container mt-6 w-95" id="article-list-all">
      <div class="row mb-5 g-4"> <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
        <!-- 카테고리 값이 있으면 해당카테고리와 일치하는글만 노출 -->
          <?php foreach($article as $list): ?>
          <div class="col-md-3">
            <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
              <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
              <div class="card-body">
                <h6 class="card-title"><?= $list['c_name']; ?></h6>
                <h4 class="card-title"><?= $list['title']; ?></h4>
                <p class="card-text article-truncate"><?= strip_tags($list['content']); ?></p>
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
    <!--// 글 리스트(ALL)-->

    <!-- 글 리스트(크리에이터)-->
    <div class="container mt-6 w-95" id="article-list-creator" style="display:none;">
      <div class="row mb-5 g-4"> <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
        <!-- 카테고리 값이 있으면 해당카테고리와 일치하는글만 노출 -->
          <?php foreach($article_creator as $list): ?>
          <div class="col-md-3">
            <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
              <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
              <div class="card-body">
                <h6 class="card-title"><?= $list['c_name']; ?></h6>
                <h4 class="card-title"><?= $list['title']; ?></h4>
                <p class="card-text article-truncate"><?= strip_tags($list['content']); ?></p>
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
    <!--// 글 리스트(크리에이터)-->

    <!-- 글 리스트(동네)-->
    <div class="container mt-6 w-95" id="article-list-dongnae" style="display:none;">
      <div class="row mb-5 g-4"> <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
        <!-- 카테고리 값이 있으면 해당카테고리와 일치하는글만 노출 -->
          <?php foreach($article_dongnae as $list): ?>
          <div class="col-md-3">
            <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
              <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
              <div class="card-body">
                <h6 class="card-title"><?= $list['c_name']; ?></h6>
                <h4 class="card-title"><?= $list['title']; ?></h4>
                <p class="card-text article-truncate"><?= strip_tags($list['content']); ?></p>
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
    <!--// 글 리스트(동네)-->

    <div class="container mt-8">
      <img src="/assets/img/tripletter.png" alt="Trip Letter Image" class="responsive-image img-fluid d-block mx-auto">
    </div>
  </div>

  <?php include_once("layout/footer_company_info.php")?>

  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/swiper.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    //글 상세 페이지 이동
    function articleDetail(id) {
      location.href = "/main/articleDetail?id="+id;
    }

    let swiperArchive = new Swiper('.swiper-archive', {
      slidesPerView: 1,
      spaceBetween: 20,
      direction: 'horizontal',
      loop: true,
      pagination: {
        el: '.swiper-archive-pagination',
      },
      breakpoints: {
        768: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        576: {
          slidesPerView: 1,
          spaceBetween: 5,
        }
      }
    });

    function changeCategory(category){
        if(category == 'creator'){
          $("#article-list-all").hide();
          $("#article-list-creator").show();
          $("#article-list-dongnae").hide();
        }else if(category == 'dongnae'){
          $("#article-list-all").hide();
          $("#article-list-creator").hide();
          $("#article-list-dongnae").show();
        }else{
          $("#article-list-all").show();
          $("#article-list-creator").hide();
          $("#article-list-dongnae").hide();
        }
    }

  </script>
</body>

</html>
