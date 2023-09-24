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

// Check if trainer ID is provided in the request
if (isset($_GET['id'])) {
  $trainerID = $_GET['id'];

  // Construct the SQL statement 
  $sql = "DELETE FROM Trainers WHERE TrainerID = '$trainerID'";

  // Execute the SQL statement
  if ($conn->query($sql) === TRUE) {
    $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
                Trainer deleted successfully.  
            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="changePageLocation();">×</button>
        </div>';
  } else {
    $alert = '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md flex justify-between items-center mb-4">
            <span>
                Failed to delete Trainer.
            </span>
            <button class="text-red-700 hover:text-red-900 text-2xl" onclick="changePageLocation();">×</button>
        </div>';
  }
}



// Fetch data from the database
$query = "SELECT TrainerID, FullName, Sex, MobileNo, Email, Address, Shift, Dob, Age FROM Trainers";
$result = $conn->query($query);

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







  <div class="flex flex-col ml-64 mt-24 ">
    <?php echo $alert; ?>

    <div class="overflow-x-auto sm:-mx-6">
      <div class="inline-block py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="text-center text-sm font-light">
            <thead class="border-b bg-neutral-900 font-medium text-white ">
              <tr>
                <th scope="col" class="px-[20px] py-4">S.N</th>
                <th scope="col" class="px-[20px] py-4">Trainer ID</th>
                <th scope="col" class="px-[20px] py-4">Full Name</th>
                <th scope="col" class="px-[20px] py-4">Sex</th>
                <th scope="col" class="px-[20px] py-4">Mobile No</th>
                <th scope="col" class="px-[20px] py-4">Email</th>
                <th scope="col" class="px-[20px] py-4">Address</th>
                <th scope="col" class="px-[20px] py-4">Shift </th>
                <th scope="col" class="px-[20px] py-4">DOB</th>
                <th scope="col" class="px-[20px] py-4">Age</th>
                <th scope="col" class="px-[20px] py-4">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              // Iterate over the fetched data and display it in the table rows
              if ($result->num_rows > 0) {

                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  echo "<tr class='border-b dark:border-neutral-500'>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4 font-medium'>" . $count . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['TrainerID'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['FullName'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Sex'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['MobileNo'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Email'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Address'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Shift'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Dob'] . "</td>";
                  echo "<td class='whitespace-nowrap px-[20px] py-4'>" . $row['Age'] . "</td>";


                  echo "<td class='py-4 px-[20px]'>
                                <a href='javascript:void(0);' onclick='showConfirmation(" . $row['TrainerID'] . ");'
                                class='text-white bg-red-600 hover:bg-red-800 py-2 px-4 rounded inline-flex items-center'>
                                 Delete <i class='fas fa-trash-alt ml-2'></i>
                                 </a>
                              </td>";
                  echo "</tr>";
                  $count++;
                }
              } else {
                echo "<tr><td class='whitespace-nowrap px-[20px] py-4'>No members found. </td></tr>";
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
      <p style="font-size: 18px; margin-bottom: 20px;">Do you really want to delete this trainer details?</p>
      <button onclick="deleteTrainer()" style="background-color: #e53e3e; color: white; padding: 10px 50px; border: none; border-radius: 5px; margin-right: 10px; cursor: pointer;">Yes</button>
      <button onclick="cancelDelete()" style="background-color: #718096; color: white; padding: 10px 50px; border: none; border-radius: 5px; cursor: pointer;">No</button>
    </div>
  </div>

  <script>
    var trainerdelete = null;

    function showConfirmation(trainerID) {
      trainerdelete = trainerID;
      var confirmationDiv = document.getElementById('confirmationDiv');
      confirmationDiv.style.display = 'block';
    }

    function deleteTrainer() {
      if (trainerdelete !== null) {
        var currentPage = '<?php echo $_SERVER['PHP_SELF']; ?>';
        window.location.href = currentPage + '?id=' + trainerdelete;
      }
    }

    function cancelDelete() {
      var confirmationDiv = document.getElementById('confirmationDiv');
      confirmationDiv.style.display = 'none';
      trainerdelete = null;
    }
  </script>
  <script>
    function changePageLocation() {
      window.location.href = './listtrainer.php';
    }
  </script>



  <script src="./javascript/navaside.js"></script>

</body>

</html>