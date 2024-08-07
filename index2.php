<?php
// Buat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webmakanan");

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mulai sesi
session_start();

// Cek apakah 'user_id' ada di URL dan tidak kosong
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']); // Pastikan untuk mengamankan nilai input

    // Query yang benar untuk mengambil data pengguna
    $query = "SELECT * FROM Login WHERE Username='$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $mhs = mysqli_fetch_assoc($result);
        $username = $mhs["Username"];
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "User ID tidak ditemukan di URL atau kosong.";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Makanan | Home</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="headerbar">
                <div class="akun">
                    <ul>
                        <a href="">
                            <li>
                                <i class="fa-solid fa-house-chimney"></i>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <i class="fa-solid fa-magnifying-glass searchicon" id="searchicon1"></i>
                            </li>
                        </a>
                        <div class="search" id="searchinput1">
                            <input type="search">
                            <i class="fa-solid fa-magnifying-glass srchicon"></i>
                        </div>
                        <a href="">
                            <li>
                                <i class="fa-solid fa-user" id="user-mb"></i>
                            </li>
                        </a>
                    </ul>
                </div>
            <div class="nav">
                    <ul>
                        <a href="resep2.php?user_id=<?php echo $user_id; ?>">
                            <li>Resep</li>
                        </a>
                        <a href="bahan2.php?user_id=<?php echo $user_id; ?>">
                            <li>Bahan</li>
                        </a>
                        <a href="nutrisi2.php?user_id=<?php echo $user_id; ?>">
                            <li>Nutrisi</li>
                        </a>
                        <a href="unggah_resep.php?user_id=<?php echo $user_id; ?>">
                            <li>Unggah Resep</li>
                        </a>
                        <a href="#about">
                            <li>About Us</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="logo">
                <a href="index2.php?user_id=<?php echo $user_id; ?>">Cookie<span>Rookie.</span></a>
            </div>
            <div class="bar">
                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-xmark" id="hdcross"></i>
            </div>
            <div class="nav">
                <ul>
                    <a href="resep2.php?user_id=<?php echo $user_id; ?>">
                        <li>Resep</li>
                    </a>
                    <a href="bahan2.php?user_id=<?php echo $user_id; ?>">
                        <li>Bahan</li>
                    </a>
                    <a href="nutrisi2.php?user_id=<?php echo $user_id; ?>">
                        <li>Nutrisi</li>
                    </a>
                    <a href="unggah_resep.php?user_id=<?php echo $user_id; ?>">
                        <li>Unggah Resep</li>
                    </a>
                    <a href="#about">
                        <li>About Us</li>
                    </a>
                </ul>
            </div>
            <div class="akun">
                <ul>
                    <a href="index2.php?user_id=<?php echo $user_id; ?>">
                        <li>
                            <i class="fa-solid fa-house"></i>
                        </li>
                    </a>
                    <a href="#">
                        <li>
                            <i class="fa-solid fa-magnifying-glass searchicon" id="searchicon2"></i>
                        </li>
                    </a>
                    <div class="search" id="searchinput2">
                        <input type="search">
                        <i class="fa-solid fa-magnifying-glass srchicon"></i>
                    </div>
                    <a href="login.php">
                        <li>
                            <i class="fa-solid fa-user" id="user-lap"></i>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <div class="logo">
        <div class="home">
            <div>
                <h1>Enjoy <span>Destination Food</span> in Your Happy Life</h1>
                <p>Temukan destinasi kuliner terbaik untuk kebahagiaan hidupmu. Bergabunglah dengan kami dan nikmati beragam cita rasa dari berbagai penjuru dunia!</p>
                <a href="login.php"><button class="btn_green">Join With Us <i class="fa-solid fa-arrow-right-long"></i></button></a>
            </div>
            <div>
                <img src="food_header.gif" alt="">
            </div>
        </div>

        <div class="head-materials">
            <div>
                <h2>Pilih Bahan Masakan yang Kamu Punya</h2>
                <p>Tidak perlu bingung dan khawatir lagi mau masak. Tinggal cari bahannya dan dapatkan inspirasi resepnya!</p>
            </div>
        </div>

        <div class="materials-list-container">
            <button class="scroll-button left"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="materials-list">
                <div class="list">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/list1.png?updatedAt=1720620384247" alt="material list">
                    </div>
                    <h3>Mentimun</h3>
                </div>
                <div class="list">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/list2.png?updatedAt=1720620383830" alt="material list">
                    </div>
                    <h3>Telur</h3>
                </div>
                <div class="list">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/list3.png?updatedAt=1720620384144" alt="material list">
                    </div>
                    <h3>Ayam</h3>
                </div>
                <div class="list">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/list4.png?updatedAt=1720620380182" alt="material list">
                    </div>
                    <h3>Ikan</h3>
                </div>
                <!-- Tambahkan lebih banyak item jika diperlukan -->
            </div>
            <a href="bahan.php"><button class="scroll-button right"><i class="fa-solid fa-chevron-right"></i></button></a>
        </div>
        
        <div class="home2">
            <div class="foodimg">
                <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/plate1.png?updatedAt=1720620380412 " alt="">
            </div>
            <div class="question">
                <div>
                    <h2>Confused about your favorite food?</h2>
                    <p>Temukan inspirasi kuliner favoritmu di sini. Kami siap membantu menjawab kebingunganmu dalam memilih makanan yang terbaik! Atau Kamu bisa memiliki resep masakan sendiri untuk dijadikan inspirasi semua orang, dengan cukup klik tombol dibawah ini!</p>
                    <a href="login.php"><button class="btn_green">Tambah Menu</button></a>
                </div>
            </div>
        </div>

        <div class="home3">
            <div class="food-head">
                <h3>Our Popular Food Items</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis cum odio quas facilis molestias omnis officiis? Veniam, corporis quae! Voluptatibus eum rem aliquam vitae, sit perferendis praesentium veritatis ut fugit.</p>
            </div>
            <div class="food-items">
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/resep_makanan/gulai.jpg?updatedAt=1720661904915" alt="Gulai Kentang Udang Pedas">
                    </div>
                    <h3>Gulai Kentang Udang Pedas</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, reiciendis?</p>
                    <a href="resep_makanan.html?id=gulai"><button class="btn_menu">Lihat Resep</button></a>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/item1.jpg?updatedAt=1720620379610" alt="food item">
                    </div>
                    <h3>Ceker Mercon</h3>
                    <p>Ceker ayam dengan bumbu pedas yang menggugah selera, sempurna untuk pecinta makanan pedas!</p>
                    <button class="btn_menu">Lihat Resep</button>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/resep_makanan/soto.jpeg?updatedAt=1720661904627" alt="Soto Ayam">
                    </div>
                    <h3>Soto Ayam</h3>
                    <p>Soto ayam yang segar dengan bumbu yang kaya rasa.</p>
                    <a href="resep_makanan.html?id=soto"><button class="btn_menu">Lihat Resep</button></a>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/item3.jpg?updatedAt=1720620382867" alt="food item">
                    </div>
                    <h3>Roti Ubi Ungu Manis</h3>
                    <p>Roti lembut dengan isian ubi ungu yang manis, ideal untuk camilan atau sarapan.</p>
                    <button class="btn_menu">Lihat Resep</button>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/item4.jpg?updatedAt=1720620383577" alt="food item">
                    </div>
                    <h3>Telur Balado</h3>
                    <p>Telur dengan saus balado pedas yang gurih dan nikmat, cocok untuk pelengkap makan siang atau malam.</p>
                    <button class="btn_menu">Lihat Resep</button>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/resep_makanan/rendang.jpeg?updatedAt=1720661904877" alt="Rendang">
                    </div>
                    <h3>Rendang</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, consequuntur cumque animi enim exercitationem mollitia?</p>
                    <a href="resep_makanan.html?id=rendang"><button class="btn_menu">Lihat Resep</button></a>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/resep_makanan/ayambakar.jpeg?updatedAt=1720661904858" alt="Ayam Bakar">
                    </div>
                    <h3>Ayam Bakar</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sunt vero tempore commodi dolor beatae.</p>
                    <a href="resep_makanan.html?id=ayambakar"><button class="btn_menu">Lihat Resep</button></a>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/item7.jpg?updatedAt=1720620383521" alt="food item">
                    </div>
                    <h3>Cucumber Salad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sunt vero tempore commodi dolor beatae.</p>
                    <button class="btn_menu">Lihat Resep</button>
                </div>
                <div class="item">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/resep_makanan/pecel.jpeg?updatedAt=1720661904978" alt="Pecel">
                    </div>
                    <h3>Pecel</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sunt vero tempore commodi dolor beatae.</p>
                    <a href="resep_makanan.html?id=pecel"><button class="btn_menu">Lihat Resep</button></a>
                </div>
            </div>
            <a href="resep.html"><button class="btn_show_more">Show More <i class="fa-solid fa-arrow-right-long"></i></button></a>
            <div class="dsgn"></div>
        </div>

        <div class="home4" id="about">
            <div class="icon-chef-feed">
                <h2>About <span style="color: red">Us</span></h2>
                <p>Kami adalah komunitas pecinta kuliner yang berkomitmen untuk memberikan pengalaman kuliner terbaik kepada semua orang, Kami juga sangat menghargai segala umpan balik dari pelanggan kami. Bergabunglah dengan kami untuk menemukan resep baru, bahan berkualitas, dan destinasi kuliner yang menarik!</p>
                <div class="icon-chef-detail">
                    <div>
                        <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/logo.png?updatedAt=1720620379301" alt="">
                    </div>
                    <div>
                        <h6>Developer Teamwork</h6>
                        <p>Web Project</p>
                    </div>
                </div>
            </div>
            <div class="icon-chef">
                <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/chef.png?updatedAt=1720620380921" alt="">
            </div>
        </div>

        <div class="our-team" id="about">
            <h1>Our<span>Team</span></h1>
            <div class="team_box">
                <div class="profile">
                    <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/team1.jpg?updatedAt=1720620380166">
                    <div class="info">
                        <h3 class="name">Dhewi April Liana</h3>
                        <p class="bio">Developer Front-end Bagian Beranda.</p>
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/team22.jpg?updatedAt=1720627782010">
                    <div class="info">
                        <h3 class="name">Aura Amylia AR.</h3>
                        <p class="bio">Developer Back-end Login dan Create.</p>
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/team3.jpg?updatedAt=1720620379726">
                    <div class="info">
                        <h3 class="name">Indawati Latif Djolafo</h3>
                        <p class="bio">Developer Front-end Bagian Kulineri.</p>
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <img src="https://ik.imagekit.io/mggpv7ahk/Pemrograman_WEB/Beranda/team4.jpg?updatedAt=1720620379415">
                    <div class="info">
                        <h3 class="name">Elsa Nadiyah</h3>
                        <p class="bio">Developer Front-end Bagian Resep.</p>
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer_main">
                <div class="footer_tag">
                    <h2>Location</h2>
                    <p>Kedung Mundu</p>
                    <p>Semarang</p>
                    <p>Jawa Tengah</p>
                    <p>Indonesia</p>
                </div>
                <div class="footer_tag">
                    <h2>Quick Link</h2>
                    <p>Logo</p>
                    <p>Resep</p>
                    <p>Bahan</p>
                    <p>Kuliner</p>
                    <p>Nutrisi</p>
                    <p>About Us</p>
                </div>
                <div class="footer_tag">
                    <h2>Contact</h2>
                    <p>+62 896-3056-1413</p>
                    <p>+62 812-2704-8289</p>
                    <p>dhewiaprilliana@gmail.com</p>
                    <p>indawatilatif@gmail.com</p>
                    <p>auraamylia7@gmail.com</p>
                    <p>elsanadiyah24@gmail.com</p>
                </div>
                <div class="footer_tag">
                    <h2>Our Service</h2>
                    <p>various cooking menus</p>
                    <p>guaranteed food</p>
                    <p>24 x 7 Service</p>
                </div>
                <div class="footer_tag">
                    <h2>Follows</h2>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
    
            </div>
    
            <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> Project Design Website Food</span></p>
    
        </footer>

    </div>
    <script src="script.js"></script>
</body>
</html>