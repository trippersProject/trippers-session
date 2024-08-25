<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>크리에이터 관리 > 정보 수정</h5>
    <hr/>
    <br/>
    <form method="post" id="creatorForm">
        <input type="hidden" name="id" id="id" value="<?= $info['id']?>">
        <div>
            <h4>상품명</h4>
                <input type="text" name="goods_name" id="goods_name" class="form-control w-50" value="<?= $info['goods_name'];?>">
            <hr>

            <h4>정상가</h4>
                <input type="text" name="normal" id="normal" class="form-control w-25" value="<?= $info['normal'];?>">
            <hr>

            <h4>판매가</h4>
                <input type="text" name="price" id="price" class="form-control w-25" value="<?= $info['price'];?>">
            <hr>

            <h4>대표 이미지</h4>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control w-25">

            <hr>

            <div class="container mt-5">
                <h5>현재 대표 이미지</h5>
                <p><?= $info['thumbnail'];?></p>
                <img src="<?= base_url(get_goods_upload_path().$info['thumbnail']);?>" class="img-fluid" style="max-width: 30%;">
            </div>

            <hr>
            
            <h4>상품페이지 URL</h4>
                <input type="text" name="url" id="url" class="form-control w-75" value="<?= $info['url'];?>">
            <hr>
        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">수정</button>
        </div>
    </form>
</div>
<script>
    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('goods_name', $('#goods_name').val());
        formData.append('normal', $('#normal').val());
        formData.append('price', $('#price').val());
        formData.append('url', $('#url').val());
        if($('#thumbnail').val()){
            formData.append('thumbnail', $('#thumbnail')[0].files[0]);
        }

        $.ajax({
            url: '/admin/goods/regi_goods',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/goods';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>