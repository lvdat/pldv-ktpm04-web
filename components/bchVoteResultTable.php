<table class="table table-hover table-responsive" id="info_dv">
    <thead>
        <tr class="table-dark">
            <th scope="col" style="width:20%">MSSV</th>
            <th scope="col" style="width:30%">Họ và tên</th>
            <th scope="col" style="width:30%">Đồng ý</th>
            <th scope="col" style="width:20%">Kết quả</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = getBCHVoteDataResult();
        foreach($a as $key => $value):
            $userData = getInfoUserByCode($value['code']);
    ?>
        <tr>
            <td><?=$value['code']?></td>
            <td><?=$userData['name']?></td>
            <td><span
                    class="badge bg-success rounded-pill"><?=$value['upvote'] . '/' . $config['statics']['bch_voted']?>
                    (<?=$config['statics']['bch_voted'] ? (round($value['upvote']/($config['statics']['bch_voted'])*100, 1)) : 0 ?>%)
                </span>
            </td>
            <td><b
                    style="color: <?=$config['bch_vote_color'][$value['status']]?>"><?=$config['bch_vote_status'][$value['status']]?></b>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>