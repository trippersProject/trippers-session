<?php
$banner_category = $this->config->item('banner_category');
?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>배너이미지 목록</h2>

    <button onclick="location.href='banner/apply'" class="btn btn-secondary btn-sm">배너이미지 등록</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">배너설명</th>
                <th scope="col">배너분류</th>
                <th scope="col">정렬순서</th>
                <th scope="col">사용여부</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $banner_category[$value['category']]; ?></td>
                    <td><input type="number" id="sort_<?= $value['id']; ?>" class="form-control sort-input" style="width:60px" value="<?= $value['sort']; ?>" data-id="<?= $value['id']; ?>"></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input use-checkbox" type="checkbox" id="use_yn_<?= $value['id']; ?>" data-id="<?= $value['id']; ?>" <?=($value['use_yn'] == 'Y')? "checked" : ""?>>
                        </div>
                    </td>
                    <td>
                        <button onclick="location.href='banner/modify?id=<?= $value['id']?>'" class="btn btn-primary btn-sm">수정</button>
                        <button onclick="deleteBanner(<?= $value['id']?>)" class="btn btn-danger btn-sm">삭제</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">조회된 포스트가 없습니다</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
<script>
$(document).ready(function() {
    // sort 값이 변경되었을 때
    $('.sort-input').on('change', function() {
        var id = $(this).data('id');
        var sortValue = $(this).val();

        $.ajax({
            url: 'banner/update_sort',
            type: 'POST',
            data: {
                id: id,
                sort: sortValue
            },
            success: function(response) {
                alert('노출순서가 업데이트되었습니다.');
            },
            error: function(xhr, status, error) {
                alert('업데이트 중 오류가 발생했습니다.');
            }
        });
    });

    // use_yn 체크박스 상태가 변경되었을 때
    $('.use-checkbox').on('change', function() {
        var id = $(this).data('id');
        var useYnValue = $(this).is(':checked') ? 'Y' : 'N';

        $.ajax({
            url: 'banner/update_use_yn',
            type: 'POST',
            data: {
                id: id,
                use_yn: useYnValue
            },
            success: function(response) {
                alert('사용여부가 업데이트되었습니다.');
            },
            error: function(xhr, status, error) {
                alert('업데이트 중 오류가 발생했습니다.');
            }
        });
    });
});

function deleteBanner(id){
    var bannerId = id;
    if(bannerId == ''){
        alert("필수값 누락입니다.");
        return;
    }
    if(confirm('해당 게시물을 삭제하시겠습니까?')){
        $.ajax({
            url: 'banner/banner_delete',
            dataType: 'json',
            type: 'POST',
            data: {
                id: bannerId
            },
            success: function(response) {
                if(response.code == '0000'){               
                    alert('삭제처리 되었습니다.');
                    location.reload();
                }else{
                    alert(response.msg);
                }
            },
            error: function(xhr, status, error) {
                alert('업데이트 중 오류가 발생했습니다.');
            }
        });
    }
}
</script>
</html>
