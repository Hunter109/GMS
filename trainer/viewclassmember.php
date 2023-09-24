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
$trainerID = $_SESSION['trainer_id'];

$query = "SELECT * FROM Trainers WHERE TrainerID = '$trainerID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$classID = $_GET['id'];

$queryclass = "SELECT *
FROM Members
NATURAL JOIN Joinedclass
NATURAL JOIN Class
WHERE class_id = '$classID'";


$result = $conn->query($queryclass);



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







    <div class="flex flex-col md:ml-64 mt-20 ">
        <div class="overflow-x-auto sm:-mx-6">
            <div class="inline-block py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="text-center text-sm font-light">
                        <thead class="border-b bg-neutral-900 font-medium text-white  ">
                            <tr>
                                <th scope="col" class="px-[13px]  py-6">S.N</th>
                                <th scope="col" class="px-[13px] py-6">Member ID</th>
                                <th scope="col" class="px-[13px]  py-6">Full Name</th>
                                <th scope="col" class="px-[13px] py-6">Sex</th>
                                <th scope="col" class="px-[13px] py-6">Mobile No</th>
                                <th scope="col" class="px-[13px] py-6">Membership Type</th>
                                <th scope="col" class="px-[13px] py-6">Age</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterate over the fetched data and display it in the table rows
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='border-b border-neutral-500 '>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6  font-medium'>" . $count . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['MemberID'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['FullName'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['Sex'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['MobileNo'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['MembershipType'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-[13px] py-6'>" . $row['Age'] . "</td>";







                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td class='whitespace-nowrap px-[13px] py-4'>No members found. </td></tr>";
                            }
                            $conn->close();

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>





</body>

</html>