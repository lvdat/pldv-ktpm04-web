<div class="col-12">
    <div class="card">
        <div class="card-body text-center">
            <p>
                <?php
                    switch ($error_code) {
                        case '404':
                            echo 'Trang này không tồn tại.';
                            break;
                        case '403':
                            echo 'Email không hợp lệ, vui lòng sử dụng Tài khoản Google Trường cấp để đăng nhập';
                            break;
                        default:
                            echo 'Lỗi hệ thống.';
                            break;
                    }
                ?>
            </p>
        </div>
    </div>
</div>