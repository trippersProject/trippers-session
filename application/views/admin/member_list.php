<?php
$auth_level = $this->config->item('auth_level');
?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>회원 목록</h2>

    <!-- <button onclick="location.href='member/apply'" class="btn btn-secondary btn-sm">회원 등록</button> -->
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">회원명</th>
                <th scope="col">등급</th>
                <th scope="col">ID(Email)</th>
                <th scope="col">연락처</th>
                <th scope="col">보유포인트</th>
                <th scope="col">약관동의</th>
                <th scope="col">구독동의</th>
                <th scope="col">가입일</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $auth_level[$value['auth_level']]; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['phone']; ?></td>
                    <td><?= $value['point']; ?> point</td>
                    <td><?= $value['terms_agree']; ?></td>
                    <td><?= $value['subscribe_agree']; ?></td>
                    <td><?= $value['regdate']; ?></td>
                    <td><button onclick="location.href='member/modify?id=<?= $value['id']?>'" class="btn btn-primary btn-sm">수정</button></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">조회된 회원이 없습니다</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
</html>
