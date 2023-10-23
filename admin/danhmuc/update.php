<?php
if (is_array($danhmuc)) {
    extract($danhmuc);
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT DANH MỤC</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Mã danh mục</label>
                <input type="text" name="id" value="<?= $id ?>" disabled>
            </div>
            <div class="row2 mb10 form_content_container">
                <label> Tên danh mục</label>
                <input type="text" name="tendm" value="<?= $name ?>" required>
            </div>
            <div class="row mb10 center">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input  class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
                <input  class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
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