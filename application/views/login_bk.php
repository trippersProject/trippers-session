<?php include_once("layout/header.php")?>
<style>
<?php include_once("assets/css/user_join.css")?>
</style>
<body>
    <div class="pc">
      <div class="line-parent">
        <div class="group-child"></div>
        <img class="group-item" alt="" src="<?php echo get_etc_upload_path()?>logo.png" />
      </div>
      <div class="pc-inner">
        <header class="frame-parent">
          <div class="menu-wrapper">
            <a class="menu">Menu</a>
          </div>
          <div class="wrapper">
            <img class="icon" loading="lazy" alt="" src="<?php echo get_etc_upload_path()?>logo.png" />
          </div>
          <div class="frame-wrapper">
            <div class="search-parent">
              <img class="search-icon" loading="lazy" alt="" src="https://c.animaapp.com/IWpl16yO/img/search.svg"/>
              <img class="user-icon" loading="lazy" alt="" src="https://c.animaapp.com/IWpl16yO/img/user.svg"/>
            </div>
          </div>
        </header>
      </div>
      <img class="check-box-icon" alt="" src="./public/check-box.svg" />

      <section class="signup-parent">
        <div class="signup">LOGIN</div>
        <div class="frame-container">
          <div class="frame-group">
            <div class="parent">
              <div class="div">이메일</div>
              <input class="frame-child" type="text">
            </div>
            <div class="parent">
              <div class="div1">비밀번호</div>
              <input class="frame-child" type="password">
            </div>
          </div>
        </div>

        <div class="frame-wrapper3">
          <div class="vector-parent2">
            <div class="div8" style="cursor: pointer">회원가입</div>
          </div>
          <div class="vector-parent2">
            <div class="div8" style="cursor: pointer">로그인</div>
          </div>
        </div>

        <div class="frame-wrapper2">
          <div class="vector-parent">
            <div class="div8" onclick="location.href='login/user_join'" style="cursor: pointer">가입하기</div>
          </div>
        </div>
        <div class="frame-wrapper4">
            <a href="" style="color:black">비밀번호를 찾으셔야하나요?</a>
        </div>
      </section>
      <section class="pc-child">
        <div class="b-1-parent">
          <img class="b-1-icon" loading="lazy" alt="" src="<?php echo get_etc_upload_path()?>logo_black.png"/>

          <div class="parent2">
            <div class="div9">
              <span>
                <p class="p">트리퍼</p>
                <p class="p1">
                  대표 이진우 | 사업자 등록번호 732-17-02122 | 통신판매업 신고번호 2023-경남 남해-105호
                </p>
                <p class="p2">경남 남해군 삼동면 동부대로 1876번길 15</p>
              </span>
            </div>
            <div class="about-newsletter-instagram-wrapper">
              <div class="about-newsletter">
                ABOUT | NEWSLETTER | INSTAGRAM | YOUTUBE
              </div>
            </div>
          </div>
          <div class="frame-child2"></div>
        </div>
      </section>
    </div>
  </body>
</html>