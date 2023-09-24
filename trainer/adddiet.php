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
    $diettype = validate_form($_POST['diettype']);
    $MorningDiet = validate_form($_POST['Morningdiet']);
    $Goal = validate_form($_POST['goal']);
    $Morningworkout = validate_form($_POST['Morningworkout']);
    $Afternoondiet = validate_form($_POST['Afternoondiet']);
    $Eveningdiet = validate_form($_POST['Eveningdiet']);
    $Eveningworkout = validate_form($_POST['Eveningworkout']);




    // Construct the SQL INSERT statement
    $sql = "INSERT INTO Diet (diet_type ,morning_diet, goal, morning_workout, afternoon_diet, evening_diet, evening_workout) 
VALUES ('$diettype', '$MorningDiet', '$Goal', '$Morningworkout', '$Afternoondiet', '$Eveningdiet', '$Eveningworkout')";

    // Execute the SQL INSERT statement
    if ($conn->query($sql) === TRUE) {
        // If the query is successful, redirect to the listmember.php page
        header("Location: ./listdiet.php");
        exit();
    } else {
        // If there is an error with the query, display the error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Member Request Count


    // Close the database connection
    $conn->close();
}
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

<body class="bg-gray-200 sm:bg-white">
    <?php
    require_once './navaside.php';
    ?>

    <div class="registration-container mt-20 md:ml-64">
        <?php echo $alert; ?>

        <div class="flex justify-center items-start p-10 md:h-screen">
            <div class="w-full max-w- md:bg-gray-200 md:p-8 rounded-md md:shadow-md">
                <div class="text-2xl font-semibold mb-4  ">Add Diet and Workout </div>
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Diet Type</span>
                                <select name="diettype" required class="w-full px-3 py-2.5 placeholder-gray-500 border border-gray-300 rounded">

                                    <option value="" disabled selected>
                                        Select Diet Type
                                    </option>
                                    <option value="Veg">Veg</option>
                                    <option value="Non-veg">Non-Veg</option>
                                </select>
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Morning Diet</span>
                                <input type="text" name="Morningdiet" placeholder="Enter Morning Diet" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Morning Workout</span>
                                <input type="text" name="Morningworkout" placeholder="Enter Morning Workout" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Afternoon Diet</span>
                                <input type="text" name="Afternoondiet" placeholder="Enter Afternoon Diet " required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Evening Diet</span>
                                <input type="text" name="Eveningdiet" placeholder="Enter Evening Diet" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Evening Workout</span>
                                <input type="text" name="Eveningworkout" placeholder="Enter Evening Workout" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>



                        </div>
                        <div class="gender-details flex items-center justify-start mb-4">
                            <span class="text-sm  md:text-lg font-medium mr-2">Goal</span>
                            <div class="category flex">
                                <label for="male" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="goal" value="Bulk" id="Bulk" class="mr-1" required />
                                    <span class="gender ">Bulk</span>
                                </label>
                                <label for="female" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="goal" value="Cut" id="Cut" class="mr-1" required />
                                    <span class="gender ">Cut</span>
                                </label>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Add Diet" class="h-10 w-full rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>


</body>

</html>