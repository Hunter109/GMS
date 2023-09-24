<?php

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
<div>
    <canvas id="myChart"></canvas>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Silver', 'Golden', 'Platinium'],
                datasets: [{
                    label: 'Total GMS User',
                    data: [<?php echo $totalSilver; ?>, <?php echo $totalGolden; ?>, <?php echo $totalPlatinum; ?>],
                    backgroundColor: [
                        'rgb(107, 114, 128)', // Dark blue for Member
                        'rgb(251, 191, 36)', // Dark green for Trainer
                        'rgb(139, 92, 246)' // Dark purple for Admin
                        // Dark purple for Admin
                    ],
                    borderColor: [
                        'rgb(107, 114, 128)', // Dark blue for Member
                        'rgb(251, 191, 36)', // Dark green for Trainer
                        'rgb(139, 92, 246)' // Dark purple for Admin
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 10, // Adjust the font size as needed
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