<?php include_once("layout/header.php");?>
<style>
  .article-truncate {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3; /* 최대 줄 수 */
    overflow: hidden;
    text-overflow: ellipsis;
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

  .centered-text-find-item-container {
    display: flex;
    justify-content: flex-start;
    align-items: center; /* 세로 방향 중앙 정렬 */
    width: 100%;
    height: 100px; /* 높이 조정 */
    position: relative; /* 부모 컨테이너에서 상대 위치 설정 */
  }

  .centered-text-find-item {
    text-align: center; /* 텍스트를 화면 중앙에 위치 */
    position: relative; /* 밑줄을 위한 상대 위치 지정 */
    display: inline-block; /* 텍스트 길이에 맞게 밑줄 적용 */
    padding-bottom: 5px; /* 밑줄과 텍스트 간격 조정 */
    font-weight: 800;
    font-size: 24px;
  }
  
  .centered-text-find-item::after {
    content: ""; /* 가상 요소 생성 */
    display: block;
    width: 100%; /* 밑줄의 길이 */
    height: 4px; /* 밑줄의 두께 */
    background-color: black; /* 밑줄 색상 */
    position: absolute;
    bottom: 0;
    left: 0;
  }
  
  .swiper-find-item-detail .swiper-wrapper .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 700px;
  }

  .swiper-find-item-detail .swiper-wrapper .swiper-slide img {
    height: 700px;
    object-fit: cover; /* 이미지를 부모 요소에 맞게 크기 조정 */
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

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <!-- Slider main container -->
    <div class="mt-2 swiper swiper-main">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mt_banners as $list): ?>
          <div class="swiper-slide">
            <img class="w-100 d-block fixed-size" src="<?= get_banner_upload_path() . $list['filename_pc']; ?>" alt="Slide Image" />
          </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination swiper-main-pagination"></div>
    </div>

    <div class="centered-text-container">
      <div class="centered-text">크리에이터 추천 공간</div>
    </div>  

    <!-- Slider main container -->
    <div class="mt-5 w-95 swiper creator-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($article_creator as $list): ?>
        <div class="swiper-slide">
          <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
            <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?= $list['name']; ?></h6>
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
      <!-- <div class="swiper-pagination creator-pagination"></div> -->
    </div>


    <!-- Slider main container -->
    <div class="mt-8 swiper swiper-main2">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mb_banners as $list): ?>
        <div class="swiper-slide">
          <img class="w-100 d-block fixed-size" src="<?= get_banner_upload_path() . $list['filename_pc']; ?>" alt="Slide Image" />
        </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need pagination -->
      <div class="swiper-pagination swiper-main-pagination2"></div>
    </div>

    <div class="centered-text-container">
      <div class="centered-text">이번 주 우리동네</div>
    </div>
    

    <!-- Slider main container -->
    <div class="mt-5 w-95 swiper dongnae-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($article_dongnae as $list): ?>
        <div class="swiper-slide">
          <div class="card" onclick="articleDetail('<?= $list['id'] ?>')">
            <img src="<?= get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?= $list['name']; ?></h6>
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
      <!-- <div class="swiper-pagination dongnae-pagination"></div> -->
    </div>

    <div class="mt-8 swiper swiper-find-item">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- MARK: 바로 아래 div 구조가 반복되야하는 부분 -->
        <!-- MARK: 자세히보기 버튼 클릭 시 나오는 모달 창은 아래쪽 부분에 있음 -->
        <div class="swiper-slide row gy-4 gy-md-0">
          <!-- FIND ITEM 리스트 -->
          <?php foreach($find_item as $list): ?>
            <div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #F5F5F5;">
              <div class="row w-100">
                <div class="col-md-6">
                  <img src="<?= get_find_item_upload_path() .$list['thumbnail']?>" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
                </div>
                <div class="col-md-6 d-md-flex align-items-md-center flex-start ps-5">
                  <div style="max-width: 900px;">
                    <h2 class="fw-bold"><?= $list['name']?></h2>
                    <p class="my-3 lh-lg">
                      <?= $list['content_sub']?>
                    </p>
                    <a href="" class="btn custom-btn btn-lg me-2" onclick="showEventModal()">자세히보기</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- //FIND ITEM 리스트 -->
        </div>
      </div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev swiper-find-item-prev"></div>
      <div class="swiper-button-next swiper-find-item-next"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade w-100" id="mainFindItemModal" tabindex="-1" aria-labelledby="mainFindItemModalLabel">
      <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 100%;">
        <div class="modal-content">
          <div class="modal-body d-flex align-items-center mt-2 mb-2">
            <div class="row gy-4 gy-md-0 mx-auto" style="width: 100%;">
              <div class="col-md-6">
                <div class="swiper swiper-find-item-detail" style="overflow: hidden;">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="assets/img/mainFindItem.svg" alt="" class="rounded img-fluid w-100">
                    </div>
                    <div class="swiper-slide">
                      <img src="assets/img/mainFindItem.svg" alt="" class="rounded img-fluid w-100">
                    </div>
                    <div class="swiper-slide">
                      <img src="assets/img/mainFindItem.svg" alt="" class="rounded img-fluid w-100">
                    </div>
                    <div class="swiper-slide">
                      <img src="assets/img/mainFindItem.svg" alt="" class="rounded img-fluid w-100">
                    </div>
                    <div class="swiper-slide">
                      <img src="assets/img/mainFindItem.svg" alt="" class="rounded img-fluid w-100">
                    </div>
                  </div>

                  <div class="swiper-pagination swiper-find-item-detail-pagination"></div>
                </div>
              </div>
              <div class="col-md-6 d-md-flex align-items-md-center">
                <div style="max-width: 350px;">
                  <div class="centered-text-find-item-container mb-4">
                    <div class="centered-text-find-item">FIND 아이템</div>
                  </div>
                  <h6>제주를 닮은, 제주를 담은 향기</h6>
                  <h2 class="fw-bold mb-5">어텀제주 메모리퍼퓸</h2>

                  <h6 class="fw-bold">트리퍼가 찾아낸 어텀제주</h6>
                  <p class="my-3 mb-5">
                    제주에서의 소중한 추억들을
                    <br />
                    듬뿍 담은 향기로 만나보는 내 손 안에 작은 제주
                    <br /><br />
                    제주를 닮은 향기로 나만의 공간을 채워보세요
                  </p>

                  <h6 class="fw-bold">이런 분들 꼭 응모하세요</h6>
                  <ul class="my-3 mb-5">
                    <li>제주도의 떠오르는 추억이 있으신 분</li>
                    <li>제주를 닮은 향기로 나만의 공간을 채우실 분</li>
                    <li>침구나 내 옷에 기분좋은 향이 필요하신 분</li>
                    <li>어텀제주 제품으로 일상 속 여행을 떠나보실 분</li>
                  </ul>
                  <button type="button" class="btn custom-btn w-50">
                    응모하기
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container mt-8">
      <img src="assets/img/tripletter.png" alt="Trip Letter Image" class="img-fluid d-block mx-auto">
    </div>

    <?php include_once("layout/footer_company_info.php")?>

    <script src="assets/js/swiper.js"></script>
    <script>
      //글 상세 페이지 이동
      function articleDetail(id) {
        location.href = "/main/articleDetail?id="+id;
      }

      let swiperMain = new Swiper('.swiper-main', {
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-main-pagination',
        },
      });

      let creatorSwiper = new Swiper('.creator-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.creator-pagination',
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

      let swiperMain2 = new Swiper('.swiper-main2', {
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-main-pagination2',
        },
      });

      let dongnaeSwiper = new Swiper('.dongnae-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.dongnae-pagination',
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

      let swiperFindItem = new Swiper('.swiper-find-item', {
        slidesPerView: 1, // 한 번에 보여줄 슬라이드 수
        spaceBetween: 30, // 슬라이드 간의 간격
        loop: true, // 무한 루프
        direction: 'horizontal',
        pagination: {
          el: '.swiper-find-item-pagination',
        },
        navigation: {
          nextEl: '.swiper-find-item-next',
          prevEl: '.swiper-find-item-prev',
        },
      });

      let swiperFindItemDetail = new Swiper('.swiper-find-item-detail', {
        slidesPerView: 1, // 한 번에 보여줄 슬라이드 수
        spaceBetween: 30, // 슬라이드 간의 간격
        loop: true, // 무한 루프
        direction: 'horizontal',
        pagination: {
          el: '.swiper-find-item-detail-pagination',
          clickable: true,
        },
      });

      //FIND ITEM 자세히보기 클릭시 팝업노출 
      function showEventModal() {
        // 모달 요소를 가져옵니다.
        var modal = document.getElementById('mainFindItemModal');

        // aria-hidden 속성을 false로 변경합니다.
        modal.setAttribute('aria-hidden', 'false');

        // 모달을 보여주기 위해 'show' 클래스를 추가합니다.
        modal.classList.add('show');

        // 모달의 display 속성을 'block'으로 변경하여 화면에 표시되도록 합니다.
        modal.style.display = 'block';
      }

    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>