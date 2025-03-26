<div>
    <div class="dashboard-content">
        <div class="nav-1">
            <h3>Welcome back, <?php echo 'Manuel E. Daligdig' ?></h3>
        </div>
        <div class="nav-profile"><img src="./assets/images/user-avatar.png" alt="Profile Avatar" width="60">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        </div>

    </div>
    <div style="display:flex; gap:50px; margin:20px;">
        <div><canvas id="myChart1" width="300px" height="300px"></canvas></div>
        <div><canvas id="myChart2" width="300px" height="300px"></canvas></div>
        <div><canvas id="myChart3" width="300px" height="300px"></canvas></div>
    </div>

    <script>
        // Chart 1
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
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
                    label: 'Series A',
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
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