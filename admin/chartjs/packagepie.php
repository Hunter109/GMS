<?php
include 'session.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the count of Silver members
$querySilver = "SELECT COUNT(*) as totalSilver FROM Members WHERE MembershipType = 'Silver'";
$resultSilver = $conn->query($querySilver);
$rowSilver = $resultSilver->fetch_assoc();
$totalSilver = $rowSilver['totalSilver'];

// Fetch the count of Golden members
$queryGolden = "SELECT COUNT(*) as totalGolden FROM Members WHERE MembershipType = 'Golden'";
$resultGolden = $conn->query($queryGolden);
$rowGolden = $resultGolden->fetch_assoc();
$totalGolden = $rowGolden['totalGolden'];

// Fetch the count of Platinum members
$queryPlatinum = "SELECT COUNT(*) as totalPlatinum FROM Members WHERE MembershipType = 'Platinum'";
$resultPlatinum = $conn->query($queryPlatinum);
$rowPlatinum = $resultPlatinum->fetch_assoc();
$totalPlatinum = $rowPlatinum['totalPlatinum'];





$conn->close();

?>



<div class="w-[70%] lg:w-[400px] lg:h-[400px]">
    <canvas id="myChart1" class="w-full h-full"></canvas>
</div>

<!-- userreport.php -->



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctxPie = document.getElementById('myChart1').getContext('2d');

        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Silver', 'Golden', 'Platinium'],
                datasets: [{
                    label: 'Total GMS User',
                    data: [<?php echo $totalSilver; ?>, <?php echo $totalGolden; ?>, <?php echo $totalPlatinum; ?>],
                    backgroundColor: [
                        'rgb(167, 187, 199)', // Dark blue for Member
                        'rgb(255, 217, 61)', // Dark green for Trainer
                        'rgb(121, 63, 223)' // Dark purple for Admin
                    ],
                    borderColor: [
                        'rgb(167, 187, 199)', // Dark blue for Member
                        'rgb(255, 217, 61)', // Dark green for Trainer
                        'rgb(121, 63, 223)' // Dark purple for Admin
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right'
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14, // Adjust the font size as needed
                                family: 'Arial', // Specify the font family
                                weight: 'bold' // Specify the font weight
                            }
                        }
                    }
                }
            }
        });
    });
</script>