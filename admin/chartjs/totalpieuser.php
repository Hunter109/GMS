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
<div class="w-[70%] lg:w-[400px] lg:h-[400px]">
    <canvas id="myChart1"></canvas>
</div>

<!-- userreport.php -->



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctxPie = document.getElementById('myChart1').getContext('2d');

        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Member', 'Trainer', 'Admin'],
                datasets: [{
                    data: [<?php echo $totalMembers; ?>, <?php echo $totalTrainers; ?>, <?php echo $totalAdmins; ?>],
                    backgroundColor: [
                        'rgb(14, 33, 160)', // Dark blue for Member
                        'rgb(3, 201, 136)', // Dark green for Trainer
                        'rgb(148, 0, 255)' // Dark purple for Admin
                    ],
                    borderColor: [
                        'rgb(0, 51, 204)', // Blue border for Member
                        'rgb(0, 153, 51)', // Green border for Trainer
                        'rgb(102, 0, 153)' // Purple border for Admin
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