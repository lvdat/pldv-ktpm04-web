<div class="col-12">
    <div class="card">
        <div class="card-body text-center">
            <p>
                Đã đăng nhập, bạn sẽ được chuyển đến trang chủ sau <span id="countdown"></span> giây.
            </p>
        </div>
    </div>
</div>
<script>
    var count = 3;
    var countdown = setInterval(function() {
        count--;
        if(count <= 0) {
            clearInterval(countdown);
            window.location.href = '/';
        }
        document.getElementById('countdown').innerHTML = count;
    }, 1000);
</script>