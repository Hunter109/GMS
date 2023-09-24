<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Member Request Count
$rquery = "SELECT COUNT(*) as count FROM signUp";
$request = $conn->query($rquery);
$requestrow = $request->fetch_assoc();
$requestcount = $requestrow['count'];

// Member password reset request count
$queryMemberReset = "SELECT COUNT(*) as count FROM MemberPasswordReset";
$memberResult = $conn->query($queryMemberReset);
$rowMember = $memberResult->fetch_assoc();
$memberResetCount = $rowMember['count'];

// Trainer password reset request count
$queryTrainerReset = "SELECT COUNT(*) as count FROM TrainerPasswordReset";
$trainerResult = $conn->query($queryTrainerReset);
$rowTrainer = $trainerResult->fetch_assoc();
$trainerResetCount = $rowTrainer['count'];

$conn->close();
?>

<div class="w-[70%] lg:w-[400px] lg:h-[400px]">
    <canvas id="myChartReset1"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChartReset1');

        new Chart(ctx, {
            type: 'doughnut', // Set the chart type to 'doughnut'
            data: {
                labels: ['Member Reset', 'Trainer Reset', 'Member Request'],
                datasets: [{
                    label: 'Total Password Reset and Member Request',
                    data: [<?php echo $memberResetCount; ?>, <?php echo $trainerResetCount; ?>, <?php echo $requestcount; ?>],
                    backgroundColor: [
                        'rgb(158, 111, 33)', // Dark brown for Member Reset
                        'rgb(255, 100, 100)', // Dark red for Trainer Reset
                        'rgb(58, 152, 185)' // Dark blue for Member Request
                    ],
                    borderColor: [
                        'rgba(0, 51, 102, 1)',
                        'rgba(0, 77, 31, 1)',
                        'rgba(51, 0, 51, 1)'
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
                }
            }
        });
    });
</script>