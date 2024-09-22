<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>크리에이터 목록</h2>

    <button onclick="location.href='creator/apply'" class="btn btn-secondary btn-sm">크리에이터 등록</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">크리에이터</th>
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
                        <button onclick="location.href='creator/modify?id=<?= $value['id']?>'" class="btn btn-primary btn-sm">수정</button>
                        <button onclick="deleteCreator(<?= $value['id']?>)" class="btn btn-danger btn-sm">삭제</button>
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

function deleteCreator(id){
    var creatorId = id;
    if(creatorId == ''){
        alert("필수값 누락입니다.");
        return;
    }
    if(confirm('해당 크리에이터를 삭제하시겠습니까?')){
        $.ajax({
            url: 'creator/creator_delete',
            dataType: 'json',
            type: 'POST',
            data: {
                id: creatorId
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
