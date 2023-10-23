<div class="row2">
    <div class="row2 font_title">
    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listdm" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    <?php foreach($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $sualoai = "index.php?act=suadm&id=$id";
                        $xoaloai = "index.php?act=deletedm&id=$id";
                    ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$name?></td>
                            <td>
                                <a href="<?=$sualoai?>"><input type="button" value="Sửa"></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này');" href="<?=$xoaloai?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="row mb10 center">
                <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>
