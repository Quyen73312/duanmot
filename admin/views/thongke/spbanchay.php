<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Sản phẩm bán chạy nhất</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        } */

        h3 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .chart-container {
            max-width: 60%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        canvas {
            border-radius: 10px;
        }
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
</head>
<body>

<h3>Biểu đồ Sản phẩm bán chạy nhất</h3>
<div class="chart-container">
    <canvas id="myChart" width="800" height="400"></canvas>
</div>
<button><a href="index.php?url=bieudo" style="color: inherit; text-decoration: none;">Biểu đồ thống kê sản phẩm theo danh mục</a></button>
<button><a href="index.php?url=bieudo3" style="color: inherit; text-decoration: none;">Biểu đồ thống kê doanh thu</a></button>
<button><a href="index.php?url=bieudo2" style="color: inherit; text-decoration: none;">Biểu đồ sản phẩm bán chạy</a></button>
<button><a href="index.php?url=thong-kee" style="color: inherit; text-decoration: none;">Biểu đồ Thống kê Số lượng và Doanh thu theo Sản phẩm</a></button>
<script>
    var data = <?php echo json_encode($sanphambanchay); ?>;
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(sanpham => sanpham.product_name),
            datasets: [
                {
                    label: 'Số lượng bán',
                    data: data.map(sanpham => sanpham.total_sold),
                    backgroundColor: 'rgba(75, 192, 192, 0.8)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Số lượng bán',
                        font: {
                            size: 16
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Sản phẩm',
                        font: {
                            size: 16
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

</body>
</html>
