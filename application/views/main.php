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
    width: 100%;
    height: auto;
    max-height: 800px; /* 최대 높이 설정 */
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
    object-fit: cover;
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
    .creator-swiper .card, .dongnae-swiper .card {
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
    .creator-swiper .card, .dongnae-swiper .card {
      width: 24rem !important;
    }

    .fixed-size {
      width: 100%; /* 부모 요소의 가로 크기에 맞게 */
      height: 400px; /* 원하는 고정 높이 */
      object-fit: cover; /* 이미지가 고정된 영역을 덮도록 비율 조정 */
      object-position: center; /* 이미지의 중앙 부분을 표시 */
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
            <img class="w-100 d-block fixed-size" src="<?= get_banner_upload_path() . ($this->agent->is_mobile() ? $list['filename_mobile'] : $list['filename_pc']); ?>" alt="Slide Image" />
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
      <!-- <div class="swiper-pagination creator-pagination"></div> -->
    </div>


    <!-- Slider main container -->
    <div class="mt-8 swiper swiper-main2">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mb_banners as $list): ?>
        <div class="swiper-slide">
          <img class="w-100 d-block fixed-size" src="<?= get_banner_upload_path() . ($this->agent->is_mobile() ? $list['filename_mobile'] : $list['filename_pc']); ?>" alt="Slide Image" />
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
                    <a href="#" class="btn custom-btn btn-lg me-2" onclick="showEventModal('<?= $list['id'] ?>')">자세히보기</a>
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

   <!-- 응모하기 모달 step1 -->
    <div class="modal fade w-100" id="mainFindItemModal" tabindex="-1" aria-labelledby="mainFindItemModalLabel">
      <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 100%;">
        <div class="modal-content">
          <div class="modal-body d-flex align-items-center mt-2 mb-2">
            <div class="row gy-4 gy-md-0 mx-auto" style="width: 100%;">
              <div class="col-md-6">
                <div class="swiper swiper-find-item-detail" style="overflow: hidden;">
                  <div class="swiper-wrapper">
                    <!-- TODO: FINDITEM 썸네일 이미지 현재는 하나만 가능, 이후에 여러개로 슬라이드 노출하기 -->
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
                  <div id="find_item_content">
                  </div>
                  <button type="button" class="btn custom-btn w-50" onclick="showEventModalStep2()">
                    응모하기
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //응모하기 모달 step1 -->

    <!-- 응모하기 모달 step2 -->
    <input type="hidden" id="findItemId" value="">
    <div class="modal fade w-100" id="mainFindItemModal2" tabindex="-1" aria-labelledby="mainFindItemModalLabel2">
      <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 100%;">
        <div class="modal-content">
          <div class="modal-body d-flex align-items-center mt-2 mb-2">
            <div class="row gy-4 gy-md-0 mx-auto" style="width: 100%;">
              <div class="col-md-6 d-md-flex align-items-md-center">
                <div style="max-width: 350px;">
                  <div class="centered-text-find-item-container mb-4">
                    <div class="centered-text-find-item">FIND 아이템 응모전에 꼭 확인해 주세요</div>
                  </div>
                  <div id="find_item_content">
                    당첨자는 <a href="">해당페이지</a>에서 확인하세요
                  </div>
                  <button type="button" class="btn custom-btn w-50" onclick="applyFindItem()">
                    응모하기
                  </button>
                  <button type="button" class="btn custom-btn w-50" onclick="location.reload()">
                    취소하기
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //응모하기 모달 step2 -->

    <!-- 응모하기 모달 step3 -->
    <div class="modal fade w-100" id="mainFindItemModal3" tabindex="-1" aria-labelledby="mainFindItemModalLabel3">
      <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 100%;">
        <div class="modal-content">
          <div class="modal-body d-flex align-items-center mt-2 mb-2">
            <div class="row gy-4 gy-md-0 mx-auto" style="width: 100%;">
              <div class="col-md-6 d-md-flex align-items-md-center">
                <div style="max-width: 350px;">
                  <div class="centered-text-find-item-container mb-4">
                    <div class="centered-text-find-item">FIND 아이템 응모를 완료했습니다</div>
                  </div>
                  <div id="find_item_content">
                    여러분의 FIND POINT를 사용해주셔서 감사합니다<br>앞으로도 트리퍼에서 많은 활동 부탁드립니다
                  </div>
                  <button type="button" class="btn custom-btn w-50">
                    확인
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //응모하기 모달 step3 -->

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
        slidesPerView: 1,
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
            slidesPerView: 1,
            spaceBetween: 5,
          }
        },
      });

      let swiperMain2 = new Swiper('.swiper-main2', {
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-main-pagination2',
        },
      });

      let dongnaeSwiper = new Swiper('.dongnae-swiper', {
        slidesPerView: 1,
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
            slidesPerView: 1,
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
      // function showEventModal() {
      //   var modal = new bootstrap.Modal(document.getElementById('mainFindItemModal'));
      //   modal.show();
      // }

      //모달에 노출할 FINDITEM 정보 가져오기
      function showEventModal(itemId) {
        $.ajax({
            url: '/main/get_find_item_info',
            type: 'POST',
            dataType: 'json',
            data: { id: itemId },
            success: function(response) {
              var data = response.item;

              if(response.code == '0000'){
                // 이미지 src 업데이트
                $('#mainFindItemModal .swiper-slide img').attr('src', "<?= get_find_item_upload_path();?>"+data.thumbnail);

                // 텍스트 업데이트
                $('#mainFindItemModal .centered-text-find-item').text(data.name);
                $('#find_item_content').html(data.content);

                //finditme아이디 세팅(응모하기시 아이디 넘김)
                $("#findItemId").val(data.id);

                // 모달노출
                var modal = new bootstrap.Modal(document.getElementById('mainFindItemModal'));
                modal.show();
              }else{
                alert(response.msg);
                location.reload();
              }
            },
            error: function() {
                alert('데이터를 불러오는 데 실패했습니다.');
            }
        });
      }

      //FIND아이템 응모하기 모달 노출
      function showEventModalStep2() {
        // 첫 번째 모달을 숨깁니다.
        // var modal1 = new bootstrap.Modal(document.getElementById('mainFindItemModal'));
        // modal1.hide();

        $("#mainFindItemModal").remove();

        // 두번째 모달 노출
        var modal2 = new bootstrap.Modal(document.getElementById('mainFindItemModal2'));
        modal2.show();
      }

      //FINDITEM 응모하기
      function applyFindItem(){
        let findItemId = $("#findItemId").val();
        
        $.ajax({
            url: '/main/apply_find_item',
            type: 'POST',
            dataType: 'json',
            data: { id: findItemId },
            success: function(response) {
              if(response.code == '0000'){

                // 두 번째 모달제거
                $("#mainFindItemModal2").remove();

                // 모달노출
                var modal3 = new bootstrap.Modal(document.getElementById('mainFindItemModal3'));
                modal3.show();
              }else{
                alert(response.msg);
              }
            },
            error: function() {
                alert('데이터를 불러오는 데 실패했습니다.');
            }
        });
      }

    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>