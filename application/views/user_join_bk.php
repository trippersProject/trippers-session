<?php include_once("layout/header.php")?>
<style>
<?php include_once("assets/css/user_join.css")?>
</style>
<body link="black" vlink="black">
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
        <div class="signup">SIGNUP</div>
        <div class="frame-container">
          <div class="frame-group">
            <div class="parent">
              <div class="div">이름(닉네임) *</div>
              <input class="frame-child" type="text">
            </div>
            <div class="parent">
              <div class="div1">이메일 주소 *</div>
              <input class="frame-child" type="text">
            </div>
            <div class="parent">
              <div class="div2">휴대폰 번호 *</div>
              <input class="frame-child" type="text">
            </div>
            <div class="parent">
              <div class="div3">비밀번호 *</div>
              <input class="frame-child" type="text">
            </div>
            <div class="parent">
              <div class="div4">비밀번호 확인 *</div>
              <input class="frame-child" type="text">
            </div>
          </div>
        </div>
        <div class="frame-wrapper1">
          <div class="frame-parent1">
            <div class="frame-parent2">
              <div class="check-box-outline-blank-parent">
                <div class="form-check">
                  <input style="accent-color: black" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1"><b>전체동의</b></label>
                </div>
              </div>
              <div class="check-box-parent">
                <div class="form-check">
                  <input style="accent-color: black" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1"><b>[필수] <a href="#">이용약관</a>과 <a href="#">개인정보처리방침</a>에 동의합니다</b></label>
                </div>
              </div>
            </div>
            <div class="check-box-group">
              <div class="form-check">
                  <input style="accent-color: black" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1"><b>[필수] 트립레터를 구독합니다</b></label>
                </div>
            </div>
          </div>
        </div>
        <div class="frame-wrapper2">
          <div class="vector-parent">
            <div class="div8">가입하기</div>
          </div>
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