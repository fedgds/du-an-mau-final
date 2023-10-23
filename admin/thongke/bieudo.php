<div class="row2">
    <div class="row2 font_title">
      <h1>Biểu đồ</h1>
    </div>
    <div class="row2 form_content ">
      <div
          id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng'],
            <?php
              foreach($dsthongke as $thongke){
                extract($thongke);
                echo "['$name', $soluong],";
              }
            ?>
          ]);
          const options = {
            title:'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
            is3D:true
          };
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
    <div class="row mb10 center">
        <a href="index.php?act=thongke" style="text-decoration: none; color: #000; border: 1px solid #000; padding: 5px; margin-top: 20px;">
            Bảng thống kê
        </a>
    </div>
</div>
