<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['dm_name' , 'number_cate'],
            <?php foreach ($chart as $key => $value ) { 
                 echo "['".$value["dm_name"]."' , ".$value["number_cate"]."],";
             } ?>
        ]);

        var options = {
            title: 'Thống kê số sản phẩm theo danh mục !',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
<div class="container" style="height: 550px ;">
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</div>
<button><a href="index.php?url=bieudo" style="color: inherit; text-decoration: none;">Biểu đồ thống kê sản phẩm theo danh mục</a></button>
<button><a href="index.php?url=bieudo3" style="color: inherit; text-decoration: none;">Biểu đồ thống kê doanh thu</a></button>
<button><a href="index.php?url=bieudo2" style="color: inherit; text-decoration: none;">Biểu đồ sản phẩm bán chạy</a></button>
<button><a href="index.php?url=thong-kee" style="color: inherit; text-decoration: none;">Biểu đồ Thống kê Số lượng và Doanh thu theo Sản phẩm</a></button>
<!-- <button><a href="index.php?url=bieudo">Biểu đồ thông kê sản phẩm</a></button> -->
<!-- <button><a href="index.php?url=thong-kee" style="color: inherit; text-decoration: none;" >Biểu đồ thông kê sản phẩm</a></button> -->
<style>
    .button-container {
        text-align: center;
        margin: 20px 0;
    }

    button {
        display: inline-block;
        margin: 0 10px;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }
</style>