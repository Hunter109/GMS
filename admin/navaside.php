<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <!-- Navigation content -->
    <div class="container mx-auto pl-4 py-3 flex items-center justify-between">
        <div>
            <a href="https://utsabwagle.com.np" target="_blank" class="flex items-center text-white">
                <img src="../assets/image/logo.png" class="h-10 mr-3" alt="Gymnasium Management System" />
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Logout Link -->
            <a href="logout.php" class="flex items-center p-4 text-gray-900 rounded-lg  bg-gray-200 hover:bg-black hover:text-white cursor-pointer font-semibold group">
                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true">exit_to_app</i>

                <span class="ml-3">Logout</span>
            </a>


            <!-- My Profile Link -->
            <a href="profile.php" class="flex items-center p-4 text-gray-900 rounded-lg  bg-gray-200 hover:bg-black hover:text-white cursor-pointer font-semibold group">
                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true">account_circle</i>
                <span class="ml-3">View Profile</span>
            </a>


        </div>
    </div>
</nav>












<div class="flex">
    <aside id="logo-sidebar" class="fixed left-0 w-60 h-screen bg-black pt-24 z-ince" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-black">
            <ul class="space-y-2 font-medium">
                <!-- Dashboard -->
                <li>
                    <a href="./dashboard.php" class="flex items-center p-4 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">dashboard</i>
                        <span class="ml-3">Admin Dashboard</span>
                    </a>
                </li>





                <!-- Member -->
                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleMemberOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person</i>
                        <span class="ml-3">Member</span>
                        <i class="material-icons ml-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>
                    </a>
                    <ul class="pl-8" id="MemberOptions" style="display: none;">
                        <li>
                            <a href="./listmember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">people</i>
                                <span class="ml-3">Member List</span>
                            </a>
                        </li>
                        <li>
                            <a href="./updatemember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">edit</i>
                                <span class="ml-3">Member Update</span>
                            </a>
                        </li>
                        <li>
                            <a href="./removemember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_remove_alt</i>
                                <span class="ml-3">Member Removed</span>
                            </a>
                        </li>
                        <li>
                            <a href="./addmember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3">Add Member</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Payment -->
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="togglePaymentOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">payment</i>
                        <span class="ml-3">Payment</span>
                        <i class="material-icons ml-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>
                    </a>
                    <ul class="pl-8" id="paymentOptions" style="display: none;">
                        <li>
                            <a href="./memberpay.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fas fa-credit-card flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true"></i>
                                <span class="ml-3">Make Payment</span>
                            </a>
                        </li>
                        <li>
                            <a href="listpayment.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fas fa-list flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true"></i>
                                <span class="ml-3">Payment List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Member Request -->
                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleRequestOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">people</i>
                        <span class="ml-3">Member Request</span>
                        <span id="notification-counter" class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $requestcount; ?></span>

                        <i class="material-icons ml-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>


                    </a>
                    <ul class="pl-8" id="Request" style="display:none;">
                        <li>
                            <a href="./listrequest.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3">Request List</span>
                                <span id="notification-counter" class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $requestcount; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="./approvedrequest.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">check_circle</i>
                                <span class="ml-3">Approved</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Package -->
                <li>
                    <a href="./package.php" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">fitness_center</i>
                        <span class="ml-3">Package</span>
                    </a>
                </li>

                <!-- Trainer -->
                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleTrainerOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">directions_run</i>
                        <span class="ml-3">Trainer</span>
                        <i class="material-icons ml-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>
                    </a>
                    <ul class="pl-8" id="trainerOptions" style="display: none;">
                        <li>
                            <a href="./listtrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">people</i>
                                <span class="ml-3">Trainer List</span>
                            </a>
                        </li>
                        <li>
                            <a href="./updatetrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">edit</i>
                                <span class="ml-3">Trainer Update</span>
                            </a>
                        </li>
                        <li>
                            <a href="./removetrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_remove_alt</i>
                                <span class="ml-3">Trainer Removed</span>
                            </a>
                        </li>
                        <li>
                            <a href="./addtrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3">Add Trainer</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Admin -->
                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleAdminOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">security</i>
                        <span class="ml-3">Admin</span>
                        <i class="material-icons ml-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>
                    </a>
                    <ul class="pl-8" id="AdminOptions" style="display: none;">
                        <li>
                            <a href="./listadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">people</i>
                                <span class="ml-3">Admin List</span>
                            </a>
                        </li>
                        <li>
                            <a href="./updateadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">edit</i>
                                <span class="ml-3">Admin Update</span>
                            </a>
                        </li>
                        <li>
                            <a href="./removeadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_remove_alt</i>
                                <span class="ml-3">Admin Removed</span>
                            </a>
                        </li>
                        <li>
                            <a href="./addadmin.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3">Add Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Member Forgot Password  -->
                <!-- Member Reset -->
                <!-- Member Reset -->
                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleMemberResetOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person</i>
                        <span class="ml-3">Member Reset</span>
                        <span id="notification-counter" class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $memberResetCount; ?></span>
                        <i class="material-icons ml-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>

                    </a>
                    <ul class="pl-8" id="MemberResetOptions" style="display: none;">
                        <li>
                            <a href="./resetmember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3"> Reset Request</span>
                                <span id="notification-counter" class="ml-1 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $memberResetCount; ?></span>

                            </a>
                        </li>
                        <li>
                            <a href="./passwordresetmember.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">check_circle</i>
                                <span class="ml-3">Reset Password</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <!-- Trainer reset -->

                <li>
                    <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" onclick="toggleTrainerResetOptions()">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">directions_run</i>
                        <span class="ml-3">Trainer Reset</span>
                        <span id="notification-counter" class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $trainerResetCount; ?></span>
                        <i class="material-icons ml-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">arrow_drop_down</i>

                    </a>
                    <ul class="pl-8" id="TrainerResetOptions" style="display: none;">
                        <li>
                            <a href="./resettrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person_add</i>
                                <span class="ml-3"> Reset Request</span>
                                <span id="notification-counter" class="ml-1 bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?php echo $trainerResetCount; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="./passwordresettrainer.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">check_circle</i>
                                <span class="ml-3"> Reset Password </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- My Profile -->
                <li>
                    <a href="profile.php" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="material-icons flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">account_circle</i>
                        <span class="ml-3">My Profile</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar content -->
    </aside>
</div>