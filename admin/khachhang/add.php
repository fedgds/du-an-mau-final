<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Tên tài khoản</label>
                <input type="text" name="name" placeholder="Nhập vào tên">
                <div class="loi"><?php echo (isset($valUser)) ? $valUser : ''; ?></div>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Mật khẩu</label>
                <input type="text" name="pass" placeholder="Nhập vào mật khẩu">
                <div class="loi"><?php echo (isset($valPass)) ? $valPass : ''; ?></div>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Email</label>
                <input type="text"f name="email" placeholder="Nhập vào email">
                <div class="loi"><?php echo (isset($valEmail)) ? $valEmail : ''; ?></div>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Địa chỉ</label>
                <input type="text" name="address" placeholder="Nhập vào địa chỉ">
                <div class="loi"><?php echo (isset($valAddress)) ? $valAddress : ''; ?></div>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Hình</label>
                <input type="file" name="hinh">
                <div class="loi"><?php echo (isset($valImg)) ? $valImg : ''; ?></div>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Vai trò</label>
                <select name="vaitro" id="">
                    <option value="0">Khách hàng</option>
                    <option value="1">Quản trị viên</option>
                </select>
            </div>
            <div class="row mb10 center">
                <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
                <input  class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listkh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && $thongbao!='') {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
    </div>
</div>