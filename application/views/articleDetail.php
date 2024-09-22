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
  <link rel="stylesheet" href="/assets/css/article_detail.css">
  <link rel="stylesheet" href="/assets/css/swiper.css" />

</head>

<body>
  <?php include_once("layout/navbar.php")?>

  <div class="main-container">
    <!-- 상단 배너 -->
    <div class="article-banner" style="background-image: url('<?= get_article_upload_path(). ($this->agent->is_mobile() ? $info['banner_image_mobile'] : $info['banner_image_pc'])?>'); background-position: center; background-size: cover;">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12 text-center">
          <div class="article-banner-text fw-bold"><strong><?= $info['title']?></strong></div>
        </div>
      </div>
    </div>
    <!-- //상단 배너 -->

    <!-- 크리에이터, 매장 소개영역 -->
    <?php if(!empty($creator['profile_image']) && $info['category1'] == '1'): ?>
    <div class="profile-container">
      <!-- 프로필이미지 영역 -->
      <div class="profile-image-area">
        <div class="profile-image profile-item">
          <img class="rounded-circle img-fluid" src="<?= get_creator_upload_path(). $creator['profile_image'] ?>" />
        </div>
      </div>
      <!-- //프로필이미지 영역 -->
      
      <!-- 프로필 텍스트 영역 -->
      <div class="profile-text-area">
        <div class="text-center profile-text">
          <h5><strong><?= $creator['sub_name'] ?></strong></h5><BR>
          <h3><strong><?= $creator['name'] ?></strong></h3><BR>
          <?= $creator['description'] ?>
          <!-- sns 아이콘이미지 -->
          <div class="sns-img-container">
            <?php if($creator['homepage_url']) :?>
            <a class="text-decoration-none me-2" href="<?=$creator['homepage_url']?>" target="_blank">
              <img src="/assets/img/Home.svg" alt="" class="img-icon">
            </a>
            <?php endif;?>
            <?php if($creator['sns_url_1']) : ?>
            <a class="text-decoration-none me-2" href="<?=$creator['sns_url_1']?>" target="_blank">
              <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
            </a>
            <?php endif;?>
            <?php if($creator['sns_url_2']) : ?>
            <a class="text-decoration-none me-2" href="<?=$creator['sns_url_2']?>" target="_blank">
              <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
            </a>
            <?php endif;?>
            <?php if($creator['sns_url_3']) : ?>
            <a class="text-decoration-none me-2" href="<?=$creator['sns_url_3']?>" target="_blank">
              <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
            </a>
            <?php endif;?>
          </div>
          <!-- 프로필 태그  -->
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
      <!-- //프로필 텍스트 영역 -->
    </div>
    <?php elseif(!empty($place['profile_image']) && $info['category1'] == '1') : ?>
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
          <div class="text-center creator-description">
            <?= $place['description'] ?>

            <div class="sns-img-container">
              <?php if($place['homepage_url']) : ?>
              <a class="text-decoration-none me-2" href="<?=$place['homepage_url']?>" target="_blank">
                <img src="/assets/img/Home.svg" alt="" class="img-icon">
              </a>
              <?php endif;?>
              <?php if($place['sns_url_1']) : ?>
              <a class="text-decoration-none me-2" href="<?=$place['sns_url_1']?>" target="_blank">
                <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
              </a>
              <?php endif;?>
              <?php if($place['sns_url_2']) : ?>
              <a class="text-decoration-none me-2" href="<?=$place['sns_url_2']?>" target="_blank">
                <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
              </a>
              <?php endif;?>
              <?php if($place['sns_url_3']) : ?>
              <a class="text-decoration-none me-2" href="<?=$place['sns_url_3']?>" target="_blank">
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
    </div>
    <?php endif; ?>
    <!-- //크리에이터, 매장 소개영역 -->


    <!-- 글 본문 영역 -->
    <div class="content-area">
      <?= $info['content']; ?>

      <div class="flex-row article-from">
        <div class="article-from-item-title"><strong>글</strong></div>
        <div class="col-md-11 article-from-item"><?=$info['article_by']?></div>
      </div>
      <div class="article-from">
        <div class="article-from-item-title"><strong>사진</strong></div>
        <div class="article-from-item"><?=$info['picture_by']?></div>
      </div>
      <div class="article-from">
        <div class="article-from-item-title"><strong>장소</strong></div>
        <div class="article-from-item"><?=$info['place_by']?></div>
      </div>
    </div>
    <!-- //글 본문 영역 -->

    <!-- TODO: 좋아요, 스크랩 활성화상태(색상변경된) 아이콘 필요-->
    <div class="share-icon-area">
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

  </div>

  <!-- 이벤트배너 -->
  <?php if($info['event_banner_text'] != '' && $info['event_banner_img'] != ''): ?>
  <div class="event-banner-area">
    <div class="event-banner-img-area">
      <img src="<?=get_article_upload_path(). $info['event_banner_img']?>"
        width="444" height="300" />
    </div>
    <div class="col-md-7 p-4 d-flex align-items-center">
      <div class="event-banner-text-area">
        <?=$info['event_banner_text']?>
        <a class="btn btn-dark" role="button" href="<?= $list['event_banner_link'] ?>">신청하기</a>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <!-- //이벤트배너 -->

  <div class="relation-content-area mt-8">
    <div class="relation-content-title"><strong>연관 콘텐츠</strong></div>
  </div>
  <!-- Slider main container -->
  <div class="mt-5 swiper related-swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php foreach($article_list as $list): ?>
      <div class="swiper-slide">
        <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
          <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
          <div class="card-body">
            <h6 class="card-title"><strong><?= $list['c_name']; ?></strong></h6>
            <h4 class="card-title"><strong><?= $list['title']; ?></strong></h4>
            <p class="card-text article-truncate mt-2"><?= strip_tags($list['content']); ?></p>
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
</div>

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
      location.href = "/main/articleDetail?id=" + id;
    }

    //글 좋아요
    function like_article() {
      var article_id = $('#a_id').val(); // hidden input에서 article ID 값을 가져옵니다.

      $.ajax({
        type: 'POST',
        url: '/main/like_post', // 좋아요 처리 컨트롤러의 경로
        data: {
          post_id: article_id
        },
        dataType: 'json',
        success: function (response) {
          if (response.status == "success") {
            //TODO:좋아요 아이콘 빨간색으로 변경
            alert('좋아요 1포인트 적립되었습니다');
            location.reload();
          } else if (response.status == 'already') {
            alert('이미 포인트가 지급되었습니다.');
          } else if (response.status == 'login') {
            alert('로그인 후 가능합니다.');
            location.href = "/login";
          } else {
            alert(response.msg);
          }
        },
        error: function () {
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
        data: {
          post_id: article_id
        },
        dataType: 'json',
        success: function (response) {

          if (response.status == 'success') {
            alert('글 스크랩 1포인트 지급되었습니다.');
            location.reload();
          } else if (response.status == 'already') {
            alert('이미 포인트가 지급되었습니다.');
          } else if (response.status == 'login') {
            alert('로그인 후 가능합니다.');
            location.href = "/login";
          } else {
            alert(response.msg);
          }
        },
        error: function () {
          alert(response.msg);
        }
      });
    }
  </script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>