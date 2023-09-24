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
$memberID = $_SESSION['member_id'];

$query = "SELECT * FROM Members WHERE MemberID = '$memberID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();



// Fetch data from the database
$query = "SELECT * FROM Diet";
$result = $conn->query($query);




?>




<!DOCTYPE html>
<html lang="en">


<!-- ... -->

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

<body class="bg-gray-200">
    <?php
    require_once './navaside.php';
    ?>




    <div class="flex flex-col ml-4 md:ml-72 mt-20 ">
        <?php echo $alert; ?>

        <div class="overflow-x-auto sm:-mx-6">
            <div class="inline-block py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="text-center text-sm  md:text-xl font-light">
                        <thead class="border-b bg-neutral-900 font-medium text-white  ">
                            <tr>
                                <th scope="col" class="px-3 sm:px-[13px] text-xs md:text-xl  py-4">S.N</th>

                                <th scope="col" class="px-3 sm:px-[13px] text-xs md:text-xl py-4">Diet ID </th>
                                <th scope="col" class="px-3 sm:px-[13px] text-xs md:text-xl  py-4">Diet Type</th>

                                <th scope="col" class="px-3 sm:px-[13px]  text-xs md:text-xl py-4">Diet Goal</th>
                                <th scope="col" class="px-3 sm:px-[13px]  text-xs md:text-xl py-4">Action</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterate over the fetched data and display it in the table rows
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='border-b border-neutral-500 '>";
                                    echo "<td class='whitespace-nowrap px-3 sm:px-[13px] py-4  font-medium'>" . $count . "</td>";
                                    echo "<td class='whitespace-nowrap px-3 sm:px-[13px] py-4'>" . $row['diet_id'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-3 sm:px-[13px] py-4'>" . $row['diet_type'] . "</td>";


                                    echo "<td class='whitespace-nowrap px-3 sm:px-[13px] py-4'>" . $row['goal'] . "</td>";


                                    echo "<td class='py-6 px-3 sm:px-4'>
                                    <a href='viewdiet.php?id=" . $row['diet_id'] . "' class='text-white bg-green-500 hover:bg-green-700 py-2 px-4 rounded inline-flex items-center'>
                                    View <i class='fas fa-eye pl-2'></i> 
                                       </a>
                                   </td>";
                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td class='whitespace-nowrap px-[13px] py-4'>No diet found. </td></tr>";
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