<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>포인트 적립/사용 목록</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">회원Email</th>
                <th scope="col">사용처</th>
                <th scope="col">적립/사용</th>
                <th scope="col">구분</th>
                <th scope="col">포인트</th>
                <th scope="col">기록일</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= ($value['u_email']) ? $value['u_email'] : "알수없음"; ?></td>
                    <td><?= ($value['a_title']) ? $value['a_title'] : $value['f_name']; ?></td>
                    <td><?= ($value['p_point_gubun'] == 'E') ? "적립" : "사용"; ?></td>
                    <td><?= $value['p_point_path']; ?></td>
                    <td><?= $value['p_point_acount']; ?> point</td>
                    <td><?= $value['p_record_date']; ?></td>
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
