<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Gymnasium Management System</title>

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



    <!-- MAIN CONTAINER  -->

    <!-- IMAGE WITH TEXT  -->
    <div class="main-container">
        <div class="image-container ">
            <div class="quote pt-[50%] ml-4 sm:pt-[20%] sm:ml-10 lg:pt-[10%] lg:ml-16" data-aos="fade-right">
                <h2 class="py-1  sm:py-2 text-xl  sm:text-2xl  lg:text-6xl tracking-tight font-extrabold text-white text-left">
                    BUILD
                    PERFECT BODY</h2>
                <h2 class=" py-1 sm:py-2 text-xl  sm:text-2xl lg:text-6xl tracking-tight font-extrabold text-white text-left">
                    SHAPE
                    FOR GOOD AND </h2>
                <h2 class="py-1 sm:py-2 text-xl  sm:text-2xl lg:text-6xl tracking-tight font-extrabold text-white text-left">
                    HEALTHY
                    LIFE.</h2>
                <p class=" py-2 text-white max-w-xs sm:max-w-sm  lg:max-w-md text-sm sm:text-lg">Whether you want to
                    lose weight,
                    build muscle, or simply get in
                    shape, develop your best self with the GMS today.

                </p>
                <button type="button" onclick="window.location.href = './membership.php';" class=" ml-2 mt-2 text-white bg-red-700 hover:bg-red-800  font-medium rounded-full text-sm px-10 py-3 text-center   ">JOIN
                    US
                </button>
            </div>
        </div>
        <!-- IMAGE WITH TEXT END -->




        <!-- SERVICE WE PROVIDE  -->

        <!-- INFO  -->
        <div class="bg-gray-100">
            <div class="py-8 px-4 mx-auto text-center max-w-screen-xl sm:py-16 lg:px-6">
                <div class="max-w-screen-xl mb-8 lg:mb-16">
                    <h2 class="mb-4 text-xl  sm:text-2xl lg:text-4xl tracking-tight font-extrabold text-red-700 ">
                        Service We
                        <span class="text-black"> Provide</span>
                    </h2>
                    <p class="text-black text-sm sm:text-xl">join us today and experience the transformative
                        power of our services in unlocking your full fitness potential.</p>
                </div>
                <!-- INFO END  -->

                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">

                    <!-- YOGA SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/zumbafitness.png" alt="Topic 6 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Yoga</h3>
                        <p class="text-black  text-sm sm:text-base">Experience tranquility and wellness through our
                            rejuvenating yoga classes,
                            promoting balance, flexibility, and inner harmony.</p>
                    </div>
                    <!-- YOGA SERVICE END -->


                    <!-- KICK BOXING SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/onlinepersonaltraining.png" alt="Topic 6 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Kick Boxing</h3>
                        <p class="text-black text-sm sm:text-base">Unleash your strength and endurance with our
                            high-energy kickboxing
                            sessions, combining martial arts and intense cardio workouts.
                        </p>
                    </div>
                    <!-- KICK BOXING SERVICE END  -->


                    <!-- POWER LIFTING SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/functionalfitness.png" alt="Topic 6 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Power Lifting</h3>
                        <p class="text-black text-sm sm:text-base">Take your strength to new heights with our
                            specialized powerlifting
                            training, focusing on heavy lifts and building raw power.
                        </p>
                    </div>
                    <!-- POWER LIFTING SERVICE END  -->


                    <!-- GROUP CLASSSES SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/groupclass.png" alt="Marketing Icon" class="w-12 h-12 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Group classes</h3>
                        <p class="text-black text-sm sm:text-base">Gain confidence and have fun working out with others
                            during our morning
                            and evening group class sessions in The Gym.</p>
                    </div>
                    <!-- GROUP CLASSES SERVICE END  -->


                    <!-- PERSONAL TRAINING SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/personaltraining.png" alt="Sales Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold  text-black">Personal training</h3>
                        <p class=" text-black text-sm sm:text-base">Achieve your fitness goals, learn how to live a
                            healthier life with
                            customized in person sessions and meal plans.</p>
                    </div>
                    <!-- PERSONAL TRAINING SERVICE END  -->


                    <!-- ONLINE PERSONAL TRAINING SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/onlinepersonaltraining.png" alt="Operations Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black ">Online personal training</h3>
                        <p class="text-black text-sm sm:text-base">Workout and get results from anywhere in the world,
                            using our affordable
                            and flexible online personal training service.</p>
                    </div>
                    <!-- ONLINE PERSONAL TRAINING SERVICE END  -->


                    <!-- FUNCTIONAL FITNESS SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/functionalfitness.png" alt="Topic 4 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Functional Fitness</h3>
                        <p class="text-black text-sm sm:text-base">Use our gym equipment and machinery to help grow your
                            muscles, build
                            strength, and stability functional fitness.</p>
                    </div>
                    <!-- FUNCTIONAL FITNESS SERVICE END  -->


                    <!-- ONLINE GROUP CLASSED SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/onlinegroupclass.png" alt="Topic 5 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Online Group Classes</h3>
                        <p class="text-black text-sm sm:text-base">Have fun with others in the comfort of your own home,
                            with fitness taught
                            online by our highly qualified instructors.</p>
                    </div>
                    <!-- ONLINE GROUP CLASSED SERVICE END  -->


                    <!-- ZUMBA FITNESS SERVICE  -->
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="./assets/image/zumbafitness.png" alt="Topic 6 Icon" class="w-10 h-10 lg:w-16 lg:h-16">
                        </div>
                        <h3 class="mb-2 text-xl  sm:text-xl font-bold text-black">Zumba fitness</h3>
                        <p class="text-black text-sm sm:text-base">Dance to the beat and burn calories at the same time,
                            with our vibrant
                            Zumba classes designed for all fitness types.</p>
                    </div>
                    <!-- ZUMBA FITNESS SERVICE END  -->

                </div>
            </div>
        </div>
        <!-- SERVICE WE PROVIDE END -->




        <!-- WHY CHOOSE US  -->
        <div class="flex flex-col items-center justify-center py-8 " data-aos="zoom-in">
            <h1 class="text-xl  sm:text-2xl lg:text-4xl font-extrabold  tracking-tight mb-8 text-center text-red-700">
                Why <span class="text-black">Choose Us?</span></h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center justify-center bg-red-600 rounded-lg p-8 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer">
                    <span class="text-2xl lg:text-4xl font-bold text-white">110+</span>
                    <p class="mt-4 text-center text-white">ACTIVE MEMBER WEEKLY</p>
                </div>

                <div class="flex flex-col items-center justify-center bg-red-600 rounded-lg p-8 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer">
                    <span class="text-2xl lg:text-4xl font-bold text-white">96%</span>
                    <p class="mt-4 text-center text-white"> MEMBER SATISFACTION</p>
                </div>

                <div class="flex flex-col items-center justify-center bg-red-600 rounded-lg p-8 shadow-lg transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer">
                    <span class="text-2xl lg:text-4xl font-bold text-white">150+</span>
                    <p class="mt-4 text-center text-white"> MODERN TOOLS AND EQUIPMENTS</p>
                </div>

            </div>

            <p class="mt-12">
                <a href="./about.php" class="bg-gray-200 hover:bg-black hover:text-white text-black font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out">
                    Learn More About Us
                </a>
            </p>
        </div>
        <!-- WHY CHOOSE US END  -->




        <!-- IMAGE WITH TEXT  -->

        <div class="mb-1  bg-black ">
            <div class="training flex flex-col items-center justify-center ">
                <h2 class="  py-12 text-xl  sm:text-2xl md:text-4xl lg:text-5xl tracking-tight font-bold text-white text-center">
                    Transform your life and get fit today
                </h2>
                <button type="button" onclick="window.location.href = './registration/registration.php';" class=" ml-2 mt-2  bg-red-700 hover:bg-red-800  font-medium rounded-full text-sm px-10 py-3 text-center text-white">
                    Take the First Step
                </button>
            </div>
        </div>
        <!-- IMAGE WITH TEXT  END -->
    </div>
    <!-- MAIN CONTAINER  END -->



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