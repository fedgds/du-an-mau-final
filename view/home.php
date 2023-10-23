<main>
    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="./img/banner.webp" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>
        <h1>Sản phẩm tại Sang Store</h1>
        <div class="items">
            <?php foreach ($phantrang as $sp){ 
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
                <form action="index.php?act=cart" method="post">
                    <input type="hidden" name="name" value="<?= $name ?>">
                    <input type="hidden" name="price" value="<?= $price ?>">
                    <input type="hidden" name="hinh" value="<?= $img ?>">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <input type="submit" class="add" name="cart" value="ADD TO CART">
                    <?php } else { ?>
                        <p><a class="add" href="index.php">Đăng nhập</a></p>
                    <?php } ?>
                </form>
            </div>
            <?php } ?>
        </div>
        <?php include "phantrang.php" ?>
    </div>
    <?php include "boxright.php" ?>
</main>
