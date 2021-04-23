<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

    <title>Charts</title>
</head>
<body>
    <canvas id="first__chart" width="400" height="200"></canvas>
    <canvas id="second__chart" width="400" height="200"></canvas>
    <canvas id="third__chart" width="400" height="200"></canvas>

    <script type="text/javascript">
        var ctx1 = document.getElementById("first__chart");
        var first__chart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ["Common", "Rare", "Epic", "LEGENDARY"],
                datasets: [
                    {
                        label: 'Card Collection',
                        data: [50, 35, 15, 8],
                        backgroundColor:[
                            'grey',
                            'blue',
                            'purple',
                            'gold'
                        ],
                    }
                ]
            },
            options: {
                responsive: false,
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });

        var ctx2 = document.getElementById("second__chart");
        var second__chart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ["Rahat", "Ilshat", "Marat", "Tamer"],
                datasets: [
                    {
                        label: 'How we eat pizza...',
                        data: [4, 6, 10, 2],
                        backgroundColor:[
                            'red',
                            'green',
                            'black',
                            'orange'
                        ],
                    }
                ]
            },
            options: {
                responsive: false,
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });

        var ctx3 = document.getElementById("third__chart");
        var third__chart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [
                    {
                        label: 'My emotional system on previous week',
                        data: [1, 1, 1, 6, 3, 7, 3],
                        fill: false,
                        borderColor: 'green',
                        lineTension: 0.1
                    }
                ]
            },
            options: {
                responsive: false,
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });
    </script>
</body>
</html>