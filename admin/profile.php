<?php
$alert = '';
ini_set('session.gc_maxlifetime', 1440);
ini_set('session.cookie_lifetime', 1440);

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: http://localhost/GMS/admin.php");
}

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
$adminID = $_SESSION['admin_id'];

$query = "SELECT * FROM Admins WHERE AdminID = '$adminID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminID = $_SESSION['admin_id'];
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['password'];
    $newPassword1 = $_POST['password1'];


    // Hash the old and new passwords using MD5
    $Password = md5($oldPassword);
    $latestPassword = md5($newPassword);
    echo $adminID;
    echo $Password;
    echo $latestPassword;
    // die();


    // Check if the old password matches the stored password for the current user
    $query = "SELECT * FROM Admins WHERE AdminID = '$adminID'";
    $result = $conn->query($query);


    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['LoginPassword'];
        if ($newPassword === $newPassword1) {

            // Verify the old password
            if ($Password === $storedPassword) {

                // Update the password in the database
                $updateQuery = "UPDATE Admins SET LoginPassword = '$latestPassword' WHERE AdminID = '$adminID'";
                //  password  changed sucessfulyy 

                if ($conn->query($updateQuery) === TRUE) {
                    $alert = '
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
                    <span>
                        Password changed successfully.
                    </span>
                    <button class="text-green-700 hover:text-green-900 text-2xl" onclick="redirectToLogout();">×</button>
                </div>';
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            }
            // old password doestnot match 

            else {
                $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
            The password you entered does not match your old password. Please double-check and try again.


            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
        </div>';
            }
        }

        // new password and confirm password doestnot match 

        else {
            $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
             The new password and the confirm password do not match. Please check again and try once more.

                 </span>
                 <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
        </div>';
        }
    } else {
        $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
                    user not found
            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="location.reload();">×</button>
        </div>';
    }
}

// Fetch data from the database

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

    <!-- LINK SECTION  ENDS -->




</head>

<body class=" bg-gray-200">
    <?php
    require_once './navaside.php';
    ?>

    <div class="flex ml-64 mt-24">

        <div class="w-[48%]">
            <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg bg-gray-200 hover:bg-black hover:text-white cursor-pointer font-semibold group transition duration-75 " id="own-profile-link">
                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true">account_circle</i>
                <span class="ml-3">Own Profile</span>
            </a>
        </div>

        <div class=" ml-2 w-[48%]">
            <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg bg-gray-200 hover:bg-black hover:text-white cursor-pointer font-semibold group transition duration-75" id="change-password-link">
                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true">lock</i>
                <span class="ml-3">Change Password</span>
            </a>
            <!-- Your content for the second half of the screen goes here -->
        </div>
    </div>



    <div id="profile-div" class="ml-64  mt-4">
        <?php echo $alert; ?>
        <div class="bg-white rounded-lg shadow-lg p-4 w-70">
            <div class="flex items-center space-x-4">
                <div class="flex-1 ml-4">
                    <table class="w-full table-auto mt-4 border border-black border-2">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="font-semibold p-4 border border-black border-2">Admin</th>
                                <th class="font-semibold p-4 border border-black border-2">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 border border-black border-2 text-center">Admin ID</td>
                                <td class="p-4 border border-black border-2 text-center"><b><?php echo $row['AdminID']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 border border-black border-2 text-center">Full Name</td>
                                <td class="p-4 border border-black border-2 text-center"><b><?php echo $row['FullName']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 border border-black border-2 text-center">Mobile No</td>
                                <td class="p-4 border border-black border-2 text-center"><b><?php echo $row['MobileNo']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 border border-black border-2 text-center">Address</td>
                                <td class="p-4 border border-black border-2 text-center"><b><?php echo $row['Address']; ?></b></td>
                            </tr>
                            <tr class="even:bg-gray-200 odd:bg-gray-100">
                                <td class="font-semibold p-4 border border-black border-2 text-center">Email</td>
                                <td class="p-4 border border-black border-2 text-center"><b><?php echo $row['Email']; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>







    <!-- Content for the change password div -->

    <div id="change-password-div" class="hidden ml-64 mt-2">


        <div class="flex  justify-center min-h-screen  bg-gray-300">

            <div class="w-full max-w-xl ">
                <div class="md:bg-white md:shadow-md rounded-lg px-8 py-8 mt-10">
                    <img src="../assets/image/logo.png" alt="" class="invisible sm:visible">
                    <div class="text-center my-8">

                        <h2 class="text-2xl font-bold text-red-700 ">CHANGE <span class="text-black">PASSWORD</span></h2>
                    </div>
                    <!-- ADMIN FORM  -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <div class="mb-4">
                            <label for="username" class="block mb-2 text-sm  md:text-lg font-medium text-black">Old
                                Password</label>
                            <input id="oldpass" type="text" name="oldpassword" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded " placeholder=" Enter Old Password">
                        </div>
                        <div class="mb-6">
                            <label for="New Password" class="block mb-2 text-sm  md:text-lg font-medium text-black">New Password</label>

                            <input id="passwordInput" type="password" name="password" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded" placeholder="Enter New Password" />
                            <div class="m-2">
                                <input type="checkbox" id="showPasswordToggle" onchange="togglePasswordVisibility()" />
                                <label for="showPasswordToggle">Show Password</label>

                            </div>
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm  md:text-lg font-medium text-black">Confirm New Password
                                </label>

                                <input id="passwordInput1" type="password" name="password1" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded " placeholder="Enter New Password" />
                                <div class="m-2">
                                    <input type="checkbox" id="showPasswordToggle1" onchange="togglePasswordVisibility1()" />
                                    <label for="showPasswordToggle">Show Password</label>

                                </div>

                            </div>
                            <div class="flex items-center justify-between mb-6">

                                <input type="submit" name="submit" value="Reset Password" class="w-full py-2 px-4 text-black font-bold rounded bg-gray-200 hover:bg-black hover:text-white cursor-pointer md:text-lg" />

                            </div>
                    </form>
                    <!-- ADMIN FORM  -->


                </div>
            </div>
        </div>

    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('passwordInput');
            const showPasswordToggle = document.getElementById('showPasswordToggle');

            if (showPasswordToggle.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        function togglePasswordVisibility1() {
            const passwordInput = document.getElementById('passwordInput1');
            const showPasswordToggle = document.getElementById('showPasswordToggle1');

            if (showPasswordToggle.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        function redirectToLogout() {
            // Redirect the user to logout.php
            window.location.href = 'logout.php';
        }
    </script>
    <script src="./javascript/navaside.js"></script>
    <script>
        const ownProfileLink = document.getElementById('own-profile-link');
        const changePasswordLink = document.getElementById('change-password-link');
        const profileDiv = document.getElementById('profile-div');
        const changePasswordDiv = document.getElementById('change-password-div');

        ownProfileLink.addEventListener('click', () => {
            // Show the profile div and hide the change password div
            profileDiv.style.display = 'block';
            changePasswordDiv.style.display = 'none';

            // Remove the 'bg-black' and 'hover:text-white' classes from the change password link
            changePasswordLink.classList.remove('bg-black', 'text-white');

            // Add the 'bg-black' and 'hover:text-white' classes to the own profile link
            ownProfileLink.classList.add('bg-black', 'text-white');
        });

        changePasswordLink.addEventListener('click', () => {
            // Show the change password div and hide the profile div
            changePasswordDiv.style.display = 'block';
            profileDiv.style.display = 'none';

            // Remove the 'bg-black' and 'hover:text-white' classes from the own profile link
            ownProfileLink.classList.remove('bg-black', 'text-white');

            // Add the 'bg-black' and 'hover:text-white' classes to the change password link
            changePasswordLink.classList.add('bg-black', 'text-white');
        });
    </script>


    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>











</body>

</html>