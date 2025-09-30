<?php
session_start();
if (!isset($_SESSION['guru'])) {
    header("Location: ../login_teacher.html");
    exit;
}

$guru = $_SESSION['guru'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/output.css" />
    <title>Guru section</title>
</head>

<body class="min-h-screen w-full text-gray-900 font-sans antialiased">

    <!-- navbar -->
    <nav class="w-full h-12 bg-white shadow-md flex items-center justify-between px-4">
        <div class="flex items-center ml-4 gap-3">
            <img src="../assets/logo kiri.png" alt="logo kiri" class="h-10 w-24">
            <h2 class="text-md font-bold text-slate-900">SMP 28 JATINANGOR</h2>
        </div>

        <!-- kanan -->
        <div class="flex items-center text-gray-700 gap-2">
            <div class=" hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="home.html" class=" hover:text-white">Home</a>
            </div>
            <div class=" hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="#" class=" hover:text-white">Contact</a>
            </div>
            <div class=" hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="login.html" class=" hover:text-white">Sign in</a>
            </div>
            <div class=" hover:bg-slate-800 rounded-lg px-2 py-1 transition duration-300">
                <a href="register.html" class=" hover:text-white">Register</a>
            </div>
        </div>
    </nav>

    <div class="relative w-full min-h-screen overflow-hidden">

        <!-- Background image -->
        <img src="../assets/image.png" alt="bg" class="absolute inset-0 w-full h-full object-cover -z-10">

        <main data-aos="fade-up">
            <!-- Section 1: Welcome -->
            <div id="welcomeSection"
                class="max-w-4xl h-80 p-2 bg-black/50 backdrop-blur-md shadow-lg rounded-2xl mx-auto mt-32">
                <!-- splash -->
                <div class="flex mt-20 gap-2">
                    <img src="../assets/stdn.png" alt="logo" class="w-28 h-28 ml-7" />

                    <div class="mx-auto">
                        <h1 class="text-slate-300 text-[40px] font-semibold mb-5 text-center">
                            WELCOME ABOARD TO SMP 28, <br> SIR/MADAM
                        </h1>

                        <div class="flex items-end justify-between">
                            <a href="daftarconsel.php"
                                class="bg-[#B1FFB7] mt-7 hover:bg-green-700 text-black text-lg font-bold py-2 px-4 rounded-full shadow-md transition-all duration-300 ease-in-out">
                                Counseling
                            </a>

                            <button id="nextBtn"
                                class="bg-[#B1FFB7] w-24 mt-7 hover:bg-green-700 text-black text-lg font-bold py-2 px-4 rounded-full shadow-md transition-all duration-300 ease-in-out tracking-widest">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Data Guru (awal hidden) -->
            <div id="guruSection"
                class="hidden max-w-4xl p-6 bg-black/50 backdrop-blur-md shadow-lg rounded-2xl mx-auto mt-20">
                <div class="flex justify-center items-center gap-10 mt-6">

                    <!-- Data Guru -->
                    <div class="w-[30rem] p-4 m-5 bg-[#feffc0] text-lg font-medium text-slate-800 rounded-lg">
                        <p class="mb-2">
                            Nama : <span id="nama"><?php echo htmlspecialchars($guru['nama_guru']); ?></span>
                        </p>
                        <p class="mb-2">
                            NIP : <span id="nip"><?php echo htmlspecialchars($guru['nip'] ?? '-'); ?></span>
                        </p>
                        <p class="mb-2">
                            Alamat : <span id="alamat"><?php echo htmlspecialchars($guru['alamat'] ?? '-'); ?></span>
                        </p>
                        <p class="mb-2">
                            Email : <span id="email"><?php echo htmlspecialchars($guru['email']); ?></span>
                        </p>
                    </div>

                    <!-- Foto Guru -->
                    <div class="w-52 h-52 p-4 ml-5 border-2 border-slate-200 text-lg text-slate-800 rounded-lg">
                        <?php if (!empty($guru['foto'])): ?>
                        <img id="foto" src="../uploads/<?php echo htmlspecialchars($guru['foto']); ?>" alt="foto guru"
                            class="w-full h-full object-cover rounded-lg" />
                        <?php else: ?>
                        <span class="text-gray-500">Tidak ada foto</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Edit & Save Button -->
                <div class="flex justify-end gap-10 mt-0 ml-14">
                    <button id="editBtn"
                        class="bg-[#B1FFB7] text-black mr-20 text-lg font-semibold  px-4 py-2 rounded-lg hover:bg-yellow-500 focus:bg-yellow-600 transition duration-200">
                        Upload
                    </button>
                    <button id="saveBtn"
                        class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 focus:bg-green-950 transition duration-200"
                        style="display: none">
                        Save
                    </button>
                </div>

                <!-- Close Button -->
                <button type="button" id="backBtn"
                    class="bg-[#B1FFB7] w-full text-black font-semibold text-xl px-4 py-2 rounded-xl hover:bg-red-500 focus:bg-red-800 transition duration-300 mt-10 mx-auto block">
                    Register
                </button>
            </div>

        </main>



        <!-- 
            <h2 class="text-2xl font-bold mb-4 text-center">
                Selamat Datang, <?php echo htmlspecialchars($guru['nama_guru']); ?> 👋
            </h2>


            <div class="space-y-2 text-base">
                <p><span class="font-semibold">NIP:</span> <?php echo htmlspecialchars($guru['nip']); ?></p>
                <p><span class="font-semibold">Email:</span> <?php echo htmlspecialchars($guru['email']); ?></p>
            </div>


            <?php if (!empty($guru['foto'])): ?>
            <div class="flex justify-center mt-4">
                <img src="../uploads/<?php echo htmlspecialchars($guru['foto']); ?>" alt="Foto Guru"
                    class="w-32 h-32 object-cover rounded-full border-2 border-white shadow-lg">
            </div>
            <?php endif; ?>


            <div class="flex justify-center mt-6">
                <a href="logout.php"
                    class="bg-gradient-to-r from-red-500 to-red-700 px-4 py-2 rounded-lg shadow-md hover:from-red-600 hover:to-red-800 transition">
                    Logout
                </a>
            </div> -->


    </div>

    <script>
    const nextBtn = document.getElementById("nextBtn");
    const welcomeSection = document.getElementById("welcomeSection");
    const guruSection = document.getElementById("guruSection");

    nextBtn.addEventListener("click", () => {
        welcomeSection.classList.add("hidden"); // sembunyiin welcome
        guruSection.classList.remove("hidden"); // tampilin guru
    });
    </script>
</body>

</html>