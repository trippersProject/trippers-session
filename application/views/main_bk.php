<?php include_once("layout/header.php")?>
<link rel="stylesheet" href="assets/css/globals.css" />
<link rel="stylesheet" href="assets/css/style.css" />
<body>
  <div class="main-container">
    <div class="main-contents">
      <!-- menu -->
      <div class="header-menu">
        <div class="header-menu-all-area">
          <img class="header-menu-all-area-logo" src="https://c.animaapp.com/IWpl16yO/img/-----1@2x.png" />
          <div class="header-menu-all-area-text">Menu</div>
        </div>
      </div>
      <!-- 상담 검색, 로그인 아이콘 -->
      <img class="user" src="https://c.animaapp.com/IWpl16yO/img/user.svg" onclick="location.href='login'" style="cursor: pointer"/>
      <img class="search" src="https://c.animaapp.com/IWpl16yO/img/search.svg" />

      <div class="overlap">
        <div class="view">
          <!--하단 이번주 우리동네 글목록 슬라이드-->
          <div class="view-wrapper-bottom">
            <div class="article-slide">
              <div class="element swiper-wrapper">
                <?php foreach($article_dongnae as $list):?>
                <div class="element-2 swiper-slide">
                  <img src="<?php echo get_article_upload_path().$list['thumbnail'];?>" />
                  <p class="text-wrapper"><?php echo $list['title']?></p>
                  <div class="text-wrapper-2"><?php echo $list['name']?></div>
                  <div class="overlap-group">
                    <p class="p"><?php echo strip_tags($list['content'])?></p>
                    <div class="group">
                      <?php 
                            $tags = explode("#",$list['tag']);
                            for($i=1 ;$i<count($tags) ; $i++):?>
                      <span class="badge text-bg-secondary"><?php echo $tags[$i]?></span>
                      <?php endfor;?>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
              </div>
            </div>
          </div>
          <!--하단 이번주 우리동네 글목록 슬라이드/-->
          <div class="rectangle-3"></div>
          <div class="text-wrapper-12">이번 주 우리동네</div>
        </div>
        <!--하단 배너 슬라이드-->
        <div class="div-wrapper">
          <div class="overlap-wrapper banner-swiper">
            <div class="overlap-5 swiper-wrapper">
              <?php foreach($mb_banners as $list):?>
                <img class="swiper-slide" src="<?php echo get_banner_upload_path().$list['filename'];?>" />
              <?php endforeach;?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
        <!--하단 배너 슬라이드/-->
        <div class="div-4">
          <div class="view-3">
            <div class="view-2">
              <!--상단 이번주 우리동네 글목록 슬라이드-->
              <div class="view-wrapper-top">
                <div class="article-slide">
                  <div class="element swiper-wrapper">
                    <?php foreach($article_creator as $list):?>
                    <div class="element-2 swiper-slide" onclick="articleDetail()" style="cursor:pointer;">
                      <img src="<?php echo get_article_upload_path().$list['thumbnail'];?>" />
                      <p class="text-wrapper"><?php echo $list['title']?></p>
                      <div class="text-wrapper-2"><?php echo $list['name']?></div>
                      <div class="overlap-group">
                        <p class="p"><?php echo strip_tags($list['content'])?></p>
                        <div class="group">
                          <?php 
                                $tags = explode("#",$list['tag']);
                                for($i=1 ;$i<count($tags) ; $i++):?>
                          <span class="badge text-bg-secondary"><?php echo $tags[$i]?></span>
                          <?php endfor;?>
                        </div>
                      </div>
                    </div>
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
              <!--하단 이번주 우리동네 글목록 슬라이드/-->
            </div>
          </div>
          <div class="overlap-6">
            <div class="rectangle-4"></div>
            <div class="text-wrapper-13">크리에이터 추천 공간</div>
          </div>
        </div>
        <!--상단슬라이드-->
        <div class="img-2 banner-swiper">
          <div class="swiper-wrapper">
            <?php foreach($mt_banners as $list):?>
            <img class="swiper-slide" src="<?php echo get_banner_upload_path().$list['filename'];?>" />
            <?php endforeach;?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <!--상단슬라이드/-->
      </div>

      <!-- FIND아이템 이미지 표시 영역 -->
      <img class="image" src="https://c.animaapp.com/IWpl16yO/img/--@3x.png" />
      <!-- 메일 구독 이미지 영역 -->
      <img class="img" src="https://c.animaapp.com/IWpl16yO/img/------@3x.png" />

      <!--하단기업정보-->
      <div class="view-6">
        <img class="b" src="https://c.animaapp.com/IWpl16yO/img/-----b-1@2x.png" />
        <p class="element-11">
          <span class="span">트리퍼<br /></span>
          <span class="text-wrapper-15">대표&nbsp;&nbsp;이진우 | 사업자 등록번호 732-17-02122 | 통신판매업 신고번호 2023-경남 남해-105호<br />경남
            남해군 삼동면 동부대로 1876번길 15<br /></span>
        </p>
        <div class="ABOUT-NEWSLETTER">
          ABOUT&nbsp;&nbsp;|&nbsp;&nbsp; NEWSLETTER&nbsp;&nbsp;|&nbsp;&nbsp; INSTAGRAM&nbsp;&nbsp;|&nbsp;&nbsp;YOUTUBE
        </div>
        <div class="rectangle-5"></div>
      </div>
      <!--하단기업정보/-->
    </div>
  </div>
<?php include_once("layout/footer.php")?>

<script>
  function articleDetail() {
    location.href = "/main/articleDetail";
  }
</script>
</body>

</html>