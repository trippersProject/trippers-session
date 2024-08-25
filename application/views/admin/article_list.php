<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>포스트 목록</h2>
    <button onclick="location.href='article/apply'" class="btn btn-secondary btn-sm">글쓰기</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">제목</th>
                <th scope="col">정렬순서</th>
                <th scope="col">노출여부</th>
                <th scope="col">카테고리</th>
                <th scope="col">작성일</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['ta_title']; ?></td>
                    <td><input type="number" id="sort_<?= $value['ta_id']; ?>" class="form-control sort-input" style="width:60px" value="<?= $value['ta_sort']; ?>" data-id="<?= $value['ta_id']; ?>"></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input use-checkbox" type="checkbox" id="use_yn_<?= $value['ta_id']; ?>" data-id="<?= $value['ta_id']; ?>" <?=($value['ta_use_yn'] == 'Y')? "checked" : ""?>>
                        </div>
                    </td>
                    <td><?php echo $value['tc_name']?></td>
                    <td><?php echo $value['ta_regdate']; ?></td>
                    <td><button onclick="location.href='article/modify?id=<?php echo $value['ta_id']?>'" class="btn btn-primary btn-sm">수정</button></td>
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
            url: 'article/update_sort',
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
            url: 'article/update_use_yn',
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
</script>
</html>
