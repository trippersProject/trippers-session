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

    .article-truncate {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3; /* 최대 줄 수 */
      overflow: hidden;
      text-overflow: ellipsis;
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

    <!-- 검색결과 글 리스트(ALL)-->
    <div class="container mt-6 w-95 d-flex justify-content-center flex-wrap">
      <div class="row mb-5 g-4 justify-content-center">
          <?php foreach($article as $list): ?>
          <div class="col-md-6 d-flex justify-content-center">
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

    <div class="container mt-8">
      <img src="/assets/img/tripletter.png" alt="Trip Letter Image" class="img-fluid d-block mx-auto">
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
  </script>
</body>

</html>
