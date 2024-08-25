<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>FIND ITEM 관리 > 정보 수정</h5>
    <hr/>
    <br/>
    <form method="post" id="creatorForm">
        <input type="hidden" name="id" id="id" value="<?= $info['id']?>">
        <div>
            <h4>FIND ITEM명</h4>
                <input type="text" name="name" id="name" class="form-control" value="<?= $info['name'];?>">
            <hr>

            <h4>응모시 소모 포인트</h4>
                <input type="text" name="use_point" id="use_point" class="form-control w-25" value="<?= $info['use_point'];?>">
            <hr>

            <h4>대표 이미지</h4>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control w-25">

            <hr>

            <div class="container mt-5">
                <h5>현재 대표 이미지</h5>
                <p><?= $info['thumbnail'];?></p>
                <img src="<?= base_url(get_find_item_upload_path().$info['thumbnail']);?>" class="img-fluid" style="max-width: 100%;">
            </div>

            <hr>

            <h4>FIND ITEM 간략소개(배너 노출)</h4>
            <!-- 에디터 -->
                <textarea class="summernote" id="content_sub" name="content_sub"><?= $info['content_sub'];?></textarea>
            <hr>

            <h4>FIND ITEM 소개(본문)</h4>
            <!-- 에디터 -->
                <textarea class="summernote" id="content" name="content"><?= $info['content'];?></textarea>
            <hr>
        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">수정</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
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
                        uploadImage(files[i], $this.prop("id"));
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

    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('name', $('#name').val());
        formData.append('use_point', $('#use_point').val());
        formData.append('content', $('#content').val());
        formData.append('content_sub', $('#content_sub').val());
        if($('#thumbnail').val()){
            formData.append('thumbnail', $('#thumbnail')[0].files[0]);
        }

        $.ajax({
            url: '/admin/find_item/regi_find_item',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/find_item';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>