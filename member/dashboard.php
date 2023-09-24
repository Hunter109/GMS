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
$memberID = $_SESSION['member_id'];

$query = "SELECT * FROM Members WHERE MemberID = '$memberID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$expiryDate = new DateTime($row['ExpiryDate']);
// Get the current date as a DateTime object
$currentDate = new DateTime();
$remainingDays = $currentDate->diff($expiryDate)->days;


$joinedclass = "SELECT COUNT(*) as rowCount FROM joinedclass WHERE memberid = '$memberID'";
$joinedcount = $conn->query($joinedclass);
$rowclass = $joinedcount->fetch_assoc();
$rowCount = $rowclass['rowCount'];


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

   <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo/logo (1).png">
   <!-- FAVICON LINK END -->



   <!-- CDN AND CSS LINK  -->
   <script src="https://cdn.tailwindcss.com"></script>

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





   <!-- CDN AND CSS LINK END -->

   <!-- LINK SECTION  ENDS -->




</head>


<body>


   <?php
   require_once './navaside.php';
   ?>








   <div class="flex-1 md:ml-64 mt-20">
      <div class="flex flex-wrap">
         <!-- Silver -->
         <div class="w-full lg:w-1/3 p-2">
            <div class="bg-blue-500 shadow-md rounded-lg p-6 m-2 hover:bg-blue-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
               <div class="flex-1 ml-4">
                  <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">Remaining Days</h2>
                  <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $remainingDays; ?></p>
               </div>
               <div class="flex flex-col items-center">
                  <i class="material-icons text-gray-100 sm:text-xl lg:text-4xl">calendar_today</i>
                  <a href="./profile.php" class="text-white hover:underline md:text-xl mt-2">View</a>
               </div>
            </div>
         </div>

         <!-- Golden -->
         <div class="w-full lg:w-1/3 p-2">
            <div class="bg-red-500 shadow-md rounded-lg p-6 m-2 hover:bg-red-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
               <div class="flex-1 ml-4">
                  <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">Membership </h2>
                  <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $row['MembershipType']; ?></p>
               </div>
               <div class="flex flex-col items-center">
                  <i class="material-icons text-yellow-100 sm:text-xl lg:text-4xl">star</i>
                  <a href="./profile.php" class="text-white hover:underline md:text-xl mt-2">View</a>
               </div>
            </div>
         </div>

         <!-- Platinum -->
         <div class="w-full lg:w-1/3 p-2">
            <div class="bg-green-500 shadow-md rounded-lg p-6 m-2 hover:bg-green-400 flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1">
               <div class="flex-1 ml-4">
                  <h2 class="text-lg sm:text-xl lg:text-3xl font-bold mb-2 text-white">Total class</h2>
                  <p class="text-xl sm:text-xl lg:text-4xl font-bold text-white"><?php echo $rowCount; ?></p>
               </div>
               <div class="flex flex-col items-center">
                  <i class="material-icons text-purple-100 sm:text-xl lg:text-4xl">school</i>
                  <a href="./joinedclass.php" class="text-white hover:underline md:text-xl mt-2">View</a>
               </div>
            </div>
         </div>
      </div>
   </div>




   <div class="bg-gray-200 p-4 ml-4 md:ml-64 mt-4 md:mt-8">
      <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
         <div class="w-full md:w-1/2 p-2 md:p-4 lg:p-6">
            <?php
            include './chartbar.php';

            ?>
            <p class="text-center mt-2 text-black">Gymnasium Stats in Bar Chart</p>
         </div>

         <div class="w-full md:w-1/2  md:p-4 lg:p-6">
            <div class="flex flex-col items-center">
               <?php
               include './chartpie.php';

               ?>
               <p class="text-center md:mt-2 text-black">Gymnasium Stats in Donut Pie Chart</p>
            </div>
         </div>
      </div>
   </div>
   <!-- Membership type chart js End  -->








   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>






</body>

</html>