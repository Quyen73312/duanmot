<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Tổng doanh thu theo tháng của năm 2023</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            /* margin: 0;
            padding: 0;
            display: flex; */
            flex-direction: column;
            align-items: center;
        }

        h3 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .chart-container {
            max-width: 60%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .button-container {
            justify-content: center;
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

<h3>Biểu đồ Tổng doanh thu theo tháng của năm 2023</h3>
<div class="chart-container">
    <canvas id="barChart" width="800" height="400"></canvas>
</div>
<button><a href="index.php?url=bieudo" style="color: inherit; text-decoration: none;">Biểu đồ thống kê sản phẩm theo danh mục</a></button>
<button><a href="index.php?url=bieudo3" style="color: inherit; text-decoration: none;">Biểu đồ thống kê doanh thu</a></button>
<button><a href="index.php?url=bieudo2" style="color: inherit; text-decoration: none;">Biểu đồ sản phẩm bán chạy</a></button>
<button><a href="index.php?url=thong-kee" style="color: inherit; text-decoration: none;">Biểu đồ Thống kê Số lượng và Doanh thu theo Sản phẩm</a></button>

<script>
    var labels = <?php echo json_encode(array_column($tongdoanhthu, 'month_year')); ?>;
    var totalRevenueMonth = <?php echo json_encode(array_column($tongdoanhthu, 'total_revenue_month')); ?>;

    var ctx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Tổng doanh thu tháng',
                    data: totalRevenueMonth,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    type: 'category', // Specify that the X-axis is categorical
                    labels: labels,
                    title: {
                        display: true,
                        text: 'Tháng'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu'
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.formattedValue;
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
 