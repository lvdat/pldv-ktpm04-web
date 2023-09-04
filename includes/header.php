<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/inc/load.php';
if(checkLogin()) {
    $render = getInfoCurrentUser();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?=isset($customTitle) ? $customTitle : $config['site_title']?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/assets/main.css?v=<?=time()?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/805c912558.js" crossorigin="anonymous"></script>
    <script type="module" src="https://md-block.verou.me/md-block.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/"><b><i class="fas fa-university"></i> KTPM04</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(checkLogin()): ?>
                    <li class="nav-item">
                        <a class="nav-link<?=$root=="main" ? " active": ""?>" href="/"><i
                                class="fas fa-info-circle"></i> Xếp loại Đoàn viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?=$root=="dvut" ? " active": ""?>" href="/dvut"><i class="fas fa-poll"></i>
                            Bình xét DVUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?=$root=="votebch" ? " active": ""?>" href="/votebch"><i
                                class="fas fa-poll"></i>
                            Bầu BCH</a>
                    </li>
                    <?php if(in_array($render['code'], $config['bch'])): ?>
                    <li class="nav-item">
                        <a class="nav-link<?=$root=="unvoted" ? " active": ""?>" href="/unvoted"><i
                                class="fas fa-exclamation"></i> Chưa bình xét DVUT</a>
                    </li>
                    <?php endif ?>
                    <?php endif ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(!checkLogin()): ?>
                    <li class="nav-item">
                        <a class="nav-link active"><i class="fas fa-user-alt-slash"></i> Chưa đăng nhập</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-user-circle"></i> Xin chào, <?=$render['name'] . ' ' . $render['code']?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng
                                    xuất</a></li>
                        </ul>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">