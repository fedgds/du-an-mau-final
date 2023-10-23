<!-- START FOOTER -->
        <footer>
            <div class="box">
                <div class="logo">
                    <img src="img/Sang Food.png" alt="">
                </div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>NỘI DUNG</h3>
                <ul class="quick-menu">
                    <div class="item">
                        <a href="">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="">Giới thiệu</a>
                    </div>
                    <div class="item">
                        <a href="">Liên hệ</a>
                    </div>
                    <div class="item">
                        <a href="">Góp ý</a>
                    </div>
                </ul>
            </div>
            <div class="box">
                <h3>Liên hệ</h3>
                <form action="">
                    <input type="text" placeholder="Địa chỉ email" required>
                    <button>Nhận tin</button>
                </form>
            </div>
        </footer>
        <!-- END FOOTER -->
    </div>
    <script>
        var images = [];
        var imageNames = ["banner.webp", "banhtrangtron.jpg", "bundaunhavua.jpg", "boxaolalot.jpg"];

        for (var i = 0; i < 4; i++) {
        images[i] = new Image();
        images[i].src = 'img/' + imageNames[i];
        }

        var index = 0;

        function prev() {
        index--;
        if (index < 0) {
            index = 3;
        }

        let banner = document.getElementById('banner');
        banner.src = images[index].src;
        }

        function next() {
        index++;
        if (index >= 4)
            index = 0;

        let banner = document.getElementById('banner');
        banner.src = images[index].src;
        }
        setInterval(next, 5000);
        
    </script>
</body>
</html>