<?php
function loadall_sanpham($keyw="",$iddm=0){
    if(isset($_GET['pages'])) {
        $pages = $_GET['pages'];
    }else{
        $pages = 1;
    }
    $row = 9;//Số sản phẩm trên 1 trang
    $from = ($pages - 1) * $row;//Vị trí bắt đầu lấy ra các bản ghi(vì bản ghi bắt đầu từ 0 nên)
    $sql="SELECT * from sanpham where `status` = 0";
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc limit $from,$row";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
//Hiển thị 9 sản phẩm mới nhất
function loadall_sanpham_new(){
    $sql = "SELECT * from sanpham order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//Hiển thị top 10 sản phẩm có lượt xem cao nhất
function loadall_sanpham_top(){
    $sql = "SELECT * from sanpham order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "SELECT * from sanpham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_ten_loai($id)
{
    if ($id > 0) {
        $sql = "SELECT * from danhmuc where id=" . $id;
        $loai = pdo_query_one($sql);
        extract($loai);
        return $name;
    } else {
        return "";
    }
}

function loadsp_cungloai($id, $iddm){
    $sql = "SELECT * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
function tang_luot_xem($id){
    $sql = "UPDATE sanpham set luotxem = luotxem + 1 where id = $id";
    pdo_execute($sql);
}
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm){
    $sql = "INSERT into sanpham (name, price, img, mota, iddm) values ('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";
    pdo_execute($sql);
}
function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh){
    if($hinh != ""){
        $sql = "UPDATE sanpham set name = '$tensp', price = '$giasp', mota = '$mota', img = '$hinh', iddm = '$iddm' where id = '$id'";
    } else {
        $sql = "UPDATE sanpham set name = '$tensp', price = '$giasp', mota = '$mota', iddm = '$iddm' where id = '$id'";
    }
    pdo_execute($sql);
}
function hard_delete($id){
    $sql = "DELETE from sanpham where id = $id";
    pdo_execute($sql);
}

function soft_delete($id){
    $sql = "UPDATE sanpham set `status` = 1 where id = $id";
    pdo_execute($sql);
}
function thung_rac($keyw="",$iddm=0){
    $sql="SELECT * from sanpham where `status` = 1";
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function khoi_phuc($id){
    $sql = "UPDATE sanpham set `status` = 0 where id = $id";
    pdo_execute($sql);
}
