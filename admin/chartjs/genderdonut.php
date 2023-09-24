<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT
    SUM(CASE WHEN Sex = 'Male' THEN 1 ELSE 0 END) AS male_count,
    SUM(CASE WHEN Sex = 'Female' THEN 1 ELSE 0 END) AS female_count
FROM Members";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maleCount = $row['male_count'];
    $femaleCount = $row['female_count'];
} else {
    $maleCount = 0;
    $femaleCount = 0;
}

$conn->close();
?>

<div class="w-[70%] lg:w-[400px] lg:h-[400px]">

    <canvas id="genderdonut"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('genderdonut');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
                    backgroundColor: [
                        'rgb(3, 201, 136)', // Dark green for Male
                        'rgb(14, 33, 160)' // Dark blue for Female
                    ],
                    borderColor: [
                        'rgb(0, 153, 51)', // Border color for Male
                        'rgb(0, 51, 204)' // Border color for Female
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