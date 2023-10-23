<main class="catalog  mb ">
  <?php
    extract($sp);
    $hinh = $img_path.$img;
  ?>
    <div class="boxleft">
      <div class="mb">
        <div class="box_title"><h2><?= $name ?></h2></div>
        <div class="box_content">
          <div class="img"><img src="<?= $hinh ?>"></div>
          <div class="price">Giá: <?=number_format($price)?> VND</div>
        </div>
        <div class="describe">
          <h4>Mô tả món ăn</h4>
          <p><?= $mota ?></p>
        </div>
        <div class="view">
          Lượt xem:<?= $luotxem ?>
        </div>
      </div>

      <div class="mb">
        
        <iframe src="view/binhluan/binhluan-form.php?idsp=<?= $_GET['idsp'] ?>" frameborder="0" width="100%" height="250px"></iframe>
      </div>

      <div class=" mb">
        <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
        <div class="box_content">
          <?php foreach($sp_cungloai as $sp){
            extract($sp);
            $link = "index.php?act=sanphamct&idsp=$id";
            $hinh1 = $img_path.$img;
            ?>
              <div class="loai">
                <img src="<?= $hinh1 ?>" alt="">
                <a href="<?= $link ?>"><?= $name ?></a>
              </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php include "boxright.php" ?>
</main>