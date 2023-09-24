<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership | Gymnasium Management System</title>

    <!-- LINK SECTION  -->

    <!-- FAVICON LINK  -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/logo/logo (1).png">
    <!-- FAVICON LINK END -->


    <!-- CDN AND CSS LINK  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/membership.css">
    <!-- CDN AND CSS LINK END -->

    <!-- LINK SECTION  ENDS -->


</head>

<body>
    <!-- HEADER CONTAINER  -->
    <header>
        <div class="header-info">
            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <span>Bharatpur-11, U-TEC Chowk , Chitwan</span>
            </div>
            <div class="phone">
                <i class="fas fa-phone"></i>
                <span> <a href="tel:+977-9865252767">9869896545 </a></span>
            </div>
            <div class="opening-hours">
                <i class="fas fa-clock bx-x"></i>
                <span>Sun-Fri: 5:00 AM - 9:00 PM</span>
            </div>
        </div>
    </header>
    <!-- HEADER CONTAINER  END -->


    <!-- NAVBAR CONTAINER  -->

    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="./assets/image/logo.png" alt="Gymnasium Management System" srcset="">
            </div>
            <ul class="links">
                <li><a class="active" href="./index.php">Home</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./membership.php">Membership</a></li>
                <li><a href="./contact.php">Contact Us</a></li>
            </ul>
            <a href="./login.php" class="action-btn">Login</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars "></i>
            </div>
        </div>

        <!--  MEDIA QUERY DROPDOWN -->
        <div class="dropdown_menu ">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./about.php">About Us</a></li>
            <li><a href="./membership.php">Membership</a></li>
            <li><a href="./contact.php">Contact Us</a></li>
            <a href="./login.php" class="action-btn">Login</a>
        </div>
        <!--  MEDIA QUERY DROPDOWN END-->
    </nav>
    <!-- NAVBAR  CONTAINER END -->

    <!-- MEMBERSHIP CONTAINER  -->
    <div class="membership-container">

        <!-- image with text  -->
        <div class="member">
            <div class="join-membership pt-[50%] ml-4 sm:pt-[25%] sm:ml-10 lg:pt-[22%] lg:ml-16" data-aos="fade-down-right">
                <h2 class=" py-2 text-xl  sm:text-2xl lg:text-6xl tracking-tight font-extrabold text-white text-left">
                    BECOME
                    A <span class="text-red-700">MEMBER</span></h2>
                <p class=" py-2 max-w-xs sm:max-w-sm  lg:max-w-md text-white text-sm sm:text-lg">

                    Be part of the Gymnasium tribe through our gym, classes, personal or group training. Whatever you
                    choose, we’re ready to welcome you to our family.
                </p>
            </div>
        </div>
        <!-- image with text end -->

        <!-- OPENING HOUR AND MEMBERSHUP RATE  -->
        <div class="flex flex-col  justify-evenly items-center  lg:flex-row">

            <!-- OPEN HOURS  -->
            <div class="open-hour py-1 m-4  rounded-lg  bg-gray-50 h-1/3  lg:h-64">
                <h2 class=" text-center text-xl  sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">
                    OPEN <span class="text-black">HOURS</span></h2>
                <p class="p-3 text-sm sm:text-base">If you feel tired and stressed after a working day, we are happy to
                    give you an enjoyable
                    and healthy
                    solution to find your balance again.</p>
                <ul class="p-3 font-semibold text-sm sm:text-base">
                    <li class="list-disc ml-2">Sun-Fri: 5:00 AM - 9:00 PM</li>
                    <li class="list-disc ml-2"> Saturday: Closed
                    </li>
                </ul>
            </div>
            <!-- OPEN HOURS END  -->


            <!-- MEMBERSHUP RATE  -->
            <div class="membership-rate py-1 m-4  rounded-lg  bg-gray-50 h-1/3 lg:h-64 ">
                <h2 class=" text-center text-xl  sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">
                    MEMBERSHIP<span class="text-black"> RATES</span></h2>
                <p class="p-3 text-sm sm:text-base">Our membership is cost effective, and packages are built to support
                    all budgets. We offer
                    monthly and yearly memberships. To know more about our rates, fill in our form, and a member from
                    our team will get back to you.</p>
            </div>
            <!-- MEMBERSHUP RATE END  -->
        </div>
        <!-- OPENING HOUR AND MEMBERSHUP RATE  -->



        <!-- MEMBERSHIP PRICING TABLE   -->
        <div id="pricing-table">
            <div class="table-list">
                <!-- INFO SECTION  -->
                <div class="max-w-screen-xl text-center mx-auto " data-aos="zoom-in">
                    <h2 class=" text-xl  sm:text-2xl lg:text-4xl m-4 tracking-tight font-extrabold text-red-700">
                        MEMBERSHIP <span class="text-black">PLANS</span></h2>
                    <p class="text-black  text-sm sm:text-xl">no matter at your fitness level is, let's find the fitness
                        membership options that works best for you.

                        We believe that fitness inspires people to go further in life. It takes dedication, guidance and
                        courage, but working in fitness is more than a paying job, it’s a choice to give people the
                        opportunity to lead a fearless and extraordinary life.


                    </p>
                </div>
                <!-- INFO SECTION END -->

                <!-- TABLE LAYER CONTAINER -->
                <div class=" px-6 py-6 mx-auto" data-aos="zoom-out">
                    <div class="flex flex-col items-center justify-center space-y-8 mb-14 lg:-mx-4 lg:flex-row lg:items-stretch lg:space-y-0">
                        <!-- SILVER MEMBERSHIP  -->
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-gray-50 border-2 border-black rounded-lg lg:mx-4">
                            <div class="flex-shrink-0">
                                <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-black uppercase rounded-lg hover:text-gray-500 cursor-pointer text-sm  sm:text-base  ">
                                    silver membership
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="pt-2 text-base md:text-4xl font-bold text-black uppercase ">
                                    RS 3000
                                </span>
                                <span class="text-black">
                                    /month
                                </span>
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 ">
                                    Unlimited gym access
                                </li>
                                <li class="text-gray-500 ">
                                    2 training program
                                </li>
                                <li class="text-gray-500 ">
                                    free fitness consultation </li>
                                <li class="text-gray-500 ">
                                    free wifi
                                </li>
                                <li class="text-gray-500 ">
                                    50% off drinks
                                </li>
                                <li class="text-gray-500 ">
                                    24x7 support

                                </li>
                            </ul>

                            <button onclick="window.location.href = './registration/registration.php';" class="inline-flex items-center justify-center px-4 py-2 font-semibold  uppercase  rounded-lg text-black bg-white hover:bg-black hover:text-white">
                                ENROLL NOW
                            </button>
                        </div>
                        <!-- SILVER MEMBERSHIP END -->

                        <!-- GOLDEN MEMBERSHIP  -->
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-gray-50 border-2 border-black rounded-lg lg:mx-4">
                            <div class="flex-shrink-0">
                                <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-black uppercase rounded-lg hover:text-yellow-600 cursor-pointer text-sm  sm:text-base  ">
                                    golden membership
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="pt-2 text-base md:text-4xl font-bold text-black uppercase ">
                                    RS 5000
                                </span>
                                <span class="text-black">
                                    /year
                                </span>
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 ">
                                    Unlimited gym access
                                </li>
                                <li class="text-gray-500 ">
                                    3 training program
                                </li>
                                <li class="text-gray-500 ">
                                    free fitness consultation </li>
                                <li class="text-gray-500 ">
                                    personal trainer </li>
                                <li class="text-gray-500 ">
                                    free wifi
                                </li>
                                <li class="text-gray-500 ">
                                    50% off drinks
                                </li>
                                <li class="text-gray-500 ">
                                    24x7 support

                                </li>
                            </ul>

                            <button onclick="window.location.href = './registration/registration.php';" class="inline-flex items-center justify-center px-4 py-2 font-semibold  uppercase  rounded-lg text-black bg-white hover:bg-black hover:text-white">
                                ENROLL NOW
                            </button>
                        </div>
                        <!-- GOLDEN MEMBERSHIP END  -->

                        <!-- PLATINIUM MEMBERSHIP  -->
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-gray-50 border-2 border-black rounded-lg lg:mx-4">
                            <div class="flex-shrink-0">
                                <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-black uppercase rounded-lg hover:text-purple-300 cursor-pointer text-sm sm:text-base">
                                    platinium membership
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="pt-2 text-base md:text-4xl font-bold text-black uppercase ">
                                    RS 10000
                                </span>
                                <span class="text-black">
                                    /Lifetime
                                </span>
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 ">
                                    Unlimited gym access
                                </li>
                                <li class="text-gray-500 ">
                                    4 training program
                                </li>
                                <li class="text-gray-500 ">
                                    free fitness consultation </li>
                                <li class="text-gray-500 ">
                                    personal trainer </li>
                                <li class="text-gray-500 ">
                                    free wifi
                                </li>
                                <li class="text-gray-500 ">
                                    50% off drinks
                                </li>
                                <li class="text-gray-500 ">
                                    24x7 support

                                </li>
                            </ul>

                            <button onclick="window.location.href = './registration/registration.php';" class="inline-flex items-center justify-center px-4 py-2 font-semibold  uppercase  rounded-lg text-black bg-white hover:bg-black hover:text-white">
                                ENROLL NOW
                            </button>
                        </div>
                        <!-- PLATINIUM MEMBERSHIP  -->
                    </div>
                </div>
                <!-- TABLE LAYER CONTAINER  END -->

            </div>
        </div>
        <!-- MEMBERSHIP PRICING TABLE END  -->





        <!-- OUR TEAM  -->
        <div class="bg-black ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <!-- INFO SECTION  -->
                <div class="mx-auto  text-center mb-8 lg:mb-16" data-aos="fade-left">
                    <h2 class="mb-4 text-xl  sm:text-2xl lg:text-4xl tracking-tight font-extrabold text-red-700">Our
                        <span class="text-white">
                            Teams
                        </span>
                    </h2>
                    <p class="font-light text-white   text-sm  sm:text-xl ">Meet our dedicated team of fitness
                        experts who are passionate about helping you reach your fitness goals. At our gym, we believe in
                        providing personalized guidance and support to ensure you achieve optimal results. Our team
                        consists of experienced trainers, nutritionists, and wellness professionals who are committed to
                        assisting you on your fitness journey.

                    </p>
                </div>
                <!-- INFO SECTION END  -->

                <!-- TEAM BOX CONTAINER  -->
                <div class="grid gap-10 mb-6 lg:mb-16 md:grid-cols-2 " data-aos="fade-right">

                    <!-- UTSAV BOX  -->
                    <div class="items-center rounded-lg   sm:flex  ">
                        <a href="#">
                            <img class=" w-[700px] rounded-md  hover:scale-105 transition duration-300 ease-in-out" src="./assets/image/utsav.jpeg" alt="Utsav Wagle">
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-white">
                                <a href="#" class="text-white">Utsav Wagle</a>
                            </h3>
                            <span class="text-white italic">Personal Trainer

                            </span>
                            <p class="mt-3 mb-4 font-light text-white text-sm sm:text-base">Our personal trainers will
                                create customized workout plans and provide one-on-one guidance to help you maximize
                                your fitness potential.</p>
                            <ul class="flex space-x-4 sm:mt-0">
                                <li>
                                    <a href="https://github.com/Hunter109 " target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-github text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/utsav_wagle/" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-instagram text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/utsav-wagle-a4847a270/" target="_blank" class="text-gray-500  hover:text-white">
                                        <i class="fab fa-linkedin text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/4nonymous.Hunter.109/" target="_blank" class="text-gray-500 hover:text-white ">
                                        <i class="fab fa-facebook-f text-2xl"></i>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- UTSAV BOX END  -->

                    <!-- GUPTA BOX  -->
                    <div class="items-center  rounded-lg   sm:flex  ">
                        <a href="#">
                            <img class="w-[700px] rounded-md hover:scale-105 transition duration-300 ease-in-out " src="./assets/image/khizits.jpeg" alt="Kshitiz">
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tigh text-white">
                                <a href="#" class="text-white">Kshitiz
                                    Gupta</a>
                            </h3>
                            <span class="text-white italic">Group Fitness Trainer



                            </span>
                            <p class="mt-3 mb-4 font-light text-white text-sm sm:text-base">Our group fitness trainers
                                will lead energizing and motivating group
                                workouts, pushing you to new levels of strength and endurance.
                            </p>
                            <ul class="flex space-x-4 sm:mt-0">
                                <li>
                                    <a href="https://www.facebook.com/kshitiz.gupta.54hiphop" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-github text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/kshitiz.gupta.54hiphop" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-instagram text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/kshitiz.gupta.54hiphop" target="_blank" class="text-gray-500  hover:text-white">
                                        <i class="fab fa-linkedin text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/kshitiz.gupta.54hiphop" target="_blank" class="text-gray-500 hover:text-white ">
                                        <i class="fab fa-facebook-f text-2xl"></i>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- GUPTA BOX END  -->

                    <!-- ISHA BOX  -->
                    <div class="items-center rounded-lg   sm:flex">
                        <a href="#">
                            <img class="w-[700px] rounded-md hover:scale-105 transition duration-300 ease-in-out" src="./assets/image/isha.jpeg" alt="Isha Kandel">
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-white">
                                <a href="#" class="text-white">Isha Kandel</a>
                            </h3>
                            <span class="text-white italic">Yoga Instructor



                            </span>
                            <p class="mt-3 mb-4 font-light text-white text-sm sm:text-base">Our yoga instructors will
                                guide you through
                                various yoga poses and breathing techniques, promoting flexibility, relaxation, and
                                inner peace.

                            </p>
                            <ul class="flex space-x-4 sm:mt-0">
                                <li>
                                    <a href="https://www.facebook.com/bee.sa.7547" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-github text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/bee.sa.7547" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-instagram text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/bee.sa.7547" target="_blank" class="text-gray-500  hover:text-white">
                                        <i class="fab fa-linkedin text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/bee.sa.7547" target="_blank" class="text-gray-500 hover:text-white ">
                                        <i class="fab fa-facebook-f text-2xl"></i>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ISHA BOX END  -->

                    <!-- DIPEN BOX -->
                    <div class="items-center  rounded-lg   sm:flex ">
                        <a href="#">
                            <img class="w-[700px] rounded-md hover:scale-105 transition duration-300 ease-in-out " src="./assets/image/dipen.jpeg" alt="Bonnie Avatar">
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tigh text-white">
                                <a href="#" class="text-white">Dipen Raut</a>
                            </h3>
                            <span class="text-white italic">Nutritionist



                            </span>
                            <p class="mt-3 mb-4 font-light text-white text-sm sm:text-base">Our nutritionists will
                                educate you on healthy eating habits, create personalized meal plans, and offer
                                nutritional guidance to support your fitness goals.</p>
                            <ul class="flex space-x-4 sm:mt-0">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100011363378451" target="_blank" class="text-gray-500  hover:text-white ">
                                        <i class="fab fa-github text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100011363378451" target="_blank" class="text-gray-500  hover:text-white  ">
                                        <i class="fab fa-instagram text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100011363378451" target="_blank" class="text-gray-500  hover:text-white">
                                        <i class="fab fa-linkedin text-2xl"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100011363378451" target="_blank" class="text-gray-500 hover:text-white ">

                                        <i class="fab fa-facebook-f text-2xl"></i>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- DIPEN BOX END  -->

                </div>
                <!-- TEAM BOX CONTAINER END  -->
            </div>
        </div>
        <!-- OUR TEAM END -->





        <!-- IMAGE WITH TEXT -->
        <div class="my-1  bg-black ">
            <div class="training-member flex flex-col items-center justify-center ">
                <h2 class="  py-12 text-xl  sm:text-2xl md:text-4xl lg:text-5xl tracking-tight font-bold text-white text-center">
                    Plan Your Daily Training & Workouts
                </h2>
                <button type="button" onclick="window.location.href = './registration/registration.php';" class=" ml-2 mt-2  bg-red-700 hover:bg-red-800  font-medium rounded-full text-sm px-10 py-3 text-center  text-white ">Enroll
                    Today</a>
                </button>

            </div>
        </div>
        <!-- IMAGE WITH TEXT END  -->

    </div>
    <!-- MEMBERSHIP CONTAINER END  -->




    <!--  FOOTER CONTAINER -->
    <footer class="footer">
        <div class="container">
            <div class="row">

                <!-- LOCATION  -->
                <div class="footer-col">
                    <h4>Our Location</h4>
                    <ul>
                        <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8429658921636!2d84.44191491506172!3d27.691247982798586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994e4c950356f59%3A0x9f16980dc6bd57b4!2sUnited%20Technical%20College!5e0!3m2!1sen!2snp!4v1626505314807!5m2!1sen!2snp" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </li>

                    </ul>
                </div>
                <!-- LOCATION END  -->

                <!-- CONTACT US -->
                <div class="footer-col">
                    <h4>Contact-us</h4>
                    <ul>
                        <li><a href="tel: +977 9869896545 , 9826235532"><b> <u> Phone Number</b></u>: +977
                                9869896545 ,9826235532</a></li>
                        <li><a href="mailto: utsavwagle123456789@gmail.com"><b><u>Email:</u></b>
                                utsavwagle123456789@gmail.com </a></li>
                        <li><a href="mailto:  utsavwagle508@gmail.com"><b><u>Email:</u></b>
                                utsavwagle508@gmail.com</a></li>

                    </ul>
                </div>
                <!-- CONTACT US END  -->

                <!-- QUICK LINK  -->
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./about.php">About Us</a></li>
                        <li><a href="./membership.php"> Membership</a></li>
                        <li><a href="./contact.php">Contact Us</a></li>
                        <li><a href="./login.php">login in</a></li>

                    </ul>
                </div>

                <!-- QUICK LINKS END  -->

                <!-- SOCIAL LINK  -->
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/4nonymous.Hunter.109" target="_blank" id="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/utsav_wagle/" target="_blank" id="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/utsav-wagle-a4847a270/" target="_blank" id="linkedin"><i class="fab fa-linkedin"></i></a>

                        <a href="https://github.com/Hunter109" target="_blank" id="github"><i class=" fab fa-github"></i></a>
                    </div>
                </div>
                <!-- SOCIAL LINK END  -->
            </div>
        </div>
        <!-- COPYRIGHT  -->
        <div class="footer-text">
            copyright&copy; all rights reserved,<a href="https://github.com/Hunter109" target="_blank">Gymnasium
                Management System
            </a>
        </div>
        <!-- COPYRIGHT END -->

    </footer>

    <!-- FOOTER CONTAINER END  -->


    <!-- JAVASCRIPT LINK SECTION -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./assets/javascript/navbar.js"></script>
    <!--  JAVASCRIPT LINK SECTION END -->

</body>

</html>