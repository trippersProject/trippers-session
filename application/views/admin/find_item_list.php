<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>FIND ITEM 목록</h2>

    <button onclick="location.href='find_item/apply'" class="btn btn-secondary btn-sm">FIND ITEM 등록</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">아이템명</th>
                <th scope="col">소모포인트</th>
                <th scope="col">정렬순서</th>
                <th scope="col">메인페이지 노출여부</th>
                <th scope="col">노출여부</th>
                <th scope="col">등록일</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['use_point']; ?></td>
                    <td><input type="number" id="sort_<?= $value['id']; ?>" class="form-control sort-input" style="width:60px" value="<?= $value['sort']; ?>" data-id="<?= $value['id']; ?>"></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input main-use-checkbox" type="checkbox" id="main_use_yn_<?= $value['id']; ?>" data-id="<?= $value['id']; ?>" <?=($value['main_use_yn'] == 'Y')? "checked" : ""?>>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input use-checkbox" type="checkbox" id="use_yn_<?= $value['id']; ?>" data-id="<?= $value['id']; ?>" <?=($value['use_yn'] == 'Y')? "checked" : ""?>>
                        </div>
                    </td>
                    <td><?= $value['regdate']; ?></td>
                    <td><button onclick="location.href='find_item/modify?id=<?= $value['id']?>'" class="btn btn-primary btn-sm">수정</button></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">조회된 아이템이 없습니다</td>
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
            url: 'find_item/update_sort',
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
            url: 'find_item/update_use_yn',
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

    //main_use_yn 체크박스 상태가 변경되었을 때
    $('.main-use-checkbox').on('change', function() {
        var id = $(this).data('id');
        var useYnValue = $(this).is(':checked') ? 'Y' : 'N';

        $.ajax({
            url: 'find_item/update_main_use_yn',
            type: 'POST',
            data: {
                id: id,
                main_use_yn: useYnValue
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
