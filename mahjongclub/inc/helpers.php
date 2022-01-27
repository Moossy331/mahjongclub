<?php
    define('DBhost','localhost');
    define('DBuser','root');
    define('DBpassword','900331');
    define('DBname','mahjongClub');
    define('DBport',3306);


    
    function connect($host=DBhost,$user=DBuser,$password=DBpassword,$database=DBname,$port=DBport){
        $link = mysqli_connect($host,$user,$password,$database,$port);
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        mysqli_set_charset($link,'utf8');
        return $link;
    }

// 登入端
    // 登入驗證用戶
    function login($userID, $userPWD){
        $link = connect();
        $sql = mysqli_query($link, "call sp_login('$userID', '$userPWD');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 管理端
    // 新增棋牌社
    function addClub($clubID, $clubName, $clubType, $alliance, $address, $tables, $manager, $phone, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newClub('$clubID', '$clubName', '$clubType', '$alliance', '$address', $tables, '$manager', '$phone', '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 渲染所有棋牌社
    // TODO：需要procedure

// 櫃檯
    // 開台
    function newGame($tableID, $tableMobile, $score, $fee, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newGame('$tableID', '$tableMobile', $score, $fee, '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 開台渲染可用桌子
    // TODO：顯示的桌號要更改
    function newGameShowTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', 'a');");
        while($data = mysqli_fetch_assoc($sql)){
            echo "<option value='{$data['tableID']}'>{$data['tableID']}</option>";
        }
    }

    // 可用桌數
    function showTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', 'a');");
        $count = mysqli_num_rows($sql);

        return $count;
    }

    // 渲染所有桌子
    function showAllTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', '');");
        while($data = mysqli_fetch_assoc($sql)){
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left'>{$data['tableID']}</td>";
                if($data['name'] == '使用中'){
                    echo "<td class='text-center text-danger'>{$data['name']}</td>";
                }else{
                    echo "<td class='text-center text-success'>{$data['name']}</td>";
                }
                echo "<td><div class='d-flex justify-content-end align-items-center'><a class='' data-placement='top' title='' data-original-title='View' href='#?tableID={$data['tableID']}'>&nbsp&nbsp&nbsp關台&nbsp&nbsp</a><a class='' data-placement='top' title='' data-original-title='View' href='../counter/tableQRCode.php?tableID={$data['tableID']}'>&nbsp&nbsp&nbsp生成座位QRCode&nbsp&nbsp</a></div></td>";
                echo "</tr>";
        }
    }

    // 渲染座位QRCode
    function showTablesQRCode($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select * from tb_seat where tableID = '$tableID';");
        while($data = mysqli_fetch_assoc($sql)){
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left'>{$data['seatID']}</td>";
                echo "<td><div class='d-flex justify-content-end align-items-center'><a class='' data-placement='top' title='' data-original-title='View' href='../counter/seatQRCode.php?seatID={$data['seatID']}&tableID={$data['tableID']}' target='_blank'>&nbsp&nbsp&nbsp生成座位QRCode&nbsp&nbsp</a></div></td>";
                echo "</tr>";
        }
    }

    // 儲值
    // TODO：應該多一個櫃檯或是club的密碼，或是在能夠判斷該櫃檯賬號屬於哪個clubID下
    function deposit($userMobile, $clubID, $coin, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_deposit('$userMobile', '$clubID', $coin, '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 一般用戶
    // 掃碼綁定座位
    function signupSeat($seatID, $tableCode, $password){
        $link = connect();
        $sql = mysqli_query($link, "call sp_signupSeat('$seatID', '$tableCode', '$password');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 會員端
    // 掃碼綁定座位
    function signupSeatU($seatID, $tableCode, $userMobile, $password){
        $link = connect();
        $sql = mysqli_query($link, "call sp_signupSeatU('$seatID', '$tableCode', '$userMobile', '$password');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 修改資料
    function updateUser($userMobile, $name, $IDNumber, $email, $manage, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_updateUser('$userMobile', '$name', '$IDNumber', '$email', 1, '$manage', ' ', '$note');");
        $data = mysqli_fetch_row($sql);
        
        return $data[0];
    }

    // 修改密碼
    function resetPassword($userMobile, $password){
        $link = connect();
        $sql = mysqli_query($link, "call sp_resetPassword('$userMobile', '$password', '');");
        $data = mysqli_fetch_row($sql);
        
        return $data[0];
    }

    // 驗證是否為桌長
    // TODO：需要等級驗證
    function tablerMobile(){

    }

// 用戶註冊
    // 註冊
    function newUser($userMobile, $password, $name, $IDNumber, $email, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newUser('$userMobile', '$password', '$name', '$IDNumber', '$email', 1, '', '', '$note');");
        $data = mysqli_fetch_row($sql);
        
        return $data[0];
    }


// 遊戲部分
    // 確認座位綁定
    function readyGame($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_readyGame('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 每輪遊戲分數結算
    function scoring($winSeatID, $loseSeatID, $point){
        $link = connect();
        $sql = mysqli_query($link, "call sp_scoring('$winSeatID', '$loseSeatID', $point);");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 顯示遊戲歷程
    function showGameLog($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showGamelog('$tableID');");
        $data = mysqli_fetch_row($sql);
        while($data = mysqli_fetch_row($sql)){
            if($data[0] == '此桌號尚未啟用'){
                return $data[0];
            }else{

            }
        }

    }

    // 顯示遊戲目前分數
    function showScore($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showScore('$tableID');");
        while($data = mysqli_fetch_row($sql)){
            if($data[0] == '此桌號尚未啟用！'){
                return $data[0];
            }else{
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left font-weight-bold'>{$data[1]}</td>";
                echo "<td>{$data[2]}</td>";
                echo "<td>{$data[3]}</td>";
                echo "<td>{$data[4]}</td>";
                echo "</tr>";
            }
        }
    }

    // 關閉遊戲
    function closeGame($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_closeGame('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 通用
    function showSeat($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select * from tb_seat where tableID = '$tableID';");
        while($data = mysqli_fetch_assoc($sql)){
            echo "<option value='{$data['seatID']}'>{$data['seatID']}</option>";
        }
    }


    // 渲染座位選擇贏家
    function showSeatID($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select seatID from tb_seat where tableID = '$tableID';");
        $arr = array('東','南','西','北');
        while($data = mysqli_fetch_assoc($sql)){
            if(substr($data['seatID'],-1) == 'A'){
                echo "<option value='{$data['seatID']}'>東</option>";
            }elseif(substr($data['seatID'],-1) == 'B'){
                echo "<option value='{$data['seatID']}'>南</option>";
            }elseif(substr($data['seatID'],-1) == 'C'){
                echo "<option value='{$data['seatID']}'>西</option>";
            }else{
                echo "<option value='{$data['seatID']}'>北</option>";
            }
        }
    }

    // 號碼查詢座位
    function showSeatIDUserMobile($userMobile){
        $link = connect();
        mysqli_query($link, "set @seatID = '';");
        mysqli_query($link, "call sp_showSeatIDUserMobile('$userMobile', @seatID);");
        $sql = mysqli_query($link, "select @seatID;");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 座位查詢號碼
    function showUserMobileSeatID($seatID){
        $link = connect();
        mysqli_query($link, "set @userMobile = '';");
        mysqli_query($link, "call sp_showUserMobileSeatID('$seatID', @userMobile);");
        $sql = mysqli_query($link, "select @userMobile;");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }
?>

