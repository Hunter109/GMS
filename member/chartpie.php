<!-- 
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

// $expiryDate = new DateTime($row['ExpiryDate']);
// $startDate = new DateTime($row['StartDate']);
// // Get the current date as a DateTime object
// $currentDate = new DateTime();
// $remainingDays = $currentDate->diff($expiryDate)->days;

// $joinedclass = "SELECT COUNT(*) as rowCount FROM joinedclass WHERE memberid = '$memberID'";
// $joinedcount = $conn->query($joinedclass);
// $rowclass = $joinedcount->fetch_assoc();
// $rowCount = $rowclass['rowCount'];

$conn->close();
?> 
-->


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
                labels: ['Remaining Days', 'Total Classes'],
                datasets: [{
                    label: 'Gymnasium Stats',
                    data: [<?php echo $remainingDays; ?>, <?php echo $rowCount; ?>],
                    backgroundColor: [
                        'rgb(14, 33, 160)', // Dark blue for Remaining Days
                        'rgb(3, 201, 136)', // Dark green for Total Classes
                    ],
                    borderColor: [
                        'rgb(0, 51, 102)', // Border color for Remaining Days
                        'rgb(0, 77, 31)', // Border color for Total Classes
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
                                size: 14,
                                family: 'Arial',
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    });
</script>