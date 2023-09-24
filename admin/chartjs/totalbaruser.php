<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





// Fetch the count of members
$queryMembers = "SELECT COUNT(*) as totalMembers FROM Members";
$resultMembers = $conn->query($queryMembers);
$rowMembers = $resultMembers->fetch_assoc();
$totalMembers = $rowMembers['totalMembers'];

// Fetch the count of trainers
$queryTrainers = "SELECT COUNT(*) as totalTrainers FROM Trainers";
$resultTrainers = $conn->query($queryTrainers);
$rowTrainers = $resultTrainers->fetch_assoc();
$totalTrainers = $rowTrainers['totalTrainers'];

// Fetch the count of admins
$queryAdmins = "SELECT COUNT(*) as totalAdmins FROM Admins";
$resultAdmins = $conn->query($queryAdmins);
$rowAdmins = $resultAdmins->fetch_assoc();
$totalAdmins = $rowAdmins['totalAdmins'];


$conn->close();
?>

<div>
    <canvas id="myChart"></canvas>
</div>

<!-- userreport.php -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Member', 'Trainer', 'Admin'],
                datasets: [{
                    label: 'Total GMS User',
                    data: [<?php echo $totalMembers; ?>, <?php echo $totalTrainers; ?>, <?php echo $totalAdmins; ?>],
                    backgroundColor: [
                        'rgb(14, 33, 160)', // Dark blue for Member
                        'rgb(3, 201, 136)', // Dark green for Trainer
                        'rgb(148, 0, 255)' // Dark purple for Admin
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