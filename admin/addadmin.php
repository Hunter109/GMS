<?php
include 'session.php';

if (isset($_POST['submit'])) {
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

    // Define the validate_form function
    function validate_form($data)
    {
        $data = trim($data); // Remove leading and trailing whitespace
        $data = stripslashes($data); // Remove backslashes
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

    // Retrieve form data and assign them to variables after sanitizing
    $fullName = validate_form($_POST['full-name']);
    $phoneNumber = validate_form($_POST['phone-number']);
    $address = validate_form($_POST['address']);
    $email = validate_form($_POST['email']);
    $password = md5($_POST['password']); // Encrypt the password using MD5


    // Construct the SQL INSERT statement
    $sql = "INSERT INTO Admins (FullName, MobileNo, Address, Email, LoginPassword)
            VALUES ('$fullName',  '$phoneNumber', '$address', '$email', '$password')";

    // Execute the SQL INSERT statement
    if ($conn->query($sql) === TRUE) {
        // If the query is successful, redirect to the listmember.php page
        header("Location: ./listadmin.php");
        exit();
    } else {
        // If there is an error with the query, display the error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<?php

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

// Close the database connection
$conn->close();

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

<body>
    <?php
    require_once './navaside.php';
    ?>

    <div class="registration-container mt-20 ml-64">
        <div class="flex justify-center items-start p-10 md:h-screen">
            <div class="w-full max-w- md:bg-gray-200 md:p-8 rounded-md md:shadow-md">
                <div class="text-2xl font-semibold mb-4 ">Add Admin Details</div>
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Full Name</span>
                                <input type="text" name="full-name" placeholder="Enter your name" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">AdminID</span>
                                <input type="int" name="adminid" placeholder="no need to fill" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Phone Number</span>
                                <input type="tel" name="phone-number" placeholder="Enter your phone number" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" />
                            </div>

                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm  md:text-lg font-medium">Password</span>
                                <div class="password-input relative">
                                    <input type="password" name="password" placeholder="Enter your password" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" id="password-field" />
                                    <span toggle="#password-field" class="toggle-password fas fa-eye field-icon absolute top-1/2 transform -translate-y-1/2 cursor-pointer right-4"></span>
                                </div>
                            </div>

                        </div>

                        <div class="button ">
                            <input type="submit" name="submit" value="Register" class="h-10 w-full  rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./javascript/navaside.js"></script>
    <script src="./javascript/form.js"></script>
</body>

</html>