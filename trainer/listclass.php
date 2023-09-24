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

$trainerID = $_SESSION['trainer_id'];

$query = "SELECT * FROM Trainers WHERE TrainerID = '$trainerID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Check if member ID is provided in the request
if (isset($_GET['id'])) {
    $class_id = $_GET['id'];

    // Construct the SQL statement 
    $sql = "DELETE FROM Class WHERE class_id = '$class_id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        $alert = '
        <div class="bg-green-100 w-1/2 border border-green-400 text-green-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
                class  deleted successfully.  
            </span>
            <button class="text-green-700 hover:text-green-900 text-2xl" onclick="changePageLocation();">×</button>
        </div>';
    } else {
        $alert = '
        <div class="bg-green-100 w-1/2 border border-green-400 text-green-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
                Failed to delete class .
            </span>
            <button class="text-green-700 hover:text-green-900 text-2xl" onclick="changePageLocation();">×</button>
        </div>';
    }
}



// Fetch data from the database
$query = "SELECT * FROM Class";
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
                        <thead class="border-b bg-neutral-900 font-medium text-white">
                            <tr>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">S.N</th>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">Class ID</th>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">Class Name</th>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">Class Shift</th>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">Action</th>
                                <th scope="col" class="px-1 sm:px-[13px] text-xs md:text-xl py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterate over the fetched data and display it in the table rows
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='border-b border-neutral-500 '>";
                                    echo "<td class='whitespace-nowrap px-1 sm:px-[13px] py-4 font-medium'>" . $count . "</td>";
                                    echo "<td class='whitespace-nowrap px-1 sm:px-[13px] py-4'>" . $row['class_id'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-1 sm:px-[13px] py-4'>" . $row['class_name'] . "</td>";
                                    echo "<td class='whitespace-nowrap px-1 sm:px-[13px] py-4'>" . $row['class_shift'] . "</td>";

                                    echo "<td class='py-6 px-1 sm:px-4'>
                                        <a href='viewclassmember.php?id=" . $row['class_id'] . "' class='text-white bg-green-500 hover:bg-green-700 py-2 px-4 rounded inline-flex items-center'>
                                            View <i class='fas fa-eye pl-2'></i> 
                                        </a>
                                    </td>";

                                    echo "<td class='py-2 px-1 sm:px-4'>      
                                        <a href='javascript:void(0);' onclick='showConfirmation(" . $row['class_id'] . ");'
                                        class='text-white bg-red-600 hover:bg-red-800 py-2 px-4 rounded inline-flex items-center'>
                                            Delete <i class='fas fa-trash-alt ml-2'></i>
                                        </a>
                                    </td>";

                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td class='whitespace-nowrap px-[13px] py-4' colspan='6'>No classes found.</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>













    <!-- confimation Popup Box  -->
    <div id="confirmationDiv" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 999;">
        <div style="background: white; width: 400px; padding: 20px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);">
            <p style="font-size: 18px; margin-bottom: 20px;">Do you really want to delete this Class ?</p>
            <button onclick="deleteclass()" style="background-color: #e53e3e; color: white; padding: 10px 50px; border: none; border-radius: 5px; margin-right: 10px; cursor: pointer;">Yes</button>
            <button onclick="cancelDelete()" style="background-color: #718096; color: white; padding: 10px 50px; border: none; border-radius: 5px; cursor: pointer;">No</button>

        </div>
    </div>

    <!-- popup window javascript -->
    <script>
        var classdelete = null;

        function showConfirmation(class_id) {
            classdelete = class_id;
            var confirmationDiv = document.getElementById('confirmationDiv');
            confirmationDiv.style.display = 'block';
        }

        function deleteclass() {
            if (classdelete !== null) {
                var currentPage = '<?php echo $_SERVER['PHP_SELF']; ?>';
                window.location.href = currentPage + '?id=' + classdelete;
            }
        }

        function cancelDelete() {
            var confirmationDiv = document.getElementById('confirmationDiv');
            confirmationDiv.style.display = 'none';
            classdelete = null;
        }
    </script>

    <script>
        function changePageLocation() {
            window.location.href = './listclass.php';
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>


</body>

</html>