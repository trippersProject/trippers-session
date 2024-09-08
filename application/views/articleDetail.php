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
    .article-truncate {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3; /* 최대 줄 수 */
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .mt-8 {
      margin-top: 8rem !important;
    }
    
    .p-4 {
      padding: 4.5rem !important;
    }

    a {
      color: black; /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
    }
    a:hover {
      color: darkgray; /* 마우스를 올렸을 때 색깔을 어두운 회색으로 변경 (선택 사항) */
    }

    .hero-icon {
      list-style-type: none; /* 기본 목록 스타일 제거 */
      padding: 0; /* 패딩 제거 */
      margin: 0; /* 마진 제거 */
      display: flex; /* 수평 정렬 */
      justify-content: start;
      gap: 10px; /* 아이콘 간의 간격 설정 */
    }
    .hero-icon li {
      font-size: 24px; /* 아이콘 크기 조정 */
    }

    /* Swiper Container */
    .swiper-container {
      width: 100%;
      height: 70vh; /* Reduce height to 70% of the viewport height */
    }

    .swiper-wrapper {
      display: flex;
    }

    /* Swiper Slide */
    .swiper-slide {
      display: flex;
      justify-content: space-between;
      gap: 2%; /* Add gap between the images */
      width: 100%; /* Ensure slide takes full container width */
      box-sizing: border-box; /* Include padding and border in width/height */
    }

    /* Left Image - Full Height */
    .first-left-image {
      width: 50%;
      height: 95%;
      object-fit: cover;
    }

    /* Right Image - Slightly Smaller */
    .first-right-image {
      width: 50%;
      height: 85%; /* Reduce height slightly */
      object-fit: cover;
    }

    /* Left Image - Full Height */
    .second-left-image {
      width: 50%;
      height: 85%;
      object-fit: cover;
    }

    /* Right Image - Slightly Smaller */
    .second-right-image {
      width: 50%;
      height: 95%; /* Reduce height slightly */
      object-fit: cover;
    }

    /* Container for images to ensure they are on the same line */
    .sns-img-container {
      display: flex;
      align-items: center; /* Align images vertically in the middle */
      justify-content: center;
    }

    .img-icon {
      margin-right: 10px; /* Space between images */
    }

    /* Style badges */
    .badge-container {
      display: flex;
      justify-content: center; /* Center badges horizontally */
      flex-wrap: wrap; /* Wrap badges if needed */
      margin-top: 20px; /* Space above badges container */
    }

    .badge {
      display: inline-block;
      padding: 5px 10px;
      margin: 2px;
      background-color: #d0d0d0; /* Grey background */
      color: #000; /* Black text color */
      font-size: 14px;
      border: none; /* No border */
    }

    .creator-info {
      width: 100%;
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
      margin: 0;
      padding-top: 20px;
      padding-bottom: 20px;
    }

    .image-container {
      width: 300px; /* 원하는 크기로 설정 */
      height: 300px; /* 원하는 크기로 설정 */
      overflow: hidden; /* 이미지가 컨테이너를 넘어가지 않도록 설정 */
      border-radius: 50%; /* 동그라미 모양으로 만들기 위해 설정 */
    }
    
    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* 이미지를 컨테이너에 맞게 조정 */
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
      width: 100%;
      height: auto;
      max-height: 1000px; /* 최대 높이 설정 */
      object-fit: cover;
    }

    @media (max-width: 768px) {
      .related-swiper .card {
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
      .related-swiper .card {
        width: 24rem !important;
      }

      .fixed-size {
        width: 100%; /* 부모 요소의 가로 크기에 맞게 */
        height: 650px; /* 원하는 고정 높이 */
        object-fit: cover; /* 이미지가 고정된 영역을 덮도록 비율 조정 */
        object-position: center; /* 이미지의 중앙 부분을 표시 */
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
    }

    .centered-text-container {
      display: flex;
      justify-content: center; /* 가로 방향 중앙 정렬 */
      align-items: center; /* 세로 방향 중앙 정렬 */
      width: 100%;
      height: 100px; /* 높이 조정 */
      margin-top: 20px; /* 상단 여백 */
      position: relative; /* 부모 컨테이너에서 상대 위치 설정 */
    }

    .centered-text {
      text-align: center; /* 텍스트를 화면 중앙에 위치 */
      position: relative; /* 밑줄을 위한 상대 위치 지정 */
      display: inline-block; /* 텍스트 길이에 맞게 밑줄 적용 */
      margin: 0 auto; /* 중앙 정렬 */
      padding-bottom: 5px; /* 밑줄과 텍스트 간격 조정 */
      font-weight: 800;
      font-size: 24px;
    }
    
    .centered-text::after {
      content: ""; /* 가상 요소 생성 */
      display: block;
      width: 100%; /* 밑줄의 길이 */
      height: 4px; /* 밑줄의 두께 */
      background-color: black; /* 밑줄 색상 */
      position: absolute;
      bottom: 0;
      left: 0;
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

    .container.custom-container {
      max-width: 58% !important;
    }

    /* 모바일 비율일때 설정  */
    @media (max-width: 800px) {
      .container.custom-container {
        max-width: 100% !important;
        text-align: center;
      }
    
      .custom-container .row {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      .custom-container .col-md-6 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      /* 글 본문영역 */
      .container-content {
        text-align: left; /* 내부 요소들을 왼쪽 정렬 */
      }

      .row.flex-row {
        display: flex;
        align-items: center; /* 세로축 가운데 정렬 */
      }
    }

    /* 글상세 배너 텍스트 */
    .banner-text {
      font-size: 3.8rem;
      color : #f8f9fa;
    }

    @media (max-width: 768px) {
      .banner-text {
        font-size: 1.6rem;
      }
    }

    .creator-content {
      font-family: "Pretendard Variable-Light";
    }

    .creator-description p {
      font-family: "Pretendard Variable-SemiBold" !important;
    }

    .creator-content p:first-child {
      font-family: "Pretendard Variable-Bold" !important;
    }

    @font-face {
      font-family: "Pretendard Variable-Bold";
      src: url('/assets/fonts/Pretendard-Bold.woff') format('woff-variations');
    }

    @font-face {
      font-family: "Pretendard Variable-SemiBold";
      src: url('/assets/fonts/Pretendard-SemiBold.woff') format('woff-variations');
    }

    @font-face {
      font-family: "Pretendard Variable-Light";
      src: url('/assets/fonts/Pretendard-Light.woff') format('woff-variations');
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="mt-2">
      <div style="height: 600px; background-image: url('<?= get_article_upload_path(). ($this->agent->is_mobile() ? $info['banner_image_mobile'] : $info['banner_image_pc'])?>'); background-position: center; background-size: cover;">
      <div class="container h-100">
          <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-12 text-center">
              <div class="banner-text fw-bold"><strong><?= $info['title']?></strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <?php if(!empty($creator['profile_image'])): ?>
      < class="container custom-container mt-5 py-4 py-xl-5">
        <div class="row gy-4 gy-md-0 creator-info">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <div class="image-container">
                  <img class="rounded-circle img-fluid" src="<?= get_creator_upload_path(). $creator['profile_image'] ?>" />
              </div>
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div class="text-center creator-description" style="max-width: 500px;">
              <?= $creator['description'] ?>
              <!-- <h6 class="fw-bold">아마도 책방</h6>
              <h4 class="fw-bold">책방지기 박수진</h4>
              
              <p class="my-3">
                오늘의 인터뷰 주인공은 바로 남해에서 마음가는대로 <br /> 멋지게 살아가고 있는 아마도 책방 박수진이야.
                <br /><br />
                평일엔 팜프라촌에서 일하고, 책도 쓰고, 서핑을 즐기는 멋진 여성이지.
                <br />
                시골에서 마음 가는대로 살게 된다면? 바로 이렇게 멋지게 살아보면 어떨까?
              </p> -->

              <div class="sns-img-container">
                <?php if($creator['homepage_url']) :?>
                  <a href="<?=$creator['homepage_url']?>" target="_blank">
                    <img src="/assets/img/Home.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($creator['sns_url_1']) : ?>
                  <a href="<?=$creator['sns_url_1']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($creator['sns_url_2']) : ?>
                  <a href="<?=$creator['sns_url_2']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($creator['sns_url_3']) : ?>
                  <a href="<?=$creator['sns_url_3']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
              </div>
              
              <div class="badge-container">
                <?php 
                  $tags = explode("#", $creator['tag']);
                  for($i = 1; $i < count($tags); $i++): 
                ?>
                  <h6><span class="badge"><?= $tags[$i]; ?></span></h6>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
      <?php elseif(!empty($place['profile_image'])) : ?>
      <div class="container custom-container mt-5 py-4 py-xl-5">
        <div class="row gy-4 gy-md-0 creator-info">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <div class="image-container">
                  <img class="rounded-circle img-fluid" src="<?= get_place_upload_path(). $place['profile_image'] ?>" />
              </div>
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div class="text-center creator-description" style="max-width: 500px;">
              <?= $place['description'] ?>
              <!-- <h6 class="fw-bold">아마도 책방</h6>
              <h4 class="fw-bold">책방지기 박수진</h4>
              
              <p class="my-3">
                오늘의 인터뷰 주인공은 바로 남해에서 마음가는대로 <br /> 멋지게 살아가고 있는 아마도 책방 박수진이야.
                <br /><br />
                평일엔 팜프라촌에서 일하고, 책도 쓰고, 서핑을 즐기는 멋진 여성이지.
                <br />
                시골에서 마음 가는대로 살게 된다면? 바로 이렇게 멋지게 살아보면 어떨까?
              </p> -->

              <div class="sns-img-container">
                <?php if($place['homepage_url']) : ?>
                  <a href="<?=$place['homepage_url']?>" target="_blank">
                    <img src="/assets/img/Home.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($place['sns_url_1']) : ?>
                  <a href="<?=$place['sns_url_1']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($place['sns_url_2']) : ?>
                  <a href="<?=$place['sns_url_2']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
                <?php if($place['sns_url_3']) : ?>
                  <a href="<?=$place['sns_url_3']?>" target="_blank">
                    <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
                  </a>
                <?php endif;?>
              </div>
              
              <div class="badge-container">
                <?php 
                  $tags = explode("#", $place['tag']);
                  for($i = 1; $i < count($tags); $i++): 
                ?>
                  <h6><span class="badge"><?= $tags[$i]; ?></span></h6>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- 글 본문 영역 -->
      <div class="container-content creator-content mt-7">
        <?= $info['content']; ?>

        <div class="row mt-5 flex-row">
          <div class="col-md-1 fw-bold">글</div>
          <div class="col-md-11"><?=$info['article_by']?></div>
        </div>
        <div class="row mt-2 flex-row">
          <div class="col-md-1 fw-bold">사진</div>
          <div class="col-md-11"><?=$info['picture_by']?></div>
        </div>
        <div class="row mt-2 flex-row">
          <div class="col-md-1 fw-bold">장소</div>
          <div class="col-md-11"><?=$info['place_by']?></div>
        </div>
      </div>
      <!-- //글 본문 영역 -->
      
      <!-- TODO: 좋아요, 스크랩 활성화상태(색상변경된) 아이콘 필요-->
      <ul class="mt-6 hero-icon">
        <?php if($this->session->userdata('user_id')){?>
          <?php if($like_post){?>
            <li><img src="/assets/img/favorite_active.svg" alt="좋아요" onclick="like_article()"></li>
          <?php }else{ ?>
            <li><img src="/assets/img/favorite.svg" alt="좋아요" onclick="like_article()"></li>
          <?php } ?>

          <?php if($scrap_post){?>
            <li><img src="/assets/img/stars_active.svg" alt="스크랩" onclick="scrap_article()"></li>
          <?php }else{ ?>
            <li><img src="/assets/img/stars.svg" alt="스크랩" onclick="scrap_article()"></li>
          <?php } ?>
          
        <?php }else{?>
          <li><img src="/assets/img/favorite.svg" alt="좋아요" onclick="like_article()"></li>
          <li><img src="/assets/img/stars.svg" alt="스크랩" onclick="scrap_article()"></li>
        <?php }?>
        <li><img src="/assets/img/upload.svg" alt="공유하기" onclick=""></li>
      </ul>

      <div class="row mt-2">
        <p>
          위 버튼을 누르면 FIND POINT가 적립됩니다. <a href="#" class="fw-bold" title="FIND ITEM에 응모할수 있는 포인트에요!">FIND POINT란?</a>
        </p>
      </div>
    </div>
    
    <!-- 이벤트배너 -->
    <?php if($info['event_banner_text'] != '' && $info['event_banner_img'] != ''): ?>
    <div style="background-color: lightgray;">
      <div class="row">
        <div class="col-md-5 text-end">
          <img class="rounded img-fluid w-50 fit-cover" src="<?=get_article_upload_path(). $info['event_banner_img']?>" width="444" height="300" />
        </div>
        <div class="col-md-7 p-4 d-flex align-items-center">
          <div>
            <?=$info['event_banner_text']?>
            <a class="btn btn-dark btn-lg mt-7" role="button" href="#">신청하기</a>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- //이벤트배너 -->

    <div class="centered-text-container mt-8">
      <div class="centered-text">연관 콘텐츠</div>
    </div>
    <!-- Slider main container -->
      <div class="mt-5 w-95 swiper related-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php foreach($article_list as $list): ?>
            <div class="swiper-slide">
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
        <!-- If we need pagination -->
        <!-- <div class="swiper-pagination related-pagination"></div> -->
        </div>
      </>

    <input type="hidden" name="a_id" id="a_id" value="<?= $info['id']?>">

  <?php include_once("layout/footer_company_info.php")?>

  <!-- 스크립트 위치를 body 태그 안으로 이동 -->
  <script src="/assets/js/swiper.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper-container', {
      pagination: false, // Pagination disabled
      navigation: false, // Navigation arrows disabled
      slidesPerView: 1, // Show only one slide at a time
      spaceBetween: 0, // No space between slides
      loop: true, // Enable looping
      allowTouchMove: true, // Allow slide movement on touch
    });

    let relatedSwiper = new Swiper('.related-swiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: '.related-pagination',
        clickable: true,
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

    //글 상세 페이지 이동
    function articleDetail(id) {
      location.href = "/main/articleDetail?id="+id;
    }

    //글 좋아요
    function like_article() {
      var article_id = $('#a_id').val(); // hidden input에서 article ID 값을 가져옵니다.

      $.ajax({
          type: 'POST',
          url: '/main/like_post', // 좋아요 처리 컨트롤러의 경로
          data: {post_id: article_id},
          dataType: 'json',
          success: function(response) {
              if (response.status == "success") {             
                //TODO:좋아요 아이콘 빨간색으로 변경
                alert('좋아요 1포인트 적립되었습니다');
                location.reload();
              } else if (response.status == 'already') {
                alert('이미 포인트가 지급되었습니다.');
              } else if (response.status == 'login') {
                alert('로그인 후 가능합니다.');
                location.href="/login";
              } else {
                alert(response.msg);
              }
          },
          error: function() {
              alert(response.msg);
          }
      });
    }

    //글 스크랩
    function scrap_article() {
      var article_id = $('#a_id').val(); // hidden input에서 article ID 값을 가져옵니다.

      $.ajax({
          type: 'POST',
          url: '/main/scrap_post', // 스크랩 처리 컨트롤러의 경로
          data: {post_id: article_id},
          dataType: 'json',
          success: function(response) {

              if (response.status == 'success') {
                alert('글 스크랩 1포인트 지급되었습니다.');
                location.reload();
              } else if (response.status == 'already') {
                alert('이미 포인트가 지급되었습니다.');
              } else if (response.status == 'login') {
                alert('로그인 후 가능합니다.');
                location.href="/login";
              } else {
                alert(response.msg);
              }
          },
          error: function() {
              alert(response.msg);
          }
      });
    }
  </script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>