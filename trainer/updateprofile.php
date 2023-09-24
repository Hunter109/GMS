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
$trainerID = $_SESSION['trainer_id'];

$query = "SELECT * FROM Trainers WHERE TrainerID = '$trainerID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

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
    $shift = validate_form($_POST['shift']);
    $gender = validate_form($_POST['gender']);
    $age = validate_form($_POST['age']);
    $password = validate_form($_POST['password']);





    // Construct the SQL SELECT statement to check if the user's details exist
    $checkUserQuery = "SELECT * FROM Trainers WHERE Email = '$email'";

    $result = $conn->query($checkUserQuery);

    if ($result->num_rows === 0 || $email === $row['Email']) {


        // Update the Member details in the database with new password 
        $updateSql = "UPDATE Trainers SET FullName='$fullName', Dob='$dob', MobileNo='$phoneNumber', Address='$address',Age ='$age',  Email='$email', Shift='$shift', Sex='$gender' WHERE TrainerID='$trainerID'";

        if ($conn->query($updateSql) === TRUE) {
            $alert = '
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-4 rounded-md flex justify-between items-center mb-4">
                    <span>
                        Your Profile Has Been Updated successfully.
                    </span>
                    <button class="text-green-700 hover:text-green-900 text-2xl" onclick="changePageLocation();">×</button>
                </div>';
        } else {
            echo "Error updating member details: " . $conn->error;
        }
    } else {
        $alert = '
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-4 rounded-md flex justify-between items-center mb-4">
			<span>
            The email address you provided is already registered in our system. Please use a different email address .

			</span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
                </div>';
    }
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

</head>

<body class="bg-gray-200">
    <?php
    require_once './navaside.php';
    ?>




    <div class=" registration-container mt-24 md:ml-64">
        <?php echo $alert; ?>

        <div class="flex justify-center items-start p-10 md:h-screen">
            <div class="w-full  md:bg-gray-700 md:p-8 rounded-md md:shadow-md">
                <div class="text-2xl font-semibold mb-4 text-black md:text-white">Update Your Profile</div>
                <div class="content">
                    <!-- UPDATE FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="user-details flex flex-wrap justify-between mb-4">
                            <!-- Full Name -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Full Name</span>
                                <input type="text" name="full-name" placeholder="Enter your name" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['FullName']; ?>" />
                            </div>

                            <!-- Date of Birth -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Date of Birth</span>
                                <input type="date" name="dob" placeholder="Enter your date of birth" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" onchange="calculateAge(this.value)" value="<?php echo $row['Dob']; ?>" />
                            </div>

                            <!-- Phone Number -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Phone Number</span>
                                <input type="tel" name="phone-number" placeholder="Enter your phone number" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['MobileNo']; ?>" />
                            </div>

                            <!-- Address -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['Address']; ?>" />
                            </div>

                            <!-- Email -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" value="<?php echo $row['Email']; ?>" />
                            </div>

                            <!-- Shift -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Shift</span>
                                <select name="shift" required class="w-full px-3 py-2.5 placeholder-gray-500 border border-gray-300 rounded">
                                    <option value="">Select your Shift</option>
                                    <option value="Morning" <?php echo ($row['Shift'] === 'Morning') ? 'selected' : ''; ?>>Morning</option>
                                    <option value="Day" <?php echo ($row['Shift'] === 'Day') ? 'selected' : ''; ?>>Day</option>
                                    <option value="Evening" <?php echo ($row['Shift'] === 'Evening') ? 'selected' : ''; ?>>Evening</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Password</span>
                                <div class="password-input relative">
                                    <input type="password" name="password" placeholder="Enter your password" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" id="password-field" readonly value="<?php echo $row['LoginPassword']; ?>" />
                                </div>
                            </div>

                            <!-- Age -->
                            <div class="input-box mb-3 w-full md:w-[49%]">
                                <span class="text-sm text-black md:text-white md:text-lg font-medium">Age</span>
                                <input type="number" name="age" placeholder="Enter your age" required class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" readonly value="<?php echo $row['Age']; ?>" />
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="gender-details flex items-center justify-start mb-4">
                            <span class="text-sm text-black md:text-white md:text-lg font-medium mr-2">Gender</span>
                            <div class="category flex">
                                <label for="male" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Male" id="male" class="mr-1" required <?php echo ($row['Sex'] === 'Male') ? 'checked' : ''; ?>>
                                    <span class="gender text-black md:text-white">Male</span>
                                </label>
                                <label for="female" class="flex items-center cursor-pointer mr-4">
                                    <input type="radio" name="gender" value="Female" id="female" class="mr-1" required <?php echo ($row['Sex'] === 'Female') ? 'checked' : ''; ?>>
                                    <span class="gender text-black md:text-white">Female</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="button">
                            <input type="submit" name="submit" value="Update" class="h-10 w-full rounded text-black text-lg font-semibold bg-gray-300 hover:bg-black hover:text-white cursor-pointer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script>
        function changePageLocation() {
            window.location.href = './profile.php';
        }
    </script>
    <script src="../admin/javascript/form.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>


</body>

</html>