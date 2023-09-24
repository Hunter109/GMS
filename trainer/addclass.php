<?php
include 'session.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$alert = ""; // Initialize $alert as an empty string

$trainerID = $_SESSION['trainer_id'];

$query = "SELECT * FROM Trainers WHERE TrainerID = '$trainerID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();





if (isset($_POST['submit'])) {


    // Define the validate_form function
    function validate_form($data)
    {
        $data = trim($data); // Remove leading and trailing whitespace
        $data = stripslashes($data); // Remove backslashes
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

    // Retrieve form data and assign them to variables after sanitizing
    $classname = validate_form($_POST['classname']);
    $shift = validate_form($_POST['shift']);


    // Construct the SQL INSERT statement
    $sql = "INSERT INTO class (class_name, class_shift) VALUES ('$classname', '$shift')";


    if ($conn->query($sql) === TRUE) {
        // If the query is successful, set the success message
        $alert = '
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-4 rounded-md flex justify-between items-center mb-4">
            <span>
                Class created successfully.
            </span>
            <button class="text-green-700 hover:text-green-900 text-2xl" onclick="changePageLocation();">×</button>
        </div>';
    } else {
        // If there is an error with the query, set the error message
        $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md  m-4 flex justify-between items-center mb-4">
            <span>
                Failed to create class.
            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload()();">×</button>
        </div>';
    }


    // Close the database connection
}
$query = "SELECT * FROM Class";
$result = $conn->query($query);
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



    <!-- create class start here  -->
    <div class="registration-container mt-20 md:ml-64">
        <?php echo $alert; ?>

        <div class="flex justify-center items-start p-5 ">
            <div class="w-full max-w- md:bg-gray-200 md:p-8 rounded-md md:shadow-md">
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-evenly ">

                            <div class="input-box mb-3 w-full md:w-[30%]">
                                <span class="text-sm  md:text-lg font-medium">Class Name</span>
                                <input type="text" name="classname" placeholder="Enter Class Name" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>

                            <div class="input-box mb-3 w-full md:w-[30%]">
                                <span class="text-sm  md:text-lg font-medium">Shift</span>
                                <select name="shift" required class="w-full px-3 py-2.5 placeholder-gray-500 border border-gray-300 rounded">

                                    <option value="" disabled selected>
                                        Select Class Shift
                                    </option>
                                    <option value="Morning">Morning</option>
                                    <option value="Day">Day</option>
                                    <option value="Evening">Evening</option>
                                </select>
                            </div>
                            <div class="button mb-3 w-full md:w-[30%]">
                                <span class="text-sm  md:text-lg invisible font-medium">action</span>

                                <input type="submit" name="submit" value="Create Class" class="h-10 w-full rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- create class end here  -->

    <div class="p-4 ml-4 md:ml-6  ">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
            <div class="w-full  p-2 md:p-4 lg:p-6">
                <?php
                include './classchart.php';

                ?>
                <p class="text-center mt-2 text-black">Class Members Counts in Bar Chart</p>
            </div>

        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script>
        function changePageLocation() {
            window.location.href = './listclass.php';
        }
    </script>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>