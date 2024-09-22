<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>매장 관리 > 정보 등록</h5>
    <hr/>
    <br/>
    <form method="post" id="placeForm">
        <input type="hidden" name="id" id="id" value="">
        <div>
            <h4>매장명</h4>
                <input type="text" name="name" id="name" class="form-control w-50" value="">
            <hr>

            <h4>매장 타이틀</h4>
                <input type="text" name="sub_name" id="sub_name" class="form-control w-50" value="">
            <hr>

            <h4>태그 ( '#' 으로 구분)</h4>
                <input type="text" name="tag" id="tag" class="form-control w-25" value="">
            <hr>

            <h4>프로필 이미지</h4>
                <input type="file" name="profile_image" id="profile_image" class="form-control w-25">

            <hr>

            <h4>대표 이미지</h4>
                <input type="file" name="banner_image" id="banner_image" class="form-control w-25">

            <hr>

            <h4>매장 소개</h4>
            <!-- 에디터 -->
                <textarea id="summernote" name="description"></textarea>
            <hr>
            
            <h4>홈페이지 URL</h4>
                <input type="text" name="homepage_url" id="homepage_url" class="form-control" value="">
            <hr>

            <h4>SNS 링크 1</h4>
                <input type="text" name="sns_url_1" id="sns_url_1" class="form-control" value="">
            <hr>

            <h4>SNS 링크 2</h4>
                <input type="text" name="sns_url_2" id="sns_url_2" class="form-control" value="">
            <hr>

            <h4>SNS 링크 3</h4>
                <input type="text" name="sns_url_3" id="sns_url_3" class="form-control" value="">
            <hr>
        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">등록</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
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
                        uploadImage(files[i]);
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
    function uploadImage(file) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: '/admin/place/upload_image',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                var image = $('<img>').attr('src', url);
                $('#summernote').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.error(data.responseText);
            }
        });
    }

    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('name', $('#name').val());
        formData.append('sub_name', $('#sub_name').val());
        formData.append('tag', $('#tag').val());
        formData.append('description', $('#summernote').val());
        formData.append('homepage_url', $('#homepage_url').val());
        formData.append('sns_url_1', $('#sns_url_1').val());
        formData.append('sns_url_2', $('#sns_url_2').val());
        formData.append('sns_url_3', $('#sns_url_3').val());
        if($('#profile_image').val()){
            formData.append('profile_image', $('#profile_image')[0].files[0]);
        }
        if($('#banner_image').val()){
            formData.append('banner_image', $('#banner_image')[0].files[0]);
        }

        $.ajax({
            url: '/admin/place/regi_place',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/place';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>