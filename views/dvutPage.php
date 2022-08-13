<div class="col-md-8 mb-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <b><i class="fas fa-poll"></i> Bình xét Đoàn viên ưu tú</b>
        </div>
        <div class="card-body">
            <p>
                Dưới đây là kết quả học tập và thành tích tiêu biểu của các bạn đã đủ điều kiện và mong muốn trở thành Đoàn viên ưu tú.
                Hãy click vào từng tên, xem chi tiết điểm và thành tích, sau đó click chọn Đồng ý hoặc Không đồng ý để bình bầu.
            </p>

            <?php include 'components/vote.php'; ?>

            <div class="card mt-1">
                <div class="card-body">
                    <b>Chú ý:</b> 
                    <li>Hệ thống không ghi lại thông tin của người tham gia bình xét, xem qua mã nguồn <a href="https://github.com/lvdat/pldv-ktpm04-web" target="_blank">tại đây</a>.</li>
                    <li>Chỉ được bầu một lần</li>
                    <li>Nếu bạn nào không tham gia bình xét thì mặc định tất cả phiếu của bạn đó là <b>Không đồng ý</b></li>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-4">
    <?php require_once 'components/siteBar.php'; ?>
</div>
