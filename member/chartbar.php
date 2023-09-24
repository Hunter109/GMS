<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$memberID = $_SESSION['member_id'];

$query = "SELECT * FROM Members WHERE MemberID = '$memberID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();



$expiryDate = new DateTime($row['ExpiryDate']);
$startDate = new DateTime($row['StartDate']);
// Get the current date as a DateTime object
$currentDate = new DateTime();
$remainingDays = $currentDate->diff($expiryDate)->days;


$joinedclass = "SELECT COUNT(*) as rowCount FROM joinedclass WHERE memberid = '$memberID'";
$joinedcount = $conn->query($joinedclass);
$rowclass = $joinedcount->fetch_assoc();
$rowCount = $rowclass['rowCount'];


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
                labels: ['Remaining Days', 'Joined Class'],
                datasets: [{
                    label: 'Gymnasium Stats',
                    data: [<?php echo $remainingDays; ?>, <?php echo $rowCount; ?>],
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