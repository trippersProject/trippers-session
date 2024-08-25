<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>회원 관리 > 정보 수정</h5>
    <hr/>
    <br/>
    <form method="post" id="creatorForm">
        <input type="hidden" name="id" id="id" value="<?= $info['id']?>">
        <div>
            <h4>회원명</h4>
                <input type="text" name="name" id="name" class="form-control w-25" value="<?= $info['name'];?>">
            <hr>

            <h4>email(수정불가)</h4>
                <input type="text" name="email" id="email" class="form-control w-25" value="<?= $info['email'];?>" readonly>
            <hr>

            <h4>비밀번호(변경시 입력)</h4>
                <input type="text" name="password" id="password" class="form-control w-25" value="">
            <hr>

            <h4>회원 등급</h4>
            <select class="form-control w-25" name="auth_level" id="auth_level">
                <option value="">---선택---</option>
                <option value="99" <?= ($info['auth_level'] == '99')? "selected" : ""; ?>>매니저(관리자)</option>
                <option value="91" <?= ($info['auth_level'] == '91')? "selected" : ""; ?>>크리에이터(글작성)</option>
                <option value="11" <?= ($info['auth_level'] == '11')? "selected" : ""; ?>>트리퍼(일반회원)</option>
            </select>

            <hr>
            
            <h4>연락처('-' 제외)</h4>
                <input type="text" name="phone" id="phone" class="form-control w-25" value="<?= $info['phone'];?>">
            <hr>

            <h4>보유포인트</h4>
                <input type="text" name="point" id="point" class="form-control w-25" value="<?= $info['point'];?>">
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
        formData.append('name', $('#name').val());
        formData.append('auth_level', $('#auth_level').val());
        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());
        formData.append('phone', $('#phone').val());
        formData.append('point', $('#point').val());

        $.ajax({
            url: '/admin/member/regi_member',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response)
                alert(result.msg);
                window.location.href = '/admin/member';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>