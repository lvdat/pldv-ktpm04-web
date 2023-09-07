<?php if(in_array($render['code'], $config['bch'])): ?>
<div class="col-md-8 mb-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <b><i class="fas fa-exclamation"></i> Danh sách Đoàn viên chưa bầu chọn BCH</b>
        </div>
        <div class="card-body">
            <p>
                Dưới đây là danh sách Đoàn viên chưa tham gia bầu chọn BCH.
            </p>
            <table class="table table-hover table-responsive" id="info_dv">
                <thead>
                    <tr class="table-dark">
                        <th scope="col" style="width:40%">MSSV</th>
                        <th scope="col" style="width:60%">Họ Tên</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $data = getUnvotedBCH();
                            foreach($data as $item):
                        ?>
                    <tr>
                        <td><?=$item['code']?></td>
                        <td><?=$item['name']?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><b>TỔNG</b></td>
                        <td style="color: red"><b><?=count($data)?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <?php require_once 'components/siteBar.php'; ?>
</div>
<?php else: ?>
<?php http_response_code(403) ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            Bạn không có quyền xem trang này!
        </div>
    </div>
</div>
<?php endif ?>