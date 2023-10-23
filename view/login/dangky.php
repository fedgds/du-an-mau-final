<main class="catalog  mb ">

    <div class="boxleft">

      <div class="box_title">Đăng ký thành viên</div>
      <div class="box_content form_account">
        <form action="index.php?act=dangky" method="post" enctype="multipart/form-data">
          <?php
              if (isset($thongbao) && $thongbao != ""){
                echo $thongbao;
              }
          ?>
          <div>
            <p>Email: </p>
            <input type="email" name="email" placeholder="Email">
            <div class="loi"><?php echo (isset($valEmail)) ? $valEmail : ''; ?></div>
          </div>
          <div>
            <p>Tên đăng nhập: </p>
            <input type="text" name="user"  placeholder="Tên đăng nhập">
            <div class="loi"><?php echo (isset($valUser)) ? $valUser : ''; ?></div>
          </div>
          <div>
            <p>Mật khẩu: </p>
            <input type="password" name="pass"  placeholder="Mật khẩu">
            <div class="loi"><?php echo (isset($valPass)) ? $valPass : ''; ?></div>
          </div>
          <div>
            <p>Nhập lại mật khẩu: </p>
            <input type="password" name="repass"  placeholder="Nhập lại mật khẩu">
            <div class="loi"><?php echo (isset($valRepass)) ? $valRepass : ''; ?></div>
          </div>
          <div>
            <p>Address: </p>
            <input type="text" name="address"  placeholder="Địa chỉ">
            <div class="loi"><?php echo (isset($valAddress)) ? $valAddress : ''; ?></div>
          </div>
          <div>
            <p>Hình ảnh: </p>
            <input type="file" name="hinh">
            <div class="loi"><?php echo (isset($valImg)) ? $valImg : ''; ?></div>
          </div>
          <input type="submit" value="Đăng ký" name="dangky">
          <input type="reset" value="Nhập lại">
        </form>
      </div>

    </div>
    <?php include "view/boxright.php" ?>

  </main>