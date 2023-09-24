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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gymnasium Management System</title>

    <!-- LINK SECTION  -->

    <!-- FAVICON LINK  -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo/logo (1).png">
    <!-- FAVICON LINK END -->



    <!-- CDN AND CSS LINK  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/try.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





    <!-- CDN AND CSS LINK END -->

    <!-- LINK SECTION  ENDS -->


</head>

<body>

    <?php
    require_once './navaside.php';
    ?>







    <div class="flex-1 ml-64 mt-20">
        <div class="flex">
            <div class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 shadow-md rounded-lg p-12 m-2 hover:from-blue-400 hover:to-blue-500 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <div class="flex-1 ml-4">
                    <h2 class="text-2xl font-bold mb-2 text-white">Total Members</h2>
                    <p class="text-4xl font-bold text-white"><?php echo $totalMembers; ?></p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="material-icons text-white text-6xl">person</i>
                    <a href="./listmember.php" class="text-white hover:underline mt-2">View</a>
                </div>
            </div>
            <div class="flex-1 bg-gradient-to-r from-green-500 to-green-600 shadow-md rounded-lg p-12 m-2 hover:from-green-400 hover:to-green-500 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <div class="flex-1 ml-4">
                    <h2 class="text-2xl font-bold mb-2 text-white">Total Trainers</h2>
                    <p class="text-4xl font-bold text-white"><?php echo $totalTrainers; ?></p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="material-icons text-white text-6xl">directions_run</i>
                    <a href="./listtrainer.php" class="text-white hover:underline mt-2">View</a>
                </div>
            </div>
            <div class="flex-1 bg-gradient-to-r from-purple-500 to-purple-600 shadow-md rounded-lg p-12 m-2 hover:from-purple-400 hover:to-purple-500 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <div class="flex-1 ml-4">
                    <h2 class="text-2xl font-bold mb-2 text-white">Total Admins</h2>
                    <p class="text-4xl font-bold text-white"><?php echo $totalAdmins; ?></p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="material-icons text-white text-6xl">security</i>
                    <a href="./listadmin.php" class="text-white hover:underline mt-2">View</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="flex flex-col md:flex-row justify-between items-center ml-4 md:ml-64 mt-4 md:mt-8"> -->

    <div class="bg-gray-200 p-4 ml-4 md:ml-64 mt-4 md:mt-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <?php
                include './chartjs/totalbaruser.php';
                ?>
                <p class="text-center mt-2 text-black">Total GMS Users Count in Bar Chart</p>
            </div>

            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <div class="flex flex-col items-center"> <!-- Center the Pie Chart -->
                    <?php
                    include './chartjs/totalpieuser.php';
                    ?>
                    <p class="text-center mt-2 text-black">Total GMS Users Distribution</p>
                </div>
            </div>
        </div>
    </div>





    <div class="bg-gray-200 p-4 ml-4 md:ml-64 mt-4 md:mt-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <?php
                include './chartjs/totalresetbar.php';
                ?>
                <p class="text-center mt-2 text-black">Total Password Reset and Member Request in Bar Chart</p>
            </div>

            <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
                <div class="flex flex-col items-center"> <!-- Center the Pie Chart -->
                    <?php
                    include './chartjs/totalresetdonut.php';
                    ?>
                    <p class="text-center mt-2 text-black">Password Reset & Member Request Distribution</p>
                </div>
            </div>
        </div>
    </div>




    <!-- </div> -->




















    <script src="./javascript/navaside.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</body>

</html>