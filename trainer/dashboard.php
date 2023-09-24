<?php
include 'session.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$trainerID = $_SESSION['trainer_id'];

$query = "SELECT * FROM Trainers WHERE TrainerID = '$trainerID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();



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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gymnasium Management System</title>

    <!-- LINK SECTION  -->

    <!-- FAVICON LINK  -->

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo/logo (1).png">
    <!-- FAVICON LINK END -->



    <!-- CDN AND CSS LINK  -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





    <!-- CDN AND CSS LINK END -->

    <!-- LINK SECTION  ENDS -->




</head>


<body>


    <?php
    require_once './navaside.php';
    ?>







    <div class="flex-1 md:ml-64 mt-20">
        <div class="flex flex-wrap">
            <!-- SILVER -->
            <div class="w-full lg:w-1/3 p-2">
                <div class="bg-gray-500 shadow-md rounded-lg p-6 m-2 hover:bg-gray-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex-1 ml-4">
                        <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">SILVER</h2>
                        <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $totalSilver; ?></p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="material-icons text-yellow-100 sm:text-xl lg:text-4xl">star</i>
                        <a href="./silver.php" class="text-white hover:underline md:text-xl mt-2">View</a>
                    </div>
                </div>
            </div>

            <!-- GOLDEN -->
            <div class="w-full lg:w-1/3 p-2">
                <div class="bg-yellow-500 shadow-md rounded-lg p-6 m-2 hover:bg-yellow-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex-1 ml-4">
                        <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">GOLDEN</h2>
                        <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $totalGolden; ?></p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="material-icons text-yellow-100 sm:text-xl lg:text-4xl">star</i>
                        <a href="./golden.php" class="text-white hover:underline md:text-xl mt-2">View</a>
                    </div>
                </div>
            </div>

            <!-- PLATINUM -->
            <div class="w-full lg:w-1/3 p-2">
                <div class="bg-purple-500 shadow-md rounded-lg p-6 m-2 hover:bg-purple-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex-1 ml-4">
                        <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">PLATINUM</h2>
                        <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $totalPlatinum; ?></p>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="material-icons text-yellow-100 sm:text-xl lg:text-4xl">star</i>
                        <a href="./platinum.php" class="text-white hover:underline md:text-xl mt-2">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <!-- Membership type chart js  -->

    <div class="bg-gray-200 p-4 ml-4 md:ml-64 mt-4 md:mt-8">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <?php
                include '../admin/chartjs/packagebar.php';

                ?>
                <p class="text-center mt-2 text-black">Membership Type Counts in Bar Chart</p>
            </div>

            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <div class="flex flex-col items-center"> <!-- Center the Pie Chart -->
                    <?php
                    // include './chartjs/packagepie.php';
                    include '../admin/chartjs/packagepie.php';

                    ?>
                    <p class="text-center mt-2 text-black">Membership Type Counts in Donut Chart</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Membership type chart js End  -->





    <!-- Total male Female Count Chart Js -->
    <div class="bg-gray-200 p-4 ml-4 md:ml-64 mt-4 md:mt-8">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <?php

                include '../admin/chartjs/genderbar.php';


                ?>
                <p class="text-center mt-2 text-black">Male and Female Member Counts in Bar Chart</p>
            </div>

            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <div class="flex flex-col items-center"> <!-- Center the Pie Chart -->
                    <?php
                    include '../admin/chartjs/genderdonut.php';
                    ?>
                    <p class="text-center mt-2 text-black">Male and Female Member Counts in Donut Chart</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Total male Female Count Chart Js End-->















    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>






</body>

</html>