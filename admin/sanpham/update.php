<?php
if (is_array($sanpham)) {
    extract($sanpham);
    $hinhpath = "../img/".$img;
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10">
                <label>Danh mục</label>
                <select name="iddm" id="">
                    <?php 
                        foreach ($listdanhmuc as $key=>$value) {//sua
                            if($iddm=$value['id']){
                                echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                            } else {
                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="row2 mb10 form_content_container">
                <label> Tên sản phẩm</label>
                <input type="text" name="tensp" value="<?= $name ?>">
            </div>
            <div class="row2 mb10">
                <label>Giá sản phẩm</label>
                <input type="text" name="giasp" value="<?= $price ?>">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh</label>
                <input type="file" name="hinh">
                <img src="<?=$hinhpath?>" alt="" width="140px" height="80px">
            </div>
            <div class="row2 mb10">
                <label>Mô tả</label>
                <textarea name="mota" id="" cols="100" rows="10"><?= $mota ?></textarea>
            </div>
            <div class="row mb10 center">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input  class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
                <input  class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($messSuccess) && $messSuccess!='') {
                echo $messSuccess;
            }
            ?>
        </form>
    </div>
    </div>
</div>