<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "puericulture";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch payroll statistics
$result = $conn->query("SELECT COUNT(*) as total_employees, SUM(salary) as total_salaries, SUM(tax) as total_taxes, SUM(net_pay) as total_net_pay FROM employees");
$row = $result->fetch_assoc();

$totalEmployees = $row['total_employees'];
$totalSalaries = $row['total_salaries'];
$totalTaxes = $row['total_taxes'];
$totalNetPay = $row['total_net_pay'];

// Fetch employee payroll data
$employees = $conn->query("SELECT * FROM employees");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Dashboard</title>
    <link rel="stylesheet" href="./assets/css/text.css">
    <script src="./assets/npm/charts.js"></script>
</head>
<body>

    <div class="container">
        <h1>Payroll Dashboard</h1>
        <div class="stats">
            <div class="box">👨‍💼 Total Employees: <strong><?php echo $totalEmployees; ?></strong></div>
            <div class="box">💰 Total Salaries: <strong>₱<?php echo number_format($totalSalaries, 2); ?></strong></div>
            <div class="box">📉 Tax Deductions: <strong>₱<?php echo number_format($totalTaxes, 2); ?></strong></div>
            <div class="box">🤑 Net Pay: <strong>₱<?php echo number_format($totalNetPay, 2); ?></strong></div>
        </div>

        <h2>Employee Payroll</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Tax</th>
                    <th>Net Pay</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($employee = $employees->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['department']; ?></td>
                        <td>₱<?php echo number_format($employee['salary'], 2); ?></td>
                        <td>₱<?php echo number_format($employee['tax'], 2); ?></td>
                        <td>₱<?php echo number_format($employee['net_pay'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Monthly Salary Overview</h2>
        <canvas id="salaryChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('salaryChart').getContext('2d');
        const salaryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Salaries', 'Taxes', 'Net Pay'],
                datasets: [{
                    label: 'Amount in ₱',
                    data: [<?php echo $totalSalaries; ?>, <?php echo $totalTaxes; ?>, <?php echo $totalNetPay; ?>],
                    backgroundColor: ['blue', 'red', 'green']
                }]
            }
        });


        
    </script>

</body>
</html>
