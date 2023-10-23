
<div class="row2">
    <div class="row2 font_title">
    <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listbl" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>NGƯỜI BÌNH LUẬN</th>
                        <th>NỘI DUNG</th>
                        <th>SẢN PHẨM</th>
                        <th>NGÀY BÌNH LUẬN</th>
                    </tr>
                    <?php foreach($binhluan as $row) {
                        extract($row);
                        $delete = "index.php?act=deletebl&id=$id";
                    ?>
                        <tr>
                            <td><?=$user?></td>
                            <td><?=$noidung?></td>
                            <td><?=$name?></td>
                            <td><?= date("d/m/Y", strtotime($ngaybinhluan)) ?></td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này');" href="<?=$delete?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </form>
    </div>
</div>


