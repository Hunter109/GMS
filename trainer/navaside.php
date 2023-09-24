<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200  dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-600 rounded-lg sm:hidden hover:bg-black focus:outline-none focus:ring-2 focus:ring-white   ">
                    <span class="sr-only">Open sidebar</span>
                    <i class="material-icons  ">menu</i> <!-- Replace with Material icon -->
                </button>
                <a href="utsabwagle.com.np" target="_blank" class="flex ml-2 md:mr-24">
                    <img src="../assets/image/logo.png" class="h-8 mr-3" alt="FlowBite Logo" />

                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-black" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="../assets/image/isha.jpeg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none  divide-y divide-gray-100 rounded shadow bg-black " id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-white " role="none">
                                <?php echo $row['FullName']; ?>
                            </p>
                            <p class="text-sm font-medium text-white truncate " role="none">
                                <?php echo $row['Email']; ?>
                            </p>
                            <p class="text-sm font-medium text-white truncate " role="none">
                                <span>Trainer ID:</span>
                                <?php echo $trainerID; ?>
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="./dashboard.php" class="block px-4 py-2 text-sm text-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem"> <?php echo $row['Shift']; ?> Shift</a>
                            </li>
                            <li>
                                <a href="./profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">User profile</a>
                            </li>

                            <li>
                                <a href="./logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-black  sm:translate-x-0 " aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-black">
        <ul class="space-y-2 font-medium ">
            <li class="pb-2">
                <a href="dashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">dashboard</i>
                    <span class="ml-3">Trainer Dashboard</span>
                </a>
            </li>
            <li class="pb-2">
                <a href="./addclass.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">fitness_center</i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Create Classes</span>
                </a>
            </li>

            <li class="pb-2">
                <a href="./listclass.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">list_alt</i>
                    <span class="flex-1 ml-3 whitespace-nowrap"> List Classes</span>
                </a>

            </li>

            <li class="pb-2">
                <a href="./adddiet.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">sports_gymnastics</i>
                    <span class="flex-1 ml-3 whitespace-nowrap">ADD Diet and Workout</span>
                </a>
            </li>

            <li class="pb-2">
                <a href="listdiet.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">local_dining</i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Diet and Workout Plans</span>
                </a>
            </li>




            <li class="pb-2">
                <a href="./updateprofile.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">edit</i>
                    <span class="flex-1 ml-3 whitespace-nowrap"> Update Profile</span>
                </a>
            </li>
            <li class="pb-2">
                <a href="./changepassword.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">vpn_key</i>
                    <span class="flex-1 ml-3 whitespace-nowrap"> Change Password</span>
                </a>
            </li>

            <li class="pb-2">
                <a href="./profile.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="material-icons w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">account_circle</i>
                    <span class="flex-1 ml-3 whitespace-nowrap">My Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>