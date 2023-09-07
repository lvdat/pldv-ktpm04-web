<?php if (!$config['hide']['arisu_gif']) : ?>
<div class="card mb-2">
    <div class="card-body">
        <div class="card mb-2">
            <div class="card-body">
                <b>Hạn chót bầu cử BCH:</b> 20/09/2023
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <img src="/assets/arisu.gif" style="max-width: 50%" />
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (!$config['hide']['statistics']) : ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-line"></i> Thống kê <?php if(!$config['isFinalResult']): ?><b class="text-danger">(Chưa
            chính thức)</b><?php endif ?>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Năm học xét:
            <span class="badge bg-primary rounded-pill">2022 - 2023</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Tổng số Đoàn viên:
            <span class="badge bg-primary rounded-pill"><?=$config['statics']['users']?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ĐV xếp loại Xuất Sắc:
            <span class="badge bg-success rounded-pill"><?=$config['statics']['xuatsac']?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ĐV xếp loại Khá:
            <span class="badge bg-secondary rounded-pill"><?=$config['statics']['kha']?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ĐV xếp loại Trung Bình:
            <span class="badge bg-warning rounded-pill"><?=$config['statics']['trungbinh']?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ĐV xếp loại Yếu Kém:
            <span class="badge bg-danger rounded-pill"><?=$config['statics']['yeukem']?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Xếp loại Chi Đoàn:
            <span class="badge bg-danger rounded-pill">Trung bình</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ĐV đã bình xét DVUT:
            <span class="badge bg-secondary rounded-pill"><?=$config['statics']['voted']?></span>
        </li>
    </ul>
</div>
<?php endif ?>
<?php if (!$config['hide']['contact']) : ?>
<div class="card">
    <div class="card-header">
        <i class="fas fa-phone-volume"></i> Liên hệ
    </div>
    <div class="card-body">
        <div class="card mb-3">
            <div class="card-body">
                Để phản hồi về thông tin Đoàn viên, kết quả xếp loại, vui lòng liên hệ: <br />
                Nguyễn Ngọc Lam Thanh (Bí thư Chi đoàn): <br />
                <li>Email: thanhb2012255@student.ctu.edu.vn</li>
                <li>SDT/Zalo: 0776537697</li>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Để phản hồi về thông tin, điểm hiển thị trên hệ thống này, vui lòng liên hệ: <br />
                Lê Văn Đạt (UV BCH): <br />
                <li>Email: <?=$config['email']?></li>
                <li>SDT/Zalo: <?=$config['zalo']?></li>
            </div>
        </div>

    </div>
</div>
<?php endif ?>