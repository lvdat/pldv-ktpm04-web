<style>
md-block {
    /* white-space: pre; */
    font-family: monospace;
}

.card-body.dv_info {
    padding-bottom: unset;
}
</style>
<p>
    Dưới đây là kết quả học tập và thành tích tiêu biểu của các bạn đã đủ điều kiện và mong muốn trở thành Đoàn viên ưu
    tú.
    Hãy click vào từng tên, xem chi tiết điểm và thành tích, sau đó click chọn Đồng ý hoặc Không đồng ý để bình bầu.
</p>
<?php 
    $a = getVoteData();
    if(isset($_POST['vote'])){
        if(isVoted()){
            echo '<script>alert("Bạn đã bình chọn rồi!");</script>';
        } else {
            for($i = 0; $i < count($a); $i++){
                $code = $a[$i]['code'];
                $vote = $_POST[$code];
                if($vote == 'up') {
                    upVote($code);
                } else {
                    downVote($code);
                }
            }
            setVoted();
        }
    }
?>
<?php if(!isVoted()) : ?>
<form action="/dvut" method="POST" class="mb-3">
    <div class="accordion mb-3" id="accordionPanelsStayOpenExample">

        <?php foreach($a as $key => $value): ?>
        <?php $userData = getInfoUserByCode($value['code']); ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading<?=$key?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse<?=$key?>" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapse<?=$key?>">
                    <?=$value['code'] . ' - ' .$userData['name']?>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse<?=$key?>" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-heading<?=$key?>">
                <div class="accordion-body">
                    <p><b>Kết quả học tập</b></p>
                    <table class="table table-hover table-responsive" id="info_dv">
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
                                <td><?=$userData['dtb1']?></td>
                                <td><?=$userData['dtb2']?></td>
                                <td><b><?=$userData['dtb']?></b></td>
                            </tr>
                            <tr>
                                <td>Điểm rèn luyện</td>
                                <td><?=$userData['drl1']?></td>
                                <td><?=$userData['drl2']?></td>
                                <td><b><?=$userData['drl']?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <p><b>Thành tích tiêu biểu</b></p>
                    <div class="card mb-2">
                        <div class="card-body dv_info">
                            <md-block>
                                <?=$value['info']?>
                            </md-block>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?=$value['code']?>"
                                    id="inlineRadio-<?=$value['code'] . '-' . $key?>" value="up" checked="checked"
                                    required />
                                <label class="form-check-label text-success" style="cursor: pointer"
                                    for="inlineRadio-<?=$value['code'] . '-' . $key?>"><i
                                        class="fas fa-check-circle"></i> Đồng ý
                                    <span class="badge bg-success rounded-pill"><?=$value['upvote']?></span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?=$value['code']?>"
                                    id="inlineRadio-<?=$value['code'] . '-' . ($key + 1)?>" value="down">
                                <label class="form-check-label text-danger" style="cursor: pointer"
                                    for="inlineRadio-<?=$value['code'] . '-' . ($key + 1)?>"><i
                                        class="fas fa-times-circle"></i> Không đồng ý
                                    <span class="badge bg-danger rounded-pill"><?=$value['downvote']?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center">
        <button type="submit" name="vote" class="btn btn-primary">
            <i class="fas fa-check"></i> GỬI BÌNH CHỌN
        </button>
    </div>
</form>
<?php else : ?>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Done!</h4>
    <p>Cảm ơn bạn đã tham gia bình xét Đoàn viên ưu tú!</p>
    <hr>
    <small>Nếu bạn muốn thay đổi lựa chọn, vui lòng liên hệ BCH để reset lượt bầu của bạn.</small>
</div>

<?php require 'voteResultTable.php' ?>

<?php endif ?>