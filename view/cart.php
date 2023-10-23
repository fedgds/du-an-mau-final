<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_POST['cart']) && ($_POST['cart'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = $_POST['hinh'];
  $cart = [$name, $img, $price];
  $_SESSION['cart'][] = $cart;
}
function cartShow(){
  if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
          echo '<tr>                        
                  <td>'.($i + 1).'</td>
                  <td>'.$_SESSION['cart'][$i][0].'</td>
                  <td><img src="img/'.$_SESSION['cart'][$i][1].'" style="width: 100px; height: 60px;"></td>
                  <td>'.$_SESSION['cart'][$i][2].'</td>
                  <td><a href="view/delete-cart.php?index='.$i.'">Xóa</a></td>
              </tr>';
      }
  }
}
?>
<main class="catalog  mb ">

    <div class="boxleft">

      <div class="box_cart">Giỏ hàng</div>
      <div class="cart">
        <table>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Action</th>
            </tr>
            <?php cartShow(); ?>
        </table>
      </div>

    </div>
    <?php include "view/boxright.php" ?>

  </main>