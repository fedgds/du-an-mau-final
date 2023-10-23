<main class="catalog  mb ">

    <div class="boxleft">

      <div class="box_title">Cập nhật tài khoản</div>
      <div class="box_content2 form_account">
      <?php
      if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
          extract($_SESSION['user']);
          $hinhpath = $img_path.$img;
      }
      ?>
        <form action="index.php?act=capnhattaikhoan" method="post" enctype="multipart/form-data">
          <?php
              if (isset($thongbao) && $thongbao != ""){
                echo $thongbao;
              }
          ?>
          <input type="hidden" name="id" value="<?=$id?>">
          <div>
            <input type="hidden" name="user" value="<?=$user?>">
          </div>
          <div>
            <input type="hidden" name="pass" value="<?=$newpass?>">
          </div>
          <div>
            <input type="hidden" name="vaitro" value="<?=$vaitro?>">
          </div>
          <div>
            <p>Email: </p>
            <input type="email" name="email" placeholder="Email" value="<?=$email?>">
          </div>
          <div>
            <p>Address: </p>
            <input type="text" name="address"  placeholder="Address" value="<?=$address?>">
          </div>
          <div>
            <p>Hình ảnh: </p>
            <input type="file" name="hinh" value="<?=$img?>">
            <input type="hidden" name="img" value="<?=$img?>">
            <img src="<?= $hinhpath ?>" alt="" width="100px" height="60px">
          </div>
          <div>
            <input type="submit" value="Cập nhật" name="capnhat">
            <input type="reset" value="Nhập lại">
          </div>
        </form>
      </div>

    </div>
    <?php include "view/boxright.php" ?>

  </main>
 