<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>작성글 관리 > 글 등록</h5>
    <hr/>
    <br/>
    <form method="post" id="articleForm">
        <input type="hidden" name="id" id="id" value="">
        <div>
            <h4>대분류 카테고리</h4>
            <select name="category1" id="category1" class="form-control w-25" onchange="changCategory()">
                <?php /*foreach($category1 as $item):?>
                    <option value="<?php echo $item['id']?>" <?php echo ($item['id'] == $info['category1']) ? "selected" : ""?>><?php echo $item['name']?></option>
                <?php endforeach; */?>
                <option value="">---선택---</option>
                <option value="1">CREATOR</option>
                <option value="2">DONGNAE</option>
            </select>

            <hr>

            <h4>소분류 카테고리</h4>
            <select name="category2" id="category2" class="form-control w-25">
                <option value=''>---선택---</option>
                <?php foreach($category2 as $item):?>
                    <option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                <?php endforeach; ?>
            </select>

            <hr>

            <div id="creator_area" style="display:none">
                <h4>크리에이터</h4>
                <select name="c_id" id="c_id" class="form-control w-25">
                    <option value="">---선택---</option>
                    <?php foreach($creator as $list):?>
                        <option value="<?php echo $list['id']?>"><?php echo $list['name']?></option>
                    <?php endforeach;?>
                </select>

                <hr>
            </div>
            
            <div id="place_area" style="display:none">
                <h4>매장</h4>
                <select name="p_id" id="p_id" class="form-control w-25">
                    <option value="">---선택---</option>
                    <?php foreach($place as $list):?>
                        <option value="<?php echo $list['id']?>"><?php echo $list['name']?></option>
                    <?php endforeach;?>
                </select>

                <hr>
            </div>

            <h4>대표 이미지(PC)</h4>
                <input type="file" name="banner_image_pc" id="banner_image_pc" class="form-control w-25">

            <hr>

            <h4>대표 이미지(모바일)</h4>
                <input type="file" name="banner_image_mobile" id="banner_image_mobile" class="form-control w-25">

            <hr>

            <h4>제목</h4>
                <input type="text" name="title" id="title" class="form-control" value="">
            <hr>

            <h4>태그 ( '#' 으로 구분)</h4>
                <input type="text" name="tag" id="tag" class="form-control w-25" value="">
            <hr>

            <h4>썸네일</h4>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control w-25">

            <hr>

            <h4>본문</h4>
            <!-- 에디터 -->
                <textarea class="summernote" id="content" name="content"></textarea>
            <hr>

            <h4>하단 출처</h4>
            <div style="display: flex; align-items: center; gap: 10px;">
                <label for="article_by" style="display: inline-block; width: 40px;"><strong>글</strong></label>
                <input type="text" name="article_by" id="article_by" class="form-control w-25" value="" style="display: inline-block; width: auto;">
                
                <label for="picture_by" style="display: inline-block; width: 40px;"><strong>사진</strong></label>
                <input type="text" name="picture_by" id="picture_by" class="form-control w-25" value="" style="display: inline-block; width: auto;">
                
                <label for="place_by" style="display: inline-block; width: 40px;"><strong>장소</strong></label>
                <input type="text" name="place_by" id="place_by" class="form-control w-25" value="" style="display: inline-block; width: auto;">
            </div>
            <hr>

            <h4>이벤트배너 이미지</h4>
                <input type="file" name="event_banner_img" id="event_banner_img" class="form-control w-25">

            <hr>

            <h4>이벤트배너 문구</h4>
            <!-- 에디터 -->
                <textarea class="summernote" id="event_banner_text" name="event_banner_text"></textarea>
            <hr>
        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">등록</button>
        </div>
    </form>
</div>
<script>
    //머리글 에디터
    $(document).ready(function() {
        //로드하면서 카테고리 체크
        changCategory();
        
        $('#event_banner_text').summernote({
            tabsize: 2,
            height: 500,
            lang: "ko-KR",

            toolbar: [
                ['style', ['style']], // 글자 스타일 설정 옵션
                ['fontsize', ['fontsize']], // 글꼴 크기 설정 옵션
                ['font', ['bold', 'underline', 'clear']], // 글자 굵게, 밑줄, 포맷 제거 옵션
                ['color', ['color']], // 글자 색상 설정 옵션
                ['table', ['table']], // 테이블 삽입 옵션
                ['para', ['ul', 'ol', 'paragraph']], // 문단 스타일, 순서 없는 목록, 순서 있는 목록 옵션
                ['height', ['height']], // 에디터 높이 조절 옵션
                //['insert', ['picture', 'link', 'video']], // 이미지 삽입, 링크 삽입, 동영상 삽입 옵션
                ['view', ['codeview', 'fullscreen', 'help']], // 코드 보기, 전체 화면, 도움말 옵션
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++) {
                        uploadHeadContnetImage(files[i]);
                    }
                }
            },
            fontSizes: [
                '8', '9', '10', '11', '12', '14', '16', '18',
                '20', '22', '24', '28', '30', '36', '50', '72',
            ], // 글꼴 크기 옵션

            styleTags: [
                'p',  // 일반 문단 스타일 옵션
                {
                    title: 'Blockquote',
                    tag: 'blockquote',
                    className: 'blockquote',
                    value: 'blockquote',
                },  // 인용구 스타일 옵션
                'pre',  // 코드 단락 스타일 옵션
                {
                    title: 'code_light',
                    tag: 'pre',
                    className: 'code_light',
                    value: 'pre',
                },  // 밝은 코드 스타일 옵션
                {
                    title: 'code_dark',
                    tag: 'pre',
                    className: 'code_dark',
                    value: 'pre',
                },  // 어두운 코드 스타일 옵션
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',  // 제목 스타일 옵션
            ],
        });
    });

    //본문 에디터
    $(document).ready(function() {
        $('#content').summernote({
            tabsize: 2,
            height: 500,
            lang: "ko-KR",

            toolbar: [
                ['style', ['style']], // 글자 스타일 설정 옵션
                ['fontsize', ['fontsize']], // 글꼴 크기 설정 옵션
                ['font', ['bold', 'underline', 'clear']], // 글자 굵게, 밑줄, 포맷 제거 옵션
                ['color', ['color']], // 글자 색상 설정 옵션
                ['table', ['table']], // 테이블 삽입 옵션
                ['para', ['ul', 'ol', 'paragraph']], // 문단 스타일, 순서 없는 목록, 순서 있는 목록 옵션
                ['height', ['height']], // 에디터 높이 조절 옵션
                ['insert', ['picture', 'link', 'video']], // 이미지 삽입, 링크 삽입, 동영상 삽입 옵션
                ['view', ['codeview', 'fullscreen', 'help']], // 코드 보기, 전체 화면, 도움말 옵션
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++) {
                        uploadContentImage(files[i]);
                    }
                }
            },
            fontSizes: [
                '8', '9', '10', '11', '12', '14', '16', '18',
                '20', '22', '24', '28', '30', '36', '50', '72',
            ], // 글꼴 크기 옵션

            styleTags: [
                'p',  // 일반 문단 스타일 옵션
                {
                    title: 'Blockquote',
                    tag: 'blockquote',
                    className: 'blockquote',
                    value: 'blockquote',
                },  // 인용구 스타일 옵션
                'pre',  // 코드 단락 스타일 옵션
                {
                    title: 'code_light',
                    tag: 'pre',
                    className: 'code_light',
                    value: 'pre',
                },  // 밝은 코드 스타일 옵션
                {
                    title: 'code_dark',
                    tag: 'pre',
                    className: 'code_dark',
                    value: 'pre',
                },  // 어두운 코드 스타일 옵션
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',  // 제목 스타일 옵션
            ],
        });
    });

    //본문이미지 업로드
    function uploadContentImage(file) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: '/admin/article/upload_image',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                var image = $('<img>').attr('src', url);
                $('#content').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.error(data.responseText);
            }
        });
    }

    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        if($('#p_id').val()){
            formData.append('p_id', $('#p_id').val());
        }
        if($('#c_id').val()){
            formData.append('c_id', $('#c_id').val());
        }
        formData.append('category1', $('#category1').val());
        if($('#category2').val()){  
            formData.append('category2', $('#category2').val());
        }
        if($('#banner_image_pc').val()){
            formData.append('banner_image_pc', $('#banner_image_pc')[0].files[0]);
        }
        if($('#banner_image_mobile').val()){
            formData.append('banner_image_mobile', $('#banner_image_mobile')[0].files[0]);
        }
        if($('#thumbnail').val()){
            formData.append('thumbnail', $('#thumbnail')[0].files[0]);
        }
        formData.append('title', $('#title').val());
        formData.append('content', $('#content').val());
        formData.append('article_by', $('#article_by').val());
        formData.append('picture_by', $('#picture_by').val());
        formData.append('place_by', $('#place_by').val());
        formData.append('tag', $('#tag').val());
        if($('#event_banner_img').val()){
            formData.append('event_banner_img', $('#event_banner_img')[0].files[0]);
        }
        formData.append('event_banner_text', $('#event_banner_text').val());

        $.ajax({
            url: '/admin/article/regi_article',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/article';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
        
function changCategory(){
    var selectedValue = $("#category1").val();

    if (selectedValue == '1') {
        // category1의 value가 1일 때 creator_area를 표시
        $('#creator_area').css('display', 'inline');
        $('#place_area').css('display', 'none'); // place_area는 숨김
    } else if (selectedValue == '2') {
        // category1의 value가 2일 때 place_area를 표시
        $('#place_area').css('display', 'inline');
        $('#creator_area').css('display', 'none'); // creator_area는 숨김
    } else {
        // 그 외의 경우 두 영역 모두 숨김
        $('#creator_area').css('display', 'none');
        $('#place_area').css('display', 'none');
    }
};
</script>