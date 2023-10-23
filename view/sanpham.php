<main>
    <div class="boxleft">
    <div style="text-align: center; padding: 10px; font-size: 26px; margin-bottom: 20px;"><?=$tenloai?></div>
        <div class="items">
            <?php foreach ($dssp as $sp){ 
                extract($sp);
                $hinh = $img_path.$img;
                $link = "index.php?act=sanphamct&idsp=$id";
                $cart = "index.php?act=cart&idsp=$id";
                ?>
            <div class="box_items">
                <div class="box_items_img">
                    <a href="<?= $link ?>"><img src="<?= $hinh ?>" alt=""></a>
                </div>
                <div class="sub">
                    <a class="item_name" href="<?= $link ?>"><?= $name ?></a>
                    <p class="price"><?= number_format($price)?> VND</p>
                </div>
                <div class="add"><a href="<?=$cart?>">ADD TO CART</a></div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php include "boxright.php" ?>
</main>
