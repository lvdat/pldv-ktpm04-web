<div class="col-md-8 mb-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <b><i class="fas fa-poll"></i> Bầu chọn Ban chấp hành Chi Đoàn</b>
        </div>
        <div class="card-body">

            <?php 
                if($config['isFinalResult'])
                    include 'components/bchVoteResult.php';
                else
                    include 'components/bchVote.php'; 
            ?>

            <div class="card mt-1">
                <div class="card-body">
                    <b>Chú ý:</b>
                    <li>Hệ thống không ghi lại thông tin của người tham gia bầu chọn, xem qua mã nguồn <a
                            href="https://github.com/lvdat/pldv-ktpm04-web" target="_blank">tại đây</a>.</li>
                    <li>Chỉ được bầu một lần và <b>không thể sửa đổi lựa chọn</b></li>
                    <li>Nếu bạn nào không tham gia bầu chọn thì mặc định tất cả phiếu của bạn đó là <b>Không đồng ý</b>
                    </li>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-4">
    <?php require_once 'components/siteBar.php'; ?>
</div>
<script>
document.title = 'BẦU CHỌN BCH NHIỆM KỲ 2023 - 2024';
</script>