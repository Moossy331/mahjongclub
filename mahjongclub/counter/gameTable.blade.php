<?php
    session_start();
    include_once "../inc/helpers.php";
    if(isset($_POST['newGameSubmit'])){
        $fee = (float)$_POST['fee'];
        $result = newGame($_POST['tableID'], $_POST['tablerMobile'], $_POST['score'], $fee, $_POST['note']);
        echo "<script>alert('{$result}');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>管理後台</title>

    <link rel="stylesheet" href="../static/css/backend.css" >
    <link rel="stylesheet" href="../static/css/main.css" >
    <link rel="stylesheet" href="../static/css/main1.css" >
    <link rel="stylesheet" href="../static/css/main2.css" >
    <link rel="stylesheet" href="../static/css/main3.css" >
    <link rel="stylesheet" href="../static/css/backend-plugin.min.css" >
    <link rel="stylesheet" href="../static/css/backend.css" >

    <!-- 生成QR-Code的JS -->
    <script src="../static/js/qrcode.min.js"></script>
    
</head>
<body>
    <!-- top框開始 -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="side-menu-bt-sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30"
                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
                <h5 class="text-center">大聯盟棋牌社</h5>
                <div class="d-flex align-items-center">
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none"
                            viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list align-items-center">
                            <li class="nav-item nav-icon dropdown">
                                <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="../static/picture/1.jpg" class="img-fluid avatar-rounded" alt="user">
                                    <span class="mb-0 ml-2 user-name">用戶賬號</span>
                                </a>
                                <!-- <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <li class="dropdown-item d-flex svg-icon">
                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        <a href="information">修改個人信息</a>
                                    </li>
                                    <li class="dropdown-item d-flex svg-icon">
                                        <svg class="svg-icon mr-0 text-secondary" id="h-04-p" width="20"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        <a href="user-privacy-setting.html">QR-Code</a>
                                    </li>
                                    <li class="dropdown-item  d-flex svg-icon border-top">
                                        <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        <a href="signOut">登&nbsp出</a>
                                    </li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- top框結束 -->
    <!-- 左側功能框開始 -->
    <div class="iq-sidebar  sidebar-default  ">
        <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
            <a href="./home_counter.blade.php" class="header-logo">
                <!-- <img src="static/picture/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                <img src="static/picture/logo-dark.png" class="img-fluid rounded-normal d-none sidebar-light-img"
                    alt="logo"> -->
                <span>（系統名稱）</span>
            </a>
            <div class="side-menu-bt-sidebar-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
        </div>
        <div class="data-scrollbar" data-scroll="1">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="side-menu">
                    <li class="active sidebar-layout">
                        <a href="./home_counter.blade.php" class="svg-icon">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </i>
                            <span class="ml-2">主頁</span>
                            <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                        </a>
                    </li>
                    <li class="px-3 pt-3 pb-2 ">
                        <span class="text-uppercase small font-weight-bold">功能</span>
                    </li>
                    <li class=" sidebar-layout">
                        <a href="./gameTable.blade.php" class="svg-icon ">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </i>
                            <span class="ml-2">棋牌桌管理</span>
                        </a>
                    </li>
                    <li class=" sidebar-layout">
                        <a href="./deposit.php" class="svg-icon ">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </i>
                            <span class="ml-2">會員儲值</span>
                        </a>
                    </li>
                    <li class=" sidebar-layout">
                        <a href="./place_report_counter.blade.php" class="svg-icon ">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </i>
                            <span class="ml-2">場地報表</span>
                        </a>
                    </li>
                    <li class=" sidebar-layout">
                        <a href="./game_report.blade.php" class="svg-icon">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                    </path>
                                </svg>
                            </i>
                            <span class="ml-2">遊戲報表</span>
                        </a>
                    </li>
                    <!-- <li class=" sidebar-layout">
                        <a href="friends" class="svg-icon">
                            <i class="">
                                <svg class="icon line" width="18" id="receipt" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                                        style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </path>
                                    <line x1="8" y1="10" x2="12" y2="10"
                                        style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </line>
                                </svg>
                            </i>
                            <span class="ml-2">好友社交</span>
                            <p class="mb-0 w-10 badge badge-pill badge-success">6</p>
                        </a>
                    </li> -->

                </ul>
            </nav>
            <div class="pt-5 pb-5"></div>
        </div>
    </div>
    <!-- 左側功能框結束 -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- 內容開始 -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb p-0 mb-0">
                                            <li class="breadcrumb-item"><a href="home_counter">主頁</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">棋牌桌管理</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createTable">
                                            開台
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="createTable" tabindex="-1" role="dialog" aria-labelledby="createTableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createTableTitle">開台</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" class="needs-validation" novalidate>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom01">桌號</label>
                                                                    <div class="form-group">
                                                                        <select class="form-control form-control-sm mb-3" name="tableID">
                                                                            <option selected="">請選擇桌號</option>
                                                                            <?php
                                                                                newGameShowTables('TYN001');
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom02">桌長賬號</label>
                                                                    <input type="text" class="form-control" id="validationCustom02" name="tablerMobile" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom03">基礎分數</label>
                                                                    <input type="number" class="form-control" id="validationCustom03" name="score" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom04">服務費</label>
                                                                    <input type="text" class="form-control" id="validationCustom04" name="fee">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom05">備註</label>
                                                                    <input type="text" class="form-control" id="validationCustom05" name="note">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" name="newGameSubmit">新增</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="friends_add" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            添加好友
                                        </a> -->
                                    </div>                            
                                </div>
                            </div>                    
                        </div>

                        <!-- TODO：渲染所有桌子狀態 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <div class="custom-control custom-switch custom-switch-text custom-control-inline">
                                                <div class="custom-switch-inner">
                                                    
                                                </div>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                <div class="custom-switch-inner">

                                                </div>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                <div class="custom-switch-inner">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="">
                                                        <th scope="col">
                                                            桌號
                                                        </th>
                                                        <th scope="col">
                                                            狀態
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        showAllTables('TYN001');
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 內容結束 -->
    </div>
    <!-- Wrapper End-->
    <!-- footer開始 -->
    <footer class="iq-footer">
    </footer> 
    <!-- footer結束 -->
    <script type="text/javascript">
      var qrcode = new QRCode(document.getElementById("qrcodeA"), {
            text: "http://192.168.0.106:8080/mahjongclub/login/login.php?seatID=<?php echo $id ?>",
            // width: 128,
            // height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        var qrcode = new QRCode(document.getElementById("qrcodeB"), {
            text: "../login/login.php?tableID=&seatID=",
            // width: 128,
            // height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
        var qrcode = new QRCode(document.getElementById("qrcodeC"), {
            text: "../login/login.php?tableID=&seatID=",
            // width: 128,
            // height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
        var qrcode = new QRCode(document.getElementById("qrcodeD"), {
            text: "../login/login.php?tableID=&seatID=",
            // width: 128,
            // height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
   </script>
    <!-- Backend Bundle JavaScript -->
    <script src="../static/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../static/js/customizer.js"></script>

    <script src="../static/js/sidebar.js"></script>

    <!-- Flextree Javascript-->
    <script src="../static/js/flex-tree.min.js"></script>
    <script src="../static/js/tree.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="../static/js/table-treeview.js"></script>

    <!-- SweetAlert JavaScript -->
    <script src="../static/js/sweetalert.js"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="../static/js/vector-map-custom.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../static/js/chart-custom.js"></script>
    <script src="../static/js/01.js"></script>
    <script src="../static/js/02.js"></script>

    <!-- slider JavaScript -->
    <script src="../static/js/slider.js"></script>

    <!-- Emoji picker -->
    <script src="../static/js/index.js" type="module"></script>


    <!-- app JavaScript -->
    <script src="../static/js/app.js"></script>
    </body>
</html>