<?php
   session_start();
   include_once "../inc/helpers.php";
   
   $result = disconnectSeat($_GET['disconnectID']);
   if($result == "此桌號尚未啟用！" || $result == "此座位不存在！"){
      echo "<script>alert('{$result}')</script>";
      $url = "../notMember/home.blade.php";
      $time = 0;
      header("refresh:{$time};url={$url}");
   }else{
      echo "<script>alert('$result')</script>";
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

<!-- loader Start -->
    <!-- loader END -->

      <div class="wrapper">
         <section class="login-content">
            <div class="container h-100">
               <div class="row align-items-center justify-content-center h-100">
                  <div class="col-md-5">
                     <div class="card">
                        <div class="card-body">
                           <div class="auth-logo">
                              <!-- <img src="static/picture/logo.png" class="img-fluid rounded-normal" alt="logo"> -->
                           </div>
                           <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill"
                                    href="#pills-home-fill" role="tab" aria-controls="pills-home"
                                    aria-selected="true"></a>
                              </li>
                           </ul>
                           <div class="tab-content" id="pills-tabContent-1">
                              <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel"
                                 aria-labelledby="pills-home-tab-fill">
                                 <h2 class="mb-2 text-center">登出成功</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   <!-- footer開始 -->
   <footer class="iq-footer">
   </footer> 
   <!-- footer結束 -->

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