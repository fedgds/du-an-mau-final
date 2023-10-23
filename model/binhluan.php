<?php
function load_binhluan($idsp){
    $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user from binhluan
            join taikhoan on binhluan.iduser = taikhoan.id
            join sanpham on binhluan.idproduct = sanpham.id
            where sanpham.id = $idsp";
    $result = pdo_query($sql);
    return $result;
}

function insert_binhluan($idproduct, $noidung,$iduser){
    $date = date('Y-m-d');
    $sql = "INSERT INTO `binhluan`(`noidung`, `iduser`, `idproduct`, `ngaybinhluan`) VALUES ('$noidung','$iduser','$idproduct','$date');";
    pdo_execute($sql);
}

?>
