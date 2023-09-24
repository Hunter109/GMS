<?php
include 'session.php';
$alert = '';


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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $memberID = $_SESSION['member_id'];
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['password'];
    $newPassword1 = $_POST['password1'];

    // Hash the old and new passwords using MD5
    $Password = md5($oldPassword);
    $latestPassword = md5($newPassword);

    // die();


    // Check if the old password matches the stored password for the current user
    $query = "SELECT * FROM Members WHERE MemberID = '$memberID'";
    $result = $conn->query($query);


    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['LoginPassword'];



        if ($newPassword === $newPassword1) {

            // Verify the old password
            if ($Password === $storedPassword) {
                // Update the password in the database
                $updateQuery = "UPDATE Members SET LoginPassword = '$latestPassword' WHERE MemberID = '$memberID'";

                //  password  changed sucessfulyy 
                if ($conn->query($updateQuery) === TRUE) {
                    $alert = '
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mt-12 rounded-md flex justify-between items-center mb-4">
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
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-12 rounded-md flex justify-between items-center mb-4">
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
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-12 rounded-md flex justify-between items-center mb-4">
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





    <div class="login-container sm:ml-64">
        <div class="flex md:items-center justify-center min-h-screen  bg-gray-300">
            <div class="w-full max-w-xl ">
                <?php echo $alert; ?>
                <div class="md:bg-white md:shadow-md rounded-lg px-8 py-8">
                    <img src="../assets/image/logo.png" alt="" class="invisible sm:visible">

                    <div class="text-center my-8">
                        <h2 class="text-2xl font-bold text-red-700 ">Change <span class="text-black">Password</span></h2>
                    </div>
                    <!-- USER FORM -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="mb-4">
                            <label for="username" class="block mb-2 text-sm  md:text-lg font-medium text-black">Old
                                Password</label>
                            <input id="username" type="text" name="oldpassword" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded " placeholder="Enter Old Password">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm  md:text-lg font-medium text-black">New Password</label>

                            <input id="passwordInput" type="password" name="password" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded " placeholder="Enter New Password" />
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

                        </div>
                        <div class="flex items-center justify-between mb-6">

                            <input type="submit" name="submit" value="Change password" class="w-full py-2 px-4 text-black font-bold rounded bg-gray-200 hover:bg-black hover:text-white cursor-pointer md:text-lg" />
                        </div>
                    </form>

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
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>













</body>

</html>