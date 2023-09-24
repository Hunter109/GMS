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
$requestcount = $requestrow['count']; // Use 'count' as the key

// member password reset request count
$queryMemberReset = "SELECT COUNT(*) as count FROM MemberPasswordReset";
$memberResult = $conn->query($queryMemberReset);
$rowMember = $memberResult->fetch_assoc();
$memberResetCount = $rowMember['count'];


// trainer password reset request count
$queryTrainerReset = "SELECT COUNT(*) as count FROM TrainerPasswordReset";
$trainerResult = $conn->query($queryTrainerReset);
$rowTrainer = $trainerResult->fetch_assoc();
$trainerResetCount = $rowTrainer['count'];



$conn->close();
?>


<div>
    <canvas id="myChartReset"></canvas>
</div>

<!-- userreport.php -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChartReset');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['MemberReset', 'TrainerReset', 'MemberRequest'],
                datasets: [{
                    label: 'Total PasswordReset And Member Request ',
                    data: [<?php echo $memberResetCount; ?>, <?php echo $trainerResetCount; ?>, <?php echo $requestcount; ?>],
                    backgroundColor: [
                        'rgb(158, 111, 33)', // Dark blue for Member
                        'rgb(255, 100, 100)', // Dark green for Trainer
                        'rgb(58, 152, 185)' // Dark purple for Admin
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
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 10, // Adjust the font size as needed
                                family: 'Arial', // Specify the font family
                                weight: 'bold', // Specify the font weight
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'black', // Set the font color for labels here
                        },
                    },
                },
            }
        });
    });
</script>