<?php
function loadall_danhmuc(){
    $sql = "SELECT * from danhmuc order by id";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id){
    $sql = "SELECT * from danhmuc where id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function danhmuc(){
    $sql = "SELECT * from danhmuc";
    $result = pdo_query($sql);
    return $result;
}

function load_ten_danhmuc($iddm){
    $sql = "SELECT * from danhmuc where id ='$iddm'";
    $dm = pdo_query_one($sql);
    extract($dm);
    return $name;
}
function add_danhmuc($name){
    $sql = "INSERT INTO danhmuc (name) VALUES ('$name')";
    pdo_execute($sql);
}
function update_danhmuc($id,$name){
    $sql = "UPDATE danhmuc set name = '$name' where id = '$id'";
    pdo_execute($sql);
}

function delete_danhmuc($id){
    $sql = "DELETE from danhmuc where id = $id";
    pdo_execute($sql);
}
