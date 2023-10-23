<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Tên danh mục</label>
                <input type="text" name="tendm" placeholder="Nhập vào tên danh mục">
            </div>
            <div class="row mb10 center">
                <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
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