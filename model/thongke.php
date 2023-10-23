<?php
function load_thongke_sanpham_danhmuc(){
    $sql = "SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price) 'gia_min', 
    MAX(price) 'gia_max', AVG(price) 'gia_avg' from danhmuc dm join sanpham sp 
    on dm.id=sp.iddm group by dm.id, dm.name order by soluong desc";
    return pdo_query($sql);
}