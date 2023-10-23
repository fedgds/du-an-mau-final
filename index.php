<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "view/header.php";
include "global.php";
$phantrang = loadall_sanpham();
$sptop = loadall_sanpham_top();
$dsdm = loadall_danhmuc();
if (isset($_GET['act']) && ($_GET['act'] != '')){
    $act = $_GET['act'];
    switch ($act) {
        case "sanpham" :
            if (isset($_POST['keyw']) && ($_POST['keyw'] != "")) { //kiểm tra trường nhập có dữ liệu đc khách hàng nhập tìm kiếm hay ko
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($keyw, $iddm);
            $tenloai = load_ten_loai($iddm); // lấy dữ liệu tên loại trong database lên 
            include "view/sanpham.php";
            break;
        case "sanphamct" :
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sp = loadone_sanpham($_GET['idsp']);
                $sp_cungloai = loadsp_cungloai($_GET['idsp'], $sp['iddm']);
                $binhluan = load_binhluan($_GET['idsp']);
                tang_luot_xem($_GET['idsp']);
                include "view/chitietsanpham.php";
            }
            break;
        case "dangky" :
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                $address = $_POST['address'];
                $hinh = $_FILES['hinh']['name'];
                $target_direct = "img/";
                $target_file = $target_direct . basename($hinh);
                move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
            
                if ($email && $user && $pass && $repass && $hinh) {
                    if ($pass == $repass) {
                        insert_taikhoan($email, $user, $pass, $address, $hinh);
                        $thongbao = "Đăng ký thành công. Mời bạn đăng nhập để thực hiện các chức năng bình luận và đặt hàng";
                    } else {
                        $thongbao = 'Mật khẩu không trùng khớp';
                    }
                } else {
                    if (empty($email)) {
                        $valEmail = 'Bạn chưa nhập email khách hàng';
                    }
                    if (empty($user)) {
                        $valUser = 'Bạn chưa nhập tên đăng nhập';
                    }
                    if (empty($pass)) {
                        $valPass = 'Bạn chưa nhập mật khẩu';
                    }
                    if (empty($repass)) {
                        $valRepass = 'Bạn chưa nhập lại mật khẩu';
                    }
                    if (empty($address)) {
                        $valAddress = 'Bạn chưa nhập địa chỉ';
                    }
                    if (empty($hinh)) {
                        $valImg = 'Bạn chưa chọn hình ảnh';
                    }
                }
            }
            include "view/login/dangky.php";
            break;                       
        case "dangnhap" :
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                if ($user == '') {
                    $loginMess = "Bạn chưa nhập tên đăng nhập!";
                }
                if ($pass == '') {
                    $loginMess = "Bạn chưa nhập mật khẩu!";
                }
                if ($user && $pass != '') {
                    $dangnhap = dangnhap($user,$pass);
                    if(is_array($dangnhap)) {
                        $_SESSION['user'] = $dangnhap;
                    } else {
                        $loginMess = "Sai tài khoản hoặc mật khẩu!";
                    }
                }
            }
            include "view/home.php";
            break;
        case "dangxuat" :
            dangxuat();
            include "view/home.php";
            break;
        case "quenmatkhau" :
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $sendMailMess = sendMail($email);
            }
            include "view/login/quenmatkhau.php";
            break;
        case "doimatkhau" :
            if (isset($_POST['doimk'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                $newpass = $_POST['newpass'];
                if ($user && $pass && $repass && $newpass) {
                    if ($pass == $repass) {
                        doimatkhau($user,$pass,$newpass);
                        $thongbao = "Đổi mật khẩu thành công.";
                    } else {
                        $thongbao = "Mật khẩu nhập lại không trùng khớp.";
                    }
                } else {
                    $thongbao = "Vui lòng nhập đầy đủ các trường";
                }
            }
            include "view/login/doimatkhau.php";
            break;
        case "capnhattaikhoan" :
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $vaitro = $_POST['vaitro'];
                $img = $_POST['img'];
                $hinh = $_FILES['hinh']['name'];
                $target_direct = "img/";
                $target_file = $target_direct.basename($hinh);
                move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
                update_taikhoan($id,$email,$address,$hinh,$vaitro);
                
                $_SESSION['user'] = dangnhap($user,$pass);
                $_SESSION['user']['id'] = $id;
                $_SESSION['user']['user'] = $user;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['address'] = $address;
                if($_FILES['hinh']['name'] == ''){
                    $_SESSION['user']['img'] = $img;
                } else{
                    $_SESSION['user']['img'] = $hinh;
                }
                $_SESSION['user']['vaitro'] = $vaitro;
                header('Location: index.php?act=capnhattaikhoan');
                $thongbao = "Cập nhật thành công!";
            }
            include "view/login/capnhattk.php";
            break;
        case "gioithieu" :
            include "view/gioithieu.php";
            break;
        case "lienhe" :
            include "view/lienhe.php";
            break;
        case "cart" :
            include "view/cart.php";
            break;
    }
} else{
    include "view/home.php";
}
include "view/footer.php";
?>