<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/output.css" />
    <!-- gf -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@400;600&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <title>Student Section</title>
</head>

<body class="min-h-screen w-full text-gray-900 font-sans antialiased">
    <!-- navbar -->
    <nav class="w-full h-12 bg-white shadow-md flex items-center justify-between px-4">
        <div class="flex items-center ml-4 gap-3">
            <img src="../assets/logo kiri.png" alt="logo kiri" class="h-10 w-24" />
            <h2 class="text-md font-bold text-slate-900">SMP 28 JATINANGOR</h2>
        </div>

        <!-- kanan -->
        <div class="flex items-center text-gray-700 gap-2">
            <div class="hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="../home.html" class="hover:text-white">Home</a>
            </div>
            <div class="hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="#" class="hover:text-white">Contact</a>
            </div>
            <div class="hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="../login.html" class="hover:text-white">Sign in</a>
            </div>
            <div class="hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="../register.html" class="hover:text-white">Register</a>
            </div>
        </div>
    </nav>


    <div class="relative w-full min-h-screen overflow-hidden">
        <!-- Background image -->
        <img src="../assets/image.png" alt="Background" class="absolute inset-0 w-full h-full object-cover -z-10" />

        <!-- Konten -->
        <main data-aos="fade-up">
            <div id="welcomeSection"
                class="max-w-4xl h-80 p-2 bg-black/50 backdrop-blur-md shadow-lg rounded-2xl mx-auto mt-32">
                <!-- splash -->
                <div class="flex mt-20 gap-2">
                    <img src="../assets/stdn.png" alt="logo" class="w-28 h-28 ml-7" />

                    <div class="mx-auto">
                        <h1 class="text-slate-300 text-5xl font-semibold mb-5">
                            WELCOME TO SMP 28
                        </h1>
                        <p id="splashName" class="text-slate-300 text-3xl"><span class="uppercase"
                                id="nama"><?= $user['username']; ?></span></p>

                        <div class="mt-6">
                            <a id="nextBtn"
                                class="inline-block bg-[#907963] text-white px-4 py-2 rounded-lg hover:bg-[#A99681] focus:bg-[#7A6651] transition duration-300 ml-1">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ini main login user -->
            <div id="userSection"
                class="hidden max-w-4xl h-80 p-2 bg-black/50 backdrop-blur-md shadow-lg rounded-2xl mx-auto mt-28">
                <h2 class="text-white text-3xl text-center font-bold mb-4">
                    Dashboard Siswa
                </h2>

                <!-- icon n note cnsl -->
                <div class="flex mb-5">
                    <img src="../assets/warning.png" alt="icon"
                        class="w-5 h-5 mt-2 ml-4 border-2 rounded-full bg-slate-300" />

                    <p class="text-slate-200 text-md ml-4">
                        On the counseling page, please select a date and time based on the
                        counselor’s availability. If the slot is full, kindly choose
                        another date.
                    </p>
                </div>
                <!-- icon n note abs -->
                <div class="flex">
                    <img src="../assets/warning.png" alt="icon"
                        class="w-5 h-5 mt-2 ml-4 border-2 rounded-full bg-slate-300" />

                    <p class="text-slate-200 text-md ml-4 mt-1">
                        Check student status: already registered
                    </p>
                </div>
                <div class="flex items-center justify-center mt-20 gap-10">
                    <a href="../counseling.html"
                        class="inline-block w-32 text-center bg-[#FEFFC1] text-slate-900 font-medium px-4 py-2 rounded-lg hover:bg-[#A99681] focus:bg-[#7A6651] transition duration-300 mt-6">Consultation</a>
                    <a href="userabsence.html"
                        class="inline-block w-32 text-center bg-[#FEFFC1] text-slate-900 font-medium px-4 py-2 rounded-lg hover:bg-[#A99681] focus:bg-[#7A6651] transition duration-300 mt-6 ml-4">Absence</a>
                </div>
            </div>
            <!-- ⁡⁣⁣⁢SECTION ABSENCE⁡ -->
            <div id="absenceSection"
                class="hidden max-w-4xl p-6 bg-black/50 backdrop-blur-md shadow-lg rounded-2xl mx-auto mt-20">
                <div class="flex justify-center items-center gap-10 mt-6">
                    <div class="w-[30rem] p-4 m-5 bg-[#feffc0] text-lg font-medium text-slate-800 rounded-lg">
                        <p class="mb-2">
                            Nama : <span id="nama"><?= $user['username']; ?></span>
                        </p>
                        <p class="mb-2">
                            No. Siswa :
                            <span id="no_siswa"><?= $user['no_siswa'] ?? '-'; ?></span>
                        </p>
                        <p class="mb-2">
                            Lahir :
                            <span id="lahir"><?= $user['tempat_lahir'] ?? '-'; ?></span>
                        </p>
                        <p class="mb-2">
                            Alamat : <span id="alamat"><?= $user['alamat'] ?? '-'; ?></span>
                        </p>
                        <p class="mb-2">
                            Email : <span id="email"><?= $user['email']; ?></span>
                        </p>
                    </div>

                    <div class="w-52 h-52 p-4 ml-5 border-2 border-slate-200 text-lg text-slate-800 rounded-lg">
                        <!-- image ini di ambil dari database juga yang pada saat user regist tadi, tapi namanya aja karena file disimpan di upload saat kita regist td -->
                        <img id="foto" src="../uploads/<?= $user['foto']; ?>" alt="foto siswa"
                            class="w-full h-full object-cover rounded-lg" />
                    </div>
                </div>
                <!-- edit n save button -->
                <div class="flex justify-start gap-10 mt-0 ml-14">
                    <button id="editBtn"
                        class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500 focus:bg-yellow-600 transition duration-200">
                        Edit
                    </button>
                    <button id="saveBtn"
                        class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 focus:bg-green-950 transition duration-200"
                        style="display: none">
                        Save
                    </button>
                </div>

                <!-- button -->
                <button type="button" id="backBtn"
                    class="bg-[#FF6B6B] w-full text-slate-200 px-4 py-2 rounded-xl hover:bg-red-500 focus:bg-red-800 transition duration-300 mt-10 mx-auto block">
                    Close
                </button>
            </div>
        </main>
    </div>

    <script src="../js/sectionUser.js"></script>
    <script src="../js/navLink.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 800,
    });
    </script>
</body>

</html>