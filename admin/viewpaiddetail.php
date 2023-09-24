<?php
include 'session.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Member Request Count
$rquery = "SELECT COUNT(*) as count FROM signUp";
$request = $conn->query($rquery);
$requestrow = $request->fetch_assoc();
$requestcount = $requestrow['count'];
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

$paymentID = $_GET['id'];

$queryclass = "SELECT *
FROM Members
NATURAL JOIN Payment WHERE PaymentID = '$paymentID'";



$result = $conn->query($queryclass);
$row = $result->fetch_assoc();




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

    <!-- CDN AND CSS LINK END -->

    <!-- LINK SECTION  ENDS -->




</head>

<body class=" bg-gray-200">
    <?php
    require_once './navaside.php';
    ?>









    <div id="profile-div" class="ml-4 md:ml-64 mt-14">
        <div class="flex flex-col md:flex-row items-center  space-x-4">
            <div class="flex-1 mb-4 md:mb-0">
                <div class="overflow-x-auto">
                    <table class="w-[95%] sm:w-2/3 md:w-[90%] lg:w-[95%] table-auto mt-4 sm:m-6 md:m-6 lg:m-8 border border-black border-2">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="font-semibold p-2 md:p-4 border border-black border-2" colspan="2">
                                    <span class="text-sm sm:text-base md:text-lg lg:text-xl">
                                        Payment Detail of Membership </span>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-2 md:p-4 border border-black border-2 text-center">Member ID</td>
                                <td class="p-2 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['MemberID']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-2 md:p-4 border border-black border-2 text-center">Full Name</td>
                                <td class="p-2 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['FullName']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 md:p-4 border border-black border-2 text-center">Mobile No
                                </td>
                                <td class="p-4 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['MobileNo']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 md:p-4 border border-black border-2 text-center"> Membership Type
                                </td>
                                <td class="p-4 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['MembershipType']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 md:p-4 border border-black border-2 text-center">Payment ID </td>
                                <td class="p-4 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['PaymentID']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 md:p-4 border border-black border-2 text-center">AmountPaid </td>
                                <td class="p-4 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['AmountPaid']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 md:p-4 border border-black border-2 text-center">Payment Date
                                </td>
                                <td class="p-4 md:p-4 border border-black border-2 text-center text-sm md:text-base lg:text-lg"><b><?php echo $row['PaymentDate']; ?></b></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <script src="./javascript/navaside.js"></script>





</body>

</html>