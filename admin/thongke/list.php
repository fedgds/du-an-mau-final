<div class="row2">
    <div class="row2 font_title">
    <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>TÊN LOẠI</th>
                        <th>MÃ LOẠI</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ NHỎ</th>
                        <th>GIÁ LỚN</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php foreach($dsthongke as $thongke) {
                        extract($thongke);
                        
                        ?>
                        <tr>
                            <td><?= $name ?></td>
                            <td><?= $id ?></td>
                            <td><?= $soluong ?></td>
                            <td><?= number_format($gia_min) ?> VND</td>
                            <td><?= number_format($gia_max) ?> VND</td>
                            <td><?= number_format($gia_avg) ?> VND</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="row mb10 center">
                <a href="index.php?act=bieudo" style="text-decoration: none; color: #000; border: 1px solid #000; padding: 5px; margin-top: 20px;">
                    Biểu đồ thống kê
                </a>
            </div>
        </form>
    </div>
</div>
