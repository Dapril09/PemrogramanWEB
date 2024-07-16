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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Resep</title>
    <link rel="stylesheet" href="unggah_resep.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hi <?php echo $user_id; ?></h1>
            <p>Ayo unggah Resep Kaya Nutrisi Ala Kamu dan dapatkan hadiah spesial dari MAH!!</p>
            <img src="food_header.gif" alt="Dish Image" class="dish-image">
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Form input resep -->
            <div class="form-group">
                <label for="instagram">Akun Instagram:</label>
                <input type="text" id="instagram" name="instagram" placeholder="@instagram_account">
            </div>
            <hr>
            <div class="form-group">
                <label for="foto">Unggah foto masakanmu</label>
                <input type="file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="nama_masakan">Nama masakan:</label>
                <input type="text" id="nama_masakan" name="nama_masakan" placeholder="Ketik nama masakanmu (Maks. 10 kata)">
            </div>
            <div class="form-group">
                <label for="penjelasan">Penjelasan singkat:</label>
                <textarea id="penjelasan" name="penjelasan" rows="4" placeholder="Tulis cerita menarik di balik resep ini"></textarea>
            </div>
            <div class="form-group">
                <label for="porsi">Berapa sajian?</label>
                <input type="text" id="porsi" name="porsi" placeholder="Contoh: 4 porsi">
            </div>
            <div class="form-group">
                <label for="waktu">Waktu memasak:</label>
                <input type="text" id="waktu" name="waktu" placeholder="Contoh: 30 menit">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select id="kategori" name="kategori">
                    <option value="sarapan">Sarapan</option>
                    <option value="makan_siang">Makan Siang</option>
                    <option value="makan_malam">Makan Malam</option>
                </select>
            </div>
            <div class="form-group" id="bahan-container">
                <label for="bahan">Masukkan rincian bahan:</label>
                <div class="bahan-entry">
                    <input type="text" id="bahan" name="bahan[]" placeholder="Contoh: 2 sdm garam">
                    <button type="button" onclick="addBahan()">+</button>
                </div>
            </div>
            <div class="form-group" id="langkah-container">
                <label for="langkah">Cara memasak:</label>
                <div class="langkah-entry">
                    <input type="text" id="langkah" name="langkah[]" placeholder="Contoh: Step 1. Tumis bawang hingga harum.">
                    <button type="button" onclick="addLangkah()">+</button>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Bagikan Sekarang</button>
            </div>
        </form>
    </div>

    <script>
        function addBahan() {
            const container = document.getElementById('bahan-container');
            const div = document.createElement('div');
            div.className = 'bahan-entry';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'bahan[]';
            input.placeholder = 'Contoh: 2 sdm garam';

            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = '-';
            button.onclick = function() {
                container.removeChild(div);
            };

            div.appendChild(input);
            div.appendChild(button);
            container.appendChild(div);
        }

        function addLangkah() {
            const container = document.getElementById('langkah-container');
            const div = document.createElement('div');
            div.className = 'langkah-entry';

            const textInput = document.createElement('input');
            textInput.type = 'text';
            textInput.name = 'langkah[]';
            textInput.placeholder = 'Contoh: Step 1. Tumis bawang hingga harum.';

            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = '-';
            button.onclick = function() {
                container.removeChild(div);
            };

            div.appendChild(textInput);
            div.appendChild(button);
            container.appendChild(div);
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webmakanan"; // Use the same database name as in your upload.php script

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $instagram = $_POST['instagram'];
        $nama_masakan = $_POST['nama_masakan'];
        $penjelasan = $_POST['penjelasan'];
        $porsi = $_POST['porsi'];
        $waktu = $_POST['waktu'];
        $kategori = $_POST['kategori'];
        $bahan = json_encode($_POST['bahan']);
        $langkah = json_encode($_POST['langkah']);

        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($foto);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO resep (instagram, foto, nama_masakan, penjelasan, porsi, waktu, kategori, bahan, langkah, user_id)
                    VALUES ('$instagram', '$target_file', '$nama_masakan', '$penjelasan', '$porsi', '$waktu', '$kategori', '$bahan', '$langkah', '$user_id')";

            if (mysqli_query($conn, $sql)) {
                echo "<script> 
                alert('Data Berhasil Diunggah');
                document.location.href = 'index2.php?user_id=" . $user_id . "';            
            </script>";

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah foto.";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
