<?php include_once("layout/header.php")?>
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

      <div class="main-contents-area">
        <!--상단슬라이드-->
        <div class="top-slide-section">
          <div class="banner-swiper">
            <div class="swiper-wrapper">
              <?php foreach($mt_banners as $list):?>
              <img class="swiper-slide" src="<?php echo get_banner_upload_path().$list['filename'];?>" />
              <?php endforeach;?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
        <div class="creator-suggestion">
          <div class="creator-suggestion-title">크리에이터 추천 공간</div>
          <div class="creator-suggestion-underline"></div>

          <div class="creator-suggestion-slide-area">
            <div class="article-slide">
              <div class="article-swiper swiper-wrapper">
                <?php foreach($article_creator as $list):?>
                <div class="article-swiper-contents swiper-slide">
                  <img src="<?php echo get_article_upload_path().$list['thumbnail'];?>" />
                  <p class="article-title"><?php echo $list['title']?></p>
                  <div class="article-name"><?php echo $list['name']?></div>
                  <div class="article-contents-group">
                    <p class="article-contents"><?php echo strip_tags($list['content'])?></p>
                    <div class="article-tag">
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
        </div>

        <!--하단슬라이드-->
        <div class="bottom-slide-section">
          <div class="banner-swiper">
            <div class="swiper-wrapper">
              <?php foreach($mb_banners as $list):?>
                <img class="swiper-slide" src="<?php echo get_banner_upload_path().$list['filename'];?>" />
              <?php endforeach;?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
        <div class="this-week-our-area">
          <div class="this-week-our-area-title">이번 주 우리동네</div>
          <div class="this-week-our-area-underline"></div>

          <div class="this-week-our-slide-area">
            <div class="article-slide">
              <div class="article-swiper swiper-wrapper">
                <?php foreach($article_dongnae as $list):?>
                <div class="article-swiper-contents swiper-slide">
                  <img src="<?php echo get_article_upload_path().$list['thumbnail'];?>" />
                  <p class="article-title"><?php echo $list['title']?></p>
                  <div class="article-name"><?php echo $list['name']?></div>
                  <div class="article-contents-group">
                    <p class="article-contents"><?php echo strip_tags($list['content'])?></p>
                    <div class="article-tag">
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
        </div>
      </div>

      <!-- FIND아이템 이미지 표시 영역 -->
      <img class="find-item" src="https://c.animaapp.com/IWpl16yO/img/------@3x.png" />

      <!-- 메일 구독 이미지 영역 -->
      <img class="mail-subscribe" src="https://c.animaapp.com/IWpl16yO/img/--@3x.png" />

      <?php include_once("layout/footer_company_info.php")?>
    </div>
  </div>
<?php include_once("layout/footer_script.php")?>

<script>
  function articleDetail() {
    location.href = "/main/articleDetail";
  }
</script>
</body>

</html>