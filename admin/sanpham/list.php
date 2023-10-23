<div class="row2">
    <div class="row2 font_title">
    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listsp" method="post">
                    Tìm kiếm: <input type="text" name="name" placeholder="Nhập tên sản phẩm" style="width: 350px;">
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php 
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="search" value="Tìm">
                </form>
                <table>
                    <tr>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>LƯỢT XEM</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    <?php foreach($listsanpham as $sanpham) {
                        extract($sanpham);
                        $hinh = "../".$img_path.$img;
                        $suasp = "index.php?act=suasp&idsp=$id";
                        $hard_delete = "index.php?act=hard_delete&idsp=$id";
                        $soft_delete = "index.php?act=soft_delete&idsp=$id";
                        ?>
                        <tr>
                            <td><?= $id ?></td>
                            <td><?= $name ?></td>
                            <td><?= number_format($price) ?> VND</td>
                            <td><img src="<?= $hinh ?>" alt="" width="80px" height="50px"></td>
                            <td><?= $luotxem ?></td>
                            <td>
                                <a href="<?= $suasp ?>"><input type="button" value="Sửa"></a>   
                                <a href="<?= $hard_delete ?>"><input type="button" value="Xóa cứng" onclick="return confirm('Bạn có chắc muốn xóa?')"></a>
                                <a href="<?= $soft_delete ?>"><input type="button" value="Xóa mềm"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="row mb10 center">
                <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
                <a href="index.php?act=thungrac"> <input  class="mr20" type="button" value="THÙNG RÁC"></a>
            </div>
        </form>
        <?php include "./phantrang.php"; ?>
    </div>
</div>
