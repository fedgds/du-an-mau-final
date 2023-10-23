<?php
if(isset($_SESSION['user']) && $_SESSION['user']['vaitro'] == 2){
?>
<div class="row2">
    <div class="row2 font_title">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listkh" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>ID TÀI KHOẢN</th>
                        <th>TÊN TÀI KHOẢN</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>ẢNH</th>
                        <th>VAI TRÒ</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    <?php 
                    foreach ($taikhoankh as $tk){ 
                        extract($tk);
                        $hinh = "../".$img_path.$img;
                        $phanquyen = "index.php?act=phanquyen&id=$id";
                        $goquyen = "index.php?act=goquyen&id=$id";
                        $delete = "index.php?act=deletekh&id=$id";
                    ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$user?></td>
                            <td><?=$email?></td>
                            <td><?=$address?></td>
                            <td><img src="<?=$hinh?>" alt="" width="80px" height="50px"></td>
                            <td><?=$vaitro == 1 ? 'Quản trị viên' : 'Khách hàng'?></td>
                            <td> 
                                <?php if($vaitro == 0){ ?>
                                    <a href="<?=$phanquyen?>"><input type="button" value="Phân quyền"></a>   
                                <?php }else{ ?>
                                    <a href="<?=$goquyen?>"><input type="button" value="Gỡ quyền"></a>  
                                <?php } ?>
                                <a href="<?=$delete?>"><input type="button" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="row mb10 center">
                <a href="index.php?act=addkh"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>
<?php
}else{
    header('Location: index.php');
}
?>