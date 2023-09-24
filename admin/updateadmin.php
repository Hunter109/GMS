<?php
include 'session.php';
$alert = '';
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminID = $_GET['id'];
$sql = "SELECT * FROM Admins WHERE AdminID = '$adminID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}


// Define the validate_form function
function validate_form($data)
{
    $data = trim($data); // Remove leading and trailing whitespace
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and assign them to variables after sanitizing
    $fullName = validate_form($_POST['full-name']);
    $adminid = validate_form($_POST['adminid']);
    $phoneNumber = validate_form($_POST['phone-number']);
    $address = validate_form($_POST['address']);
    $email = validate_form($_POST['email']);
    $password = validate_form($_POST['password']);
    $encpassword = md5($password);


    // Check if the old password matches the stored password for the current user
    $query = "SELECT * FROM Admins WHERE AdminID = '$adminid'";
    $result = $conn->query($query);


    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['LoginPassword'];

        if ($password === $storedPassword) {
            // Update the Admin details in the database without password deu to same password 
            $updateSql = "UPDATE Admins SET FullName='$fullName', MobileNo='$phoneNumber',Address = '$address',Email='$email' WHERE AdminID='$adminid'";
        } else {
            // Update the Admin details in the database with new password 

            $updateSql = "UPDATE Admins SET FullName='$fullName', MobileNo='$phoneNumber',Address = '$address',Email='$email', LoginPassword='$encpassword' WHERE AdminID='$adminid'";
        }
    }


    // Update the member details in the database


    if ($conn->query($updateSql) === TRUE) {
        // echo "<script>alert('Admin update successfully.'); window.location.href = './listadmin.php';</script>";
        $alert = '
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
                    <span>
                        Admin Detail Updated successfully.
                    </span>
                    <button class="text-green-700 hover:text-green-900 text-2xl" onclick="changePageLocation();">×</button>
                </div>';

        // header("Location: http://localhost/GMS/admin/listadmin.php");

        // header("Location: ./listadmin.php");
    } else {
        $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
            An error occurred while updating admin details. Please try again later.

            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
        </div>';
    }
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
    <!-- CDN AND CSS LINK END -->

</head>

<body>
    <?php
    require_once './navaside.php';
    ?>

    <div class="registration-container mt-24 ml-64">
        <?php echo $alert; ?>

        <div class="flex justify-center items-start p-10 md:h-screen">
            <div class="w-full max-w- md:bg-gray-700 md:p-8 rounded-md md:shadow-md">
                <div class="text-2xl font-semibold mb-4 text-white">Update Admin Details</div>
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $AdminID; ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Full Name</span>
                                <input type="text" name="full-name" placeholder="Enter your name" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['FullName']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">AdminID</span>
                                <input type="text" name="adminid" placeholder="Enter your date of birth" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['AdminID']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Phone Number</span>
                                <input type="tel" name="phone-number" placeholder="Enter your phone number" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['MobileNo']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['Address']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['Email']; ?>" />
                            </div>

                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Password</span>
                                <div class="password-input relative">
                                    <input type="password" name="password" placeholder="Enter your password" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" id="password-field" value="<?php echo $row['LoginPassword']; ?>" />
                                    <span toggle="#password-field" class="toggle-password fas fa-eye field-icon absolute top-1/2 transform -translate-y-1/2 cursor-pointer right-4"></span>
                                </div>
                            </div>



                        </div>

                        <div class="button ">
                            <input type="submit" name="submit" value="Update" class="h-10 w-full  rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changePageLocation() {
            window.location.href = './listadmin.php';
        }
    </script>

    <script src="./javascript/navaside.js"></script>
    <script src="./javascript/form.js"></script>

</body>

</html>