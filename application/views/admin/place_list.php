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
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['tag']; ?></td>
                    <td><?php echo $value['regdate']; ?></td>
                    <td><button onclick="location.href='place/modify?id=<?php echo $value['id']?>'" class="btn btn-primary btn-sm">수정</button></td>
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
</html>
