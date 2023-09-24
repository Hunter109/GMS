<?php
include 'session.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
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

$memberID = $_GET['id'];
$sql = "SELECT * FROM Members WHERE MemberID = '$memberID'";
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
    $dob = validate_form($_POST['dob']);
    $phoneNumber = validate_form($_POST['phone-number']);
    $address = validate_form($_POST['address']);
    $email = validate_form($_POST['email']);
    $membershipPlan = validate_form($_POST['membership-plan']);
    $gender = validate_form($_POST['gender']);
    $age = validate_form($_POST['age']);
    $startDate = validate_form($_POST['start-date']);
    $endDate = validate_form($_POST['end-date']);
    $password = $_POST['password'];

    // Encrypt the password 
    $encpassword = md5($password);



    // Update the member details in the database
    $updateSql = "UPDATE Members SET  LoginPassword='$encpassword' WHERE MemberID='$memberID'";

    if ($conn->query($updateSql) === TRUE) {
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'technical.utechackathonalpha@gmail.com'; // Replace with your Gmail address
            $mail->Password = 'tjqifitkxiyweebo'; // Replace with your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('technical.utechackathonalpha@gmail.com'); // Replace with your Gmail address
            $mail->addAddress($email); // Replace with recipient email address

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Member Password Reset Successful (Admin Support)';
            $mail->Body = '
               
                <html>
                <body>
                    <div style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0;">
                        <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border: 1px solid #dddddd; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <h2 style="font-size: 24px; color: #000000; margin-bottom: 20px;">Password Reset Successful</h2>
                            <p><strong>Full Name:</strong> ' . $fullName . '</p>
                            <p><strong>Date of Birth:</strong> ' . $dob . '</p>
                            <p><strong>Phone Number:</strong> ' . $phoneNumber . '</p>
                            <p><strong>Email:</strong> ' . $email . '</p>
                            <p><strong>Address:</strong> ' . $address . '</p>
                            <p><strong>Age:</strong> ' . $age . '</p>
                            <p><strong>New Password:</strong> ' . $password . '</p>
                        </div>
                    </div>
                </body>
                </html>



            ';

            $mail->send();

            // Insertion successful, delete the member from the SignUP table
            $deleteSql = "DELETE FROM MemberPasswordReset WHERE  Email = '$email'";
            if ($conn->query($deleteSql) === TRUE) {
                header("Location: ./listmember.php");
                exit();
            } else {
                //  error message
                echo "Error deleting member from MemberPasswordReset table. Please try again later.";
                //  error message for debugging
                error_log("Database Error: " . $conn->error);
            }
        } catch (Exception $e) {
            //  error message
            $alert = '<div class="alert-error">
                        <span>An error occurred while sending the email. Please try again later.</span>
                      </div>';
            //  error message for debugging
            error_log("Email Sending Error: " . $e->getMessage());
        }
    } else {
        //  error message
        echo "Error updating member details. Please try again later.";
        //  error message for debugging
        error_log("Database Error: " . $conn->error);
    }
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

    <div class="registration-container mt-20 ml-64">
        <?php echo $alert; ?>

        <div class="flex justify-center items-start p-10 md:h-screen">
            <div class="w-full max-w- md:bg-gray-700 md:p-8 rounded-md md:shadow-md">
                <div class="text-2xl font-semibold mb-4 text-white">Reset Member Password</div>
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $memberID; ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Full Name</span>
                                <input type="text" name="full-name" placeholder="Enter your name" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['FullName']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Date of Birth</span>
                                <input type="date" name="dob" placeholder="Enter your date of birth" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['Dob']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Phone Number</span>
                                <input type="tel" name="phone-number" placeholder="Enter your phone number" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['MobileNo']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['Address']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['Email']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Membership Plan</span>
                                <select name="membership-plan" required class="w-full px-3 py-2.5 placeholder-gray-500 border border-gray-300 rounded" onchange="calculateExpiryDate(this.value)" disabled>
                                    <option value="">Select your membership plan</option>
                                    <option value="Silver" <?php echo ($row['MembershipType'] === 'Silver') ? 'selected' : ''; ?>>
                                        Silver
                                    </option>
                                    <option value="Golden" <?php echo ($row['MembershipType'] === 'Golden') ? 'selected' : ''; ?>>
                                        Golden
                                    </option>
                                    <option value="Platinum" <?php echo ($row['MembershipType'] === 'Platinum') ? 'selected' : ''; ?>>
                                        Platinum
                                    </option>
                                </select>
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Password</span>
                                <div class="password-input relative">
                                    <input type="password" name="password" placeholder="Enter your password" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" id="password-field" />
                                    <span toggle="#password-field" class="toggle-password fas fa-eye field-icon absolute top-1/2 transform -translate-y-1/2 cursor-pointer right-4"></span>
                                </div>
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Age</span>
                                <input type="number" name="age" placeholder="Enter your age" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['Age']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">Start Date</span>
                                <input type="date" name="start-date" placeholder="Enter the start date" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['StartDate']; ?>" />
                            </div>
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-white md:text-lg font-medium">End Date</span>
                                <input type="date" name="end-date" placeholder="Enter the end date" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['ExpiryDate']; ?>" />
                            </div>
                        </div>
                        <div class="gender-details flex items-center justify-start mb-4">
                            <span class="text-sm text-white md:text-lg font-medium mr-2">Gender</span>
                            <div class="category flex">
                                <label for="male" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Male" id="male" class="mr-1" required disabled <?php echo ($row['Sex'] === 'Male') ? 'checked' : ''; ?>>
                                    <span class="gender text-white">Male</span>
                                </label>
                                <label for="female" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Female" id="female" class="mr-1" required disabled <?php echo ($row['Sex'] === 'Female') ? 'checked' : ''; ?>>
                                    <span class="gender text-white">Female</span>
                                </label>
                            </div>
                        </div>


                        <div class="button">
                            <input type="submit" name="submit" value="Reset Password" class="h-10 w-full rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
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