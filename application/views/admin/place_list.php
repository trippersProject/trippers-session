<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>매장 목록</h2>

    <button onclick="location.href='place/apply'" class="btn btn-secondary btn-sm">매장 등록</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">매장</th>
                <th scope="col">태그</th>
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
                    <td><?= $value['tag']; ?></td>
                    <td><?= $value['regdate']; ?></td>
                    <td>
                        <button onclick="location.href='place/modify?id=<?= $value['id']?>'" class="btn btn-primary btn-sm">수정</button>
                        <button onclick="deletePlace(<?= $value['id']?>)" class="btn btn-danger btn-sm">삭제</button>
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

function deletePlace(id){
    var placeId = id;
    if(placeId == ''){
        alert("필수값 누락입니다.");
        return;
    }
    if(confirm('해당 매장을 삭제하시겠습니까?')){
        $.ajax({
            url: 'place/place_delete',
            dataType: 'json',
            type: 'POST',
            data: {
                id: placeId
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
