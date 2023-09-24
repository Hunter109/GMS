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


<div>
    <canvas id="genderbar"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('genderbar');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Total GMS Users Count',
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