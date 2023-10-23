<?php
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']['vaitro'] != 0){
?>
<?php
include "../global.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
if($_SESSION['user']['vaitro'] == 2){
  include "header.php";
} else{
  include "header1.php";
}
if (isset($_GET['act']) && ($_GET['act']) != ""){
  $act = $_GET['act'];
  switch ($act) {
    case 'listsp' :
      if (isset($_POST['search']) && $_POST['search']) {
        $name = $_POST['name'];
        $iddm = $_POST['iddm'];
      } else {
        $name = "";
        $iddm = 0;
      }
      $listdanhmuc = loadall_danhmuc();
      $listsanpham = loadall_sanpham($name, $iddm);
      include "sanpham/list.php";
      break;
    case 'addsp' :
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $iddm = $_POST['iddm'];
        $tensp = $_POST['tensp'];
        $giasp = $_POST['giasp'];
        $mota = $_POST['mota'];
        $hinh = $_FILES['hinh']['name'];
        $target_direct = "../img/";
        $target_file = $target_direct.basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
        insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
        $messSuccess = "Thêm thành công!";
      } 
      $listdanhmuc = loadall_danhmuc();
      include "sanpham/add.php";
      break;
    case "suasp" :
      if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
        $sanpham = loadone_sanpham($_GET['idsp']);
      }
      $listdanhmuc = loadall_danhmuc();
      include "sanpham/update.php";
      break;
    case "updatesp" :
      if(isset($_POST['capnhat']) && $_POST['capnhat']) {
        $iddm = $_POST['iddm'];
        $id = $_POST['id'];
        $tensp = $_POST['tensp'];
        $giasp = $_POST['giasp'];
        $mota = $_POST['mota'];
        $hinh = $_FILES['hinh']['name'];
        $target_direct = "../img/";
        $target_file = $target_direct.basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
        update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
        $messSuccess = "Cập nhật thành công!";
      }
      $listdanhmuc = loadall_danhmuc();
      $listsanpham = loadall_sanpham("",0);
      include "sanpham/list.php";
      break;
    case "hard_delete" :
      if(isset($_GET['idsp']) && $_GET['idsp'] > 0) {
        hard_delete($_GET['idsp']);
      }
      $listsanpham = loadall_sanpham("",0);
      include "sanpham/list.php";
      break;
    case "soft_delete" :
      if(isset($_GET['idsp']) && $_GET['idsp'] > 0) {
        soft_delete($_GET['idsp']);
      }
      $listsanpham = loadall_sanpham("",0);
      include "sanpham/list.php";
      break;
    case "thungrac" :
      if (isset($_POST['search']) && $_POST['search']) {
        $name = $_POST['name'];
        $iddm = $_POST['iddm'];
      } else {
        $name = "";
        $iddm = 0;
      }
      $listdanhmuc = loadall_danhmuc();
      $listsanpham = thung_rac($name, $iddm);
      include "sanpham/trash.php";
      break;
    case "khoiphuc" :
      if(isset($_GET['idsp']) && $_GET['idsp'] > 0) {
        khoi_phuc($_GET['idsp']);
      }
      $listsanpham = thung_rac("",0);
      include "sanpham/trash.php";
      break;
    case "listdm" :
      $listdanhmuc = loadall_danhmuc();
      include "danhmuc/list.php";
      break;
    case "adddm" :
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $name = $_POST['tendm'];
        add_danhmuc($name);
        $messSuccess = "Thêm thành công!";
      }
      include "danhmuc/add.php";
      break;
    case "suadm" :
      if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        $danhmuc = loadone_danhmuc($id); 
      }
      include "danhmuc/update.php";
      break;
    case "updatedm" :
      if(isset($_POST['capnhat']) && $_POST['capnhat']) {
        $id = $_POST['id'];
        $name = $_POST['tendm'];
        update_danhmuc($id,$name);
        $danhmuc = loadone_danhmuc($id); 
        $messSuccess = "Cập nhật thành công!";
      }
      $listdm = danhmuc();
      include "danhmuc/update.php";
      break;
    case "deletedm" :
      if(isset($_GET['id']) && $_GET['id'] > 0) {
        delete_danhmuc($_GET['id']);
      }
      $listdanhmuc = loadall_danhmuc();
      include "danhmuc/list.php";
      break;
    case "listkh" :
      $taikhoankh = list_taikhoan_kh();
      include "khachhang/list.php";
      break;
    case "addkh" :
      if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
        $email = $_POST['email'];
        $user = $_POST['name'];
        $pass = $_POST['pass'];
        $address = $_POST['address'];
        $vaitro = $_POST['vaitro'];
        $hinh = $_FILES['hinh']['name'];
        $target_direct = "../img/";
        $target_file = $target_direct . basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
    
        if ($email && $user && $pass && $hinh) {
          add_taikhoan($email, $user, $pass, $address, $hinh, $vaitro);
          $thongbao = "Thêm mới thành công";
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
            if (empty($address)) {
                $valAddress = 'Bạn chưa nhập địa chỉ';
            }
            if (empty($hinh)) {
                $valImg = 'Bạn chưa chọn hình ảnh';
            }
        }
      }            
      include "khachhang/add.php";
      break;
    case "phanquyen":
      if (isset($_GET['id'])) {
          $id = $_GET['id'];
          phanquyen($id);
      }
      $taikhoankh = list_taikhoan_kh();
      include "khachhang/list.php";
      break;

    case "goquyen":
      if (isset($_GET['id'])) {
          $id = $_GET['id'];
          goquyen($id);
      }
      $taikhoankh = list_taikhoan_kh();
      include "khachhang/list.php";
      break;
    case "deletekh" :
      if(isset($_GET['id']) && $_GET['id'] > 0) {
        delete_taikhoan($_GET['id']);
      }
      $taikhoankh = list_taikhoan_kh();
      include "khachhang/list.php";
      break;
    case "listbl" :
      $binhluan = loadAll_binhluan();
      include "binhluan/list.php";
      break;
    case "deletebl" :
      if(isset($_GET['id']) && $_GET['id'] > 0) {
        delete_binhluan($_GET['id']);
      }
      $binhluan = loadAll_binhluan();
      include "binhluan/list.php";
      break;
    case "thongke" :
      $dsthongke = load_thongke_sanpham_danhmuc();
      include "thongke/list.php";
      break;
    case "bieudo" :
      $dsthongke = load_thongke_sanpham_danhmuc();
      include "thongke/bieudo.php";
      break;
      
  }
} else {
  include "home.php";
}
include "footer.php";
?>

<?php 
} else{
  header("Location: ../index.php");
}
?>
<?php
function loadAll_binhluan(){
  $sql = "SELECT binhluan.id, binhluan.noidung, binhluan.ngaybinhluan, sanpham.name, taikhoan.user from binhluan
          join taikhoan on binhluan.iduser = taikhoan.id
          join sanpham on binhluan.idproduct = sanpham.id order by ngaybinhluan desc";
  $result = pdo_query($sql);
  return $result;
}
function delete_binhluan($id){
  $sql = "DELETE from binhluan where id = $id";
  pdo_execute($sql);
}
?>