<?php
  session_start();
  include "../../model/pdo.php";
  include '../../model/binhluan.php';
    

    $idsp = isset($_GET['idsp']) ? $_GET['idsp'] : null;
    if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
        $iduser = $_POST['iduser'];
        $name = $_POST['user'];
        $idsp = $_POST['idsp'];
        $noidung = $_POST['noidung'];
        insert_binhluan($idsp, $noidung,$iduser);
    }
    $dsbl = load_binhluan($idsp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .binhluan table{
            width: 100%; 
        }

        .binhluan table tr{
            display: grid;
            width: 100%;
            grid-template-columns: 1fr 7fr 1fr;
            margin-bottom: 5px;
            border-bottom: 1px solid #666;
        }
        .box_title{
            background:#EEEE;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="row mb">   
    <?php if(isset($_SESSION['user'])){ ?>
        <div class="form">
            <form action="binhluan-form.php" method="post">
                <input type="hidden" name="iduser" value="<?=$_SESSION['user']['id']?>">
                <input type="hidden" name="user" value="<?=$_SESSION['user']['user']?>">
                <input type="hidden" name="idsp" value="<?= $idsp ?>">
                <input type="text" name="noidung" value="">
                <input type="submit" name="guibinhluan" value="GỬI BÌNH LUẬN">
            </form>
        </div> 
    <?php
    } else{
        echo '<p style="color: red;">Đăng nhập để thực hiện chức năng bình luận</p>';
    }
    ?>
        <div class="box_title">BÌNH LUẬN</div>
        <div class="binhluan">
            <table>
                <?php
                    foreach ($dsbl as $bl) {
                        extract($bl);
                        echo '<tr><td>'.$user.'</td>';
                        echo '<td>'.":".$noidung.'</td>';
                        echo '<td>'.date("d/m/Y", strtotime($ngaybinhluan)).'</td></tr>';
                    }
                ?>  
            </table>
        </div>
    </div>
</body>
</html>