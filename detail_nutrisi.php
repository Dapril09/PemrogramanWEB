<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Nutrisi - CookieRookie</title>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles_nutrisi.css">
    <style>
        
    </style>
</head>
<body>
    <header>
        <div class="header">
            <div class="headerbar">
                <div class="akun">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-house-chimney"></i></a></li>
                        <li><a href="#"><i class="fa-solid fa-magnifying-glass searchicon" id="searchicon1"></i></a></li>
                        <div class="search" id="searchinput1">
                            <input type="search">
                            <i class="fa-solid fa-magnifying-glass srchicon"></i>
                        </div>
                        <li><a href="#"><i class="fa-solid fa-user" id="user-mb"></i></a></li>
                    </ul>
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="resep2.php?user_id=<?php echo $user_id; ?>">Resep</a></li>
                        <li><a href="bahan2.php?user_id=<?php echo $user_id; ?>">Bahan</a></li>
                        <li><a href="nutrisi2.php?user_id=<?php echo $user_id; ?>">Nutrisi</a></li>
                        <li><a href="unggah_resep.php?user_id=<?php echo $user_id; ?>">Unggah Resep</a></li>
                        <li><a href="index2.php #about">About Us</a></li>
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
                    <li><a href="resep2.php?user_id=<?php echo $user_id; ?>">Resep</a></li>
                    <li><a href="bahan2.php?user_id=<?php echo $user_id; ?>">Bahan</a></li>
                    <li><a href="nutrisi2.php?user_id=<?php echo $user_id; ?>">Nutrisi</a></li>
                    <li><a href="unggah_resep.php?user_id=<?php echo $user_id; ?>">Unggah Resep</a></li>
                    <li><a href="index2.php #about">About Us</a></li>
                </ul>
            </div>
            <div class="akun">
                <ul>
                    <li><a href="index.html"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-magnifying-glass searchicon" id="searchicon2"></i></a></li>
                    <div class="search" id="searchinput2">
                        <input type="search">
                        <i class="fa-solid fa-magnifying-glass srchicon"></i>
                    </div>
                    <li><a href="login.php"><i class="fa-solid fa-user" id="user-lap"></i></a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <section id="Nutrisi" class="Nutrisi-section">
            <h2>Detail Nutrisi</h2>
            <div id="nutrisiContainer"></div>
        </section>
    </main>

    <script>
        const nutrisi_list = {
            'kale': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/Here_s%20What%201%20Pound%20of%20Kale%20Looks%20Like.jpeg?updatedAt=1720644786553',
                nama: 'Kale',
                deskripsi: 'Kale adalah sayuran hijau berdaun yang termasuk dalam keluarga kubis (Brassicaceae).Daunnya keriting dan bertekstur kasar dengan warna hijau gelap.Kale dikenal sebagai salah satu superfood karena kandungan gizinya yang sangat tinggi.Kale kaya akan vitamin A, C, dan K, serta mengandung mineral penting seperti kalsium, besi, dan magnesium. Selain itu, kale juga tinggi serat, antioksidan, dan senyawa anti-inflamasi yang baik untuk kesehatan.',
                kalori: 49,
                protein: 4.3,
                lemak: 0.9,
                karbohidrat: 8.75,
            },
            'brokoli': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/broccoli(1)(1).png?updatedAt=1720646415667',
                nama: 'Brokoli',
                deskripsi: 'Brokoli kaya akan vitamin K dan C, serta sumber serat yang baik.',
                kalori: 34,
                protein: 2.8,
                lemak: 0.4,
                karbohidrat: 6.64,
            },
            'asparagus': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/Zesty%20Lemon%20Garlic%20Asparagus.jpeg?updatedAt=1720644851312',
                nama: 'Asparagus',
                deskripsi: 'Asparagus adalah sayuran rendah kalori yang kaya akan vitamin K dan folat.',
                kalori: 20,
                protein: 2.2,
                lemak: 0.2,
                karbohidrat: 3.88,
            },
            'sawi_hijau': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/bf231512-407a-4361-b812-29a6ccc90b54.jpeg?updatedAt=1720645978541',
                nama: 'Sawi Hijau',
                deskripsi: 'Sawi hijau adalah sumber vitamin A, C, dan K yang sangat baik.',
                kalori: 27,
                protein: 2.7,
                lemak: 0.2,
                karbohidrat: 4.37,
            },
            'alpukat': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/Zesty%20Lemon%20Garlic%20Asparagus.jpeg?updatedAt=1720644851312',
                nama: 'Alpukat',
                deskripsi: 'Alpukat adalah buah yang kaya akan lemak sehat, vitamin, dan mineral.',
                kalori: 160,
                protein: 2,
                lemak: 15,
                karbohidrat: 9,
            },
            'kiwi': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/Love%20Kiwis!.jpeg?updatedAt=1720644852602',
                nama: 'Kiwi',
                deskripsi: 'Kiwi adalah buah yang kaya akan vitamin C dan serat.',
                kalori: 61,
                protein: 1.1,
                lemak: 0.5,
                karbohidrat: 14.66,
            },
            'produk_hewani': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/Lazy%20Keto%20Vs%20Strict%20Keto.jpeg?updatedAt=1720648545006',
                nama: 'Produk Hewani',
                deskripsi: 'Produk hewani seperti daging, susu, dan telur adalah sumber protein yang baik.',
                kalori: 143, // Contoh untuk daging sapi
                protein: 26.1,
                lemak: 3.6,
                karbohidrat: 0,
            },
            'kacang_kacangan': {
                gambar: 'https://ik.imagekit.io/whks7rzkc/The%20Healthiest%20Nuts%20to%20Eat.jpeg?updatedAt=1720645919831',
                nama: 'Kacang-Kacangan',
                deskripsi: 'Kacang-kacangan seperti almond, kenari, dan kacang merah kaya akan protein, serat, dan lemak sehat.',
                kalori: 575, // Contoh untuk almond
                protein: 21.2,
                lemak: 49.4,
                karbohidrat: 21.6,
            },
        };

        const nutrisiContainer = document.getElementById('nutrisiContainer');
        Object.values(nutrisi_list).forEach(nutrisi => {
            const nutrisiDiv = document.createElement('div');
            nutrisiDiv.className = 'nutrisi-item';

            const img = document.createElement('img');
            img.src = nutrisi.gambar;
            img.alt = nutrisi.nama;
            nutrisiDiv.appendChild(img);

            const nama = document.createElement('h3');
            nama.textContent = nutrisi.nama;
            nutrisiDiv.appendChild(nama);

            const deskripsi = document.createElement('p');
            deskripsi.textContent = nutrisi.deskripsi;
            nutrisiDiv.appendChild(deskripsi);

            const kalori = document.createElement('p');
            kalori.innerHTML = `<strong>Kalori:</strong> ${nutrisi.kalori} kcal`;
            nutrisiDiv.appendChild(kalori);

            const protein = document.createElement('p');
            protein.innerHTML = `<strong>Protein:</strong> ${nutrisi.protein} g`;
            nutrisiDiv.appendChild(protein);

            const lemak = document.createElement('p');
            lemak.innerHTML = `<strong>Lemak:</strong> ${nutrisi.lemak} g`;
            nutrisiDiv.appendChild(lemak);

            const karbohidrat = document.createElement('p');
            karbohidrat.innerHTML = `<strong>Karbohidrat:</strong> ${nutrisi.karbohidrat} g`;
            nutrisiDiv.appendChild(karbohidrat);

            nutrisiContainer.appendChild(nutrisiDiv);
        });
    </script>
</body>
</html>

               
