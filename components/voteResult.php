<p>
    Dưới đây là kết quả phản hồi về việc bình xét Đoàn viên Ưu tú của Đoàn Khoa.
</p>


<table class="table table-hover table-responsive" id="info_dv">
    <thead>
        <tr class="table-dark">
            <th scope="col" style="width:20%">MSSV</th>
            <th scope="col" style="width:30%">Họ và tên</th>
            <th scope="col" style="width:20%">Tỉ lệ Đồng ý</th>
            <th scope="col" style="width:30%">Kết quả từ ĐK</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $a = getVoteDataResult();
        foreach($a as $key => $value):
            $userData = getInfoUserByCode($value['code']);
    ?>
        <tr>
            <td><?=$value['code']?></td>
            <td><?=$userData['name']?></td>
            <td><?=$value['upvote'] . '/' . $config['statics']['voted']?></td>
            <td><b style="color: <?=$config['dvut_color'][$value['approved']]?>"><?=$config['dvut_status'][$value['approved']]?></b></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>