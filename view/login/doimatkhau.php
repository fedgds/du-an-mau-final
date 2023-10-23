<main class="catalog  mb ">

    <div class="boxleft">

        <div class="box_title">Đổi mật khẩu</div>
        <div class="box_content form_account">
            <form action="index.php?act=doimatkhau" method="post">
            <?php
                if (isset($thongbao) && $thongbao != ""){
                    echo $thongbao;
                }
            ?>
            <div>
                <p>User</p>
                <input type="text" name="user" placeholder="Tên đăng nhập">
            </div>
            <div>
                <p>Password</p>
                <input type="text" name="pass" placeholder="Mật khẩu">
            </div>
            <div>
                <p>Re-password</p>
                <input type="text" name="repass" placeholder="Nhập lại mật khẩu">
            </div>
            <div>
                <p>New-password</p>
                <input type="text" name="newpass" placeholder="Nhập mật khẩu mới">
            </div>
            <input type="submit" value="Đổi" name="doimk">
            <input type="reset" value="Nhập lại"><br>
            </form>
        </div>

    </div>
    <?php include "view/boxright.php" ?>


</main>