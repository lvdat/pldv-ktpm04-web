<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-success text-white">
            <b><i class="fas fa-check-circle"></i> Thông tin xếp loại Đoàn viên</b>
        </div>
        <div class="card-body">
            <p class="text-center">
                Dưới đây là kết quả học tập và kết quả xếp loại Đoàn viên của bạn dựa trên quy định của Đoàn Khoa.
            </p>
            <table class="table table-hover" id="info_dv">
                <thead>
                    <tr class="table-dark">
                        <th scope="col" style="width:40%">Điểm</th>
                        <th scope="col" style="width:20%">HK1</th>
                        <th scope="col" style="width:20%">HK2</th>
                        <th scope="col" style="width:20%">Trung bình năm</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Điểm trung bình học tập</td>
                        <td><?=$render['dtb1']?></td>
                        <td><?=$render['dtb2']?></td>
                        <td><b><?=$render['dtb']?></b></td>
                    </tr>
                    <tr>
                        <td>Điểm rèn luyện</td>
                        <td><?=$render['drl1']?></td>
                        <td><?=$render['drl2']?></td>
                        <td><b><?=$render['drl']?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>KẾT QUẢ XẾP LOẠI ĐOÀN VIÊN</b></td>
                        <td style="color: <?=$config['xeploai_color'][$render['xeploai'] - 1]?>"><b><?=$config['xeploai'][$render['xeploai'] - 1]?></b></td>
                    </tr>
                </tbody>
            </table>
            <div class="card mt-1">
                <div class="card-body">
                    <b>Chú ý:</b> Điểm TB sẽ tính tất cả các học phần đã học, kể cả các học phần bị điểm F.
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-4">
    4
</div>