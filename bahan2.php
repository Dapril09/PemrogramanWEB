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
<html lang="id-ID">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Makanan | Pilih Bahan Makanan</title>
    <link rel="stylesheet" href="styles_bahan.css">
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
            <div class="logo">
                <a href="index.html">Cookie<span>Rookie.</span></a>
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
                        <a href="index2.php #about">
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
                    <a href="resep.html?user_id=<?php echo $user_id; ?>">
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
                    <a href="index2.php #about">
                        <li>About Us</li>
                    </a>
                </ul>
            </div>
            <div class="akun">
                <ul>
                    <a href="index.html">
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
    <main>
        <div class="container">
            <div class="search-ingredient-box">
                <input type="text" class="search-bar" placeholder="Bahan apa yang kamu punya?">
                <div class="ingredient-list">
                    <h2>Bahan Populer Minggu Ini</h2>
                    <?php
                    $popularIngredients = [
                        ["src" => "https://ik.imagekit.io/whks7rzkc/ayam.jpeg?updatedAt=1720760238833", "alt" => "Ayam", "value" => "Ayam"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/kentang.jpeg?updatedAt=1720760239090", "alt" => "Kentang", "value" => "Kentang"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Telur.jpeg?updatedAt=1720760239243", "alt" => "Telur", "value" => "Telur"]
                    ];

                    foreach ($popularIngredients as $ingredient) {
                        echo '<div class="ingredient-item">';
                        echo '<img src="' . $ingredient['src'] . '" alt="' . $ingredient['alt'] . '">';
                        echo '<label>';
                        echo '<input type="checkbox" name="ingredient" value="' . $ingredient['value'] . '">';
                        echo $ingredient['value'];
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                    <h2>Bahan Lainnya</h2>
                    <h3>A</h3>
                    <?php
                    $otherIngredientsA = [
                        ["src" => "https://ik.imagekit.io/whks7rzkc/agar-agar.jpeg?updatedAt=1720760238927", "alt" => "Agar-Agar", "value" => "Agar-Agar"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/air%20kelapa.jpeg?updatedAt=1720760238970", "alt" => "Air Kelapa", "value" => "Air-Kelapa"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/alpukat.jpeg?updatedAt=1720763776840", "alt" => "Alpukat", "value" => "Alpukat"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/anggur.jpeg?updatedAt=1720763777154", "alt" => "Anggur", "value" => "Anggur"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/apel.jpeg?updatedAt=1720763776879", "alt" => "Apel", "value" => "Apel"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/almon.jpeg?updatedAt=1720763777198", "alt" => "Almon", "value" => "Almon"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Ampela?updatedAt=1721148340652", "alt" => "Ampela", "value" => "Ampela"]
                    ];

                    foreach ($otherIngredientsA as $ingredient) {
                        echo '<div class="ingredient-item">';
                        echo '<img src="' . $ingredient['src'] . '" alt="' . $ingredient['alt'] . '">';
                        echo '<label>';
                        echo '<input type="checkbox" name="ingredient" value="' . $ingredient['value'] . '">';
                        echo $ingredient['value'];
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                    <h3>B</h3>
                    <?php
                    $otherIngredientsB = [
                        ["src" => "https://ik.imagekit.io/whks7rzkc/bombay.jpeg?updatedAt=1720763779503", "alt" => "Bawang Bombay", "value" => "Bombay"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Bawang%20Putih.jpeg?updatedAt=1720763779489", "alt" => "Bawang Putih", "value" => "Bawang-Putih"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/bawang%20merah.jpeg?updatedAt=1720763779490", "alt" => "Bawang Merah", "value" => "Bawang-Merah"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/baking%20powder.jpeg?updatedAt=1720763777201","alt" => "Baking Powder", "value" => "Baking Powder"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/baso.jpeg?updatedAt=17207637772521","alt" => "Bakso", "value" => "Bakso"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/broccoli.jpeg?updatedAt=1720644859690","alt" => "Brokoli", "value" => "Brokoli"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/bacon.jpeg?updatedAt=1720763777205","alt" => "Bacon", "value" => "Bacon"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/baby%20cron.jpg?updatedAt=1720765382095","alt" => "Baby Cron", "value" => "Baby Cron"]
                        
                    ];

                    foreach ($otherIngredientsB as $ingredient) {
                        echo '<div class="ingredient-item">';
                        echo '<img src="' . $ingredient['src'] . '" alt="' . $ingredient['alt'] . '">';
                        echo '<label>';
                        echo '<input type="checkbox" name="ingredient" value="' . $ingredient['value'] . '">';
                        echo $ingredient['value'];
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                    <h2>Bahan Lainnya</h2>
                    <h3>C</h3>
                    <?php
                    $otherIngredientsB = [
                        ["src" => "https://ik.imagekit.io/whks7rzkc/coklat.jpeg?updatedAt=1720763780499","alt" => "Coklat", "value" => "Coklat"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/cincau.jpeg?updatedAt=1720763779876","alt" => "Cincau", "value" => "Cincau"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/cengkeh.jpeg?updatedAt=1720763780327","alt" => "Cengkeh", "value" => "Cengkeh"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/cabe.jpeg?updatedAt=1720763779909","alt" => "Cabe Besar", "value" => "Cabe Besar"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/cabe%20bubuk.jpeg?updatedAt=1720763779797","alt" => "Cabe Bubuk", "value" => "Cabe Bubuk"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/cumi.jpg?updatedAt=1720766221947","alt" => "Cumi", "value" => "Cumi"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Cilantro.jpeg?updatedAt=1720766434389","alt" => "Cilantro ", "value" => "Cilantro "],
                        
                    ];

                    foreach ($otherIngredientsB as $ingredient) {
                        echo '<div class="ingredient-item">';
                        echo '<img src="' . $ingredient['src'] . '" alt="' . $ingredient['alt'] . '">';
                        echo '<label>';
                        echo '<input type="checkbox" name="ingredient" value="' . $ingredient['value'] . '">';
                        echo $ingredient['value'];
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                    <h3>D</h3>
                    <?php
                    $otherIngredientsB = [
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daging%20giling.jpeg?updatedAt=1720763780795","alt" => "Daging Giling", "value" => "Daging Giling"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daging%20kambing.jpeg?updatedAt=1720763780100", "alt"=>"Daging Kambing","value" => "Daging Kambing"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daging%20ham%20sapi.jpeg?updatedAt=1720763780835","alt" => "Daging Ham Sapi", "value" => "Daging Ham Sap"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daun%20bawang.jpeg?updatedAt=1720763798272","alt" => "Daun Bawang", "value" => "Daun Bawang"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daun%20kemangi.jpeg?updatedAt=1720763798204","alt" => "Daun Kemangi", "value" => "Daun Kemangi"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/daun%20jeruk.jpeg?updatedAt=1720763798235","alt" => "Daun Jeruk", "value" => "Daun Jeruk"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Daun%20salam.jpeg?updatedAt=1720767852611","alt" => "Daun salam", "value" => "Daun salam"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Daun%20Pepaya.jpeg?updatedAt=1720767852397","alt" => "Daun Pepaya", "value" => "Daun Pepaya"],
                        ["src" => "https://ik.imagekit.io/whks7rzkc/Durian.jpeg?updatedAt=1720767852482","alt" => "Durian", "value" => "Durian"],
                        
                    ];

                    foreach ($otherIngredientsB as $ingredient) {
                        echo '<div class="ingredient-item">';
                        echo '<img src="' . $ingredient['src'] . '" alt="' . $ingredient['alt'] . '">';
                        echo '<label>';
                        echo '<input type="checkbox" name="ingredient" value="' . $ingredient['value'] . '">';
                        echo $ingredient['value'];
                        echo '</label>';
                        echo '</div>';

                    }
                    ?>
                </div>
                <div class="selected-ingredients-box" id="selected-ingredients-box">
                    0 bahan telah terpilih
                </div>
            </div>
            <div class="main-content">
                <div class="info-container">
                    <div class="image-container">
                        <img src="https://ik.imagekit.io/whks7rzkc/Logo%20keluarga.png?updatedAt=1720782780108" alt="Logo">
                    </div>
                    <div class="text-container">
                        <h2>Punya <span>bahan</span> apa di kulkas?</h2>
                        <p>Kami akan beri rekomendasi resep<br>sesuai dengan bahan yang kamu punya.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
        <p class="end">&copy; 2024 - Design by<span><i class="fa-solid fa-face-grin"></i> Project Design Website Food</span></p>
    </footer>
    
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const selectedIngredientsBox = document.getElementById('selected-ingredients-box');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectedIngredientsCount);
        });

        function updateSelectedIngredientsCount() {
            const selectedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
            selectedIngredientsBox.textContent = `${selectedCount} bahan telah terpilih`;
            selectedIngredientsBox.style.display = selectedCount > 0 ? 'block' : 'none'; 
        }
    </script>
</body>
</html>
