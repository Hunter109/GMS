<?php
include 'session.php';

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$classIDs = [
    1004, 1005, 1006, 1007, 1008, 1009, 1010, 1011, 1012
];

// Initialize an associative array to store the class totals
$classTotals = [];

foreach ($classIDs as $classID) {
    $queryclass = "SELECT COUNT(*) AS totalMembers
                   FROM Members
                   NATURAL JOIN Joinedclass
                   NATURAL JOIN Class
                   WHERE class_id = '$classID'";

    $result = $conn->query($queryclass);
    $row = $result->fetch_assoc();
    $totalMembers = $row['totalMembers'];

    // Store the total members count in the associative array
    $classTotals[$classID] = $totalMembers;
}




// Close the database connection
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
                labels: ['Yoga', 'Kick Boxing', 'Power Lifting', 'Group classes', 'Personal training', 'Online personal training', 'Functional Fitness', 'Online Group Classes', 'Zumba fitness'],
                datasets: [{
                    label: 'Total GMS User Per Class',
                    data: [<?php echo $classTotals[1004]; ?>, <?php echo $classTotals[1005]; ?>, <?php echo $classTotals[1006]; ?>, <?php echo $classTotals[1007]; ?>, <?php echo $classTotals[1008]; ?>, <?php echo $classTotals[1009]; ?>, <?php echo $classTotals[1010]; ?>, <?php echo $classTotals[1011]; ?>, <?php echo $classTotals[1012]; ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)', // Slightly Darker Light Blue
                        'rgba(255, 99, 132, 0.5)', // Slightly Darker Light Red
                        'rgba(255, 205, 86, 0.5)', // Slightly Darker Light Yellow
                        'rgba(54, 162, 235, 0.5)', // Slightly Darker Light Orange
                        'rgba(153, 102, 255, 0.5)', // Slightly Darker Light Purple
                        'rgba(255, 159, 64, 0.5)', // Slightly Darker Light Orange
                        'rgba(255, 99, 71, 0.5)', // Slightly Darker Light Tomato
                        'rgba(50, 205, 50, 0.5)', // Slightly Darker Light Green
                        'rgba(255, 140, 0, 0.5)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 0.5)', // Slightly Darker Light Blue
                        'rgba(255, 99, 132, 0.5)', // Slightly Darker Light Red
                        'rgba(255, 205, 86, 0.5)', // Slightly Darker Light Yellow
                        'rgba(54, 162, 235, 0.5)', // Slightly Darker Light Orange
                        'rgba(153, 102, 255, 0.5)', // Slightly Darker Light Purple
                        'rgba(255, 159, 64, 0.5)', // Slightly Darker Light Orange
                        'rgba(255, 99, 71, 0.5)', // Slightly Darker Light Tomato
                        'rgba(50, 205, 50, 0.5)', // Slightly Darker Light Green
                        'rgba(255, 140, 0, 0.5)'
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