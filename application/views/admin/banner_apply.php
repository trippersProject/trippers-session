<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>크리에이터 관리 > 정보 수정</h5>
    <hr/>
    <br/>
    <form method="post" id="bannerForm">
        <input type="hidden" name="id" id="id" value="">
        <div>
            <h4>배너 설명</h4>
                <input type="text" name="name" id="name" class="form-control" value="">
            <hr>

            <h4>배너 분류</h4>
            <select class="form-control" name="category" id="category">
                <option value="">---선택---</option>
                <option value="MT">메인페이지 상단</option>
                <option value="MB">메인페이지 하단</option>
                <option value="AC">ARCHIVE 페이지</option>
            </select>

            <hr>

            <h4>배너 이미지(PC)</h4>
                <input type="file" name="filename_pc" id="filename_pc" class="form-control w-25">

            <hr>

            <h4>배너 이미지(mobile)</h4>
                <input type="file" name="filename_mobile" id="filename_mobile" class="form-control w-25">

            <hr>

            <h4>배너 연결링크</h4>
                <input type="text" name="link" id="link" class="form-control" value="">
            <hr>

        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">등록</button>
        </div>
    </form>
</div>
<script>
    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('name', $('#name').val());
        formData.append('category', $('#category').val());
        formData.append('link', $('#link').val());
        if($('#filename_pc').val()){
            formData.append('filename_pc', $('#filename_pc')[0].files[0]);
        }
        if($('#filename_mobile').val()){
            formData.append('filename_mobile', $('#filename_mobile')[0].files[0]);
        }

        $.ajax({
            url: '/admin/banner/regi_banner',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/banner';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>