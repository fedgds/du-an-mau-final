<div class="boxright">
    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <div class="box_content form_account">
        <?php
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
                $hinh = $img_path . $img;
                $update = "index.php?act=capnhattaikhoan";
                $admin = "admin/index.php";
                $dangxuat = "index.php?act=dangxuat";
            ?>
            <div class="avata">
                <img src="<?=$hinh?>" alt="">
            </div>
            
            <div class="nhap">
                <p><?=$user?></p>
                <li><a href="<?=$update?>">Cập nhật tài khoản</a></li>
                    <?php if ($vaitro != 0) { ?>
                        <li><a href="<?=$admin?>">Quản trị website</a></li>
                    <?php } ?>
                <li><a href="<?=$dangxuat?>">Đăng xuất</a></li>
            </div>
            <?php
            } else {
            ?>
            <form action="index.php?act=dangnhap" method="POST">
                <h4>Tên đăng nhập</h4><br>
                <input type="text" name="user" id="">
                <h4>Mật khẩu</h4><br>
                <input type="password" name="pass" id=""><br>
                <input class="signin" type="submit" value="Đăng nhập" name="dangnhap"><br>
                <?php if (isset($loginMess) && $loginMess != '') {
                    echo $loginMess;
                } ?>
            </form>
            <li class="form_li"><a href="index.php?act=quenmatkhau">Quên mật khẩu ?</a></li>
            <li class="form_li"><a href="index.php?act=doimatkhau">Đổi mật khẩu ?</a></li>
            <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
            <?php } ?>
        </div>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul >
                <?php foreach ($dsdm as $dm){ 
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=$id";
                    ?>
                    <li>
                        <a href="<?= $linkdm ?>"><?= $name ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <form action="index.php?act=sanpham" class="search" method="post">
            <div class="search-container">
                <input type="search" name="keyw" placeholder="Tìm kiếm món ăn...">
                <button type="submit" class="search-button" name="timkiem">
                    Tìm
                </button>
            </div>
        </form>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">TOP 10 YÊU THÍCH</div>
        <div class="box_content">
            <?php foreach ($sptop as $sp){
                extract($sp);
                $hinh = $img_path.$img;
                $linksp = "index.php?act=sanphamct&idsp=$id";
                ?>
            <div class="selling_products" style="width:100%;">
                <a href="<?= $linksp ?>"><img src="<?= $hinh ?>" alt=""></a>
                <a href="<?= $linksp ?>"><?= $name ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>