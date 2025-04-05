<?php include "header.php;" ?>

<div class="main">
   
    <h4 style="margin: 20px;">Summary Report</h4>
    <div class="charts" >
        
        <div><canvas id="myChart1" width="300px" height="300px"></canvas></div>
        <div><canvas id="myChart2" width="300px" height="300px"></canvas></div>
        <div><canvas id="myChart3" width="300px" height="300px"></canvas></div>
    </div>
   <section class="total-spend">
   <div class="total-spend-row">
        <div><p>Weekly: </p><h2 style="margin: 5px;">10.000.00</h2></div>
        <div><p>Monthly</p><h2 style="margin: 5px;">10.000.00</h2></div>
        <div><p>Yearly</p><h2 style="margin: 5px;">10.000.00</h2></div>
        </div>
   </section>

   <div class="dashboard-report" >
    <a class="print-dashboard-report" href="" >Print Weekly Reports</a>
    <a class="print-dashboard-report" href="" >Print Monthly Reports</a>
    <a class="print-dashboard-report" href="" >Print Yearly Reports</a>
    </div>

    <script>
        // Chart 1
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                datasets: [{
                    label: 'Weekly Incomes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Chart 2
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Monthly Incomes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    
    // Chart 1
    var ctx = document.getElementById('myChart3').getContext('2d');
        var chart1 = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Yearly Incomes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 0, 55)',
                        'rgb(0, 153, 255)',
                        'rgb(255, 183, 0)',
                        'rgb(0, 255, 255)',
                        'rgb(85, 0, 255)',
                        'rgb(255, 128, 0)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
</div>