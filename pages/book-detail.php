<?php
if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$id = $_GET["id"];
$buku = query_select("buku", ["where" => "id_buku = '$id'"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Fungsi untuk membuka buku PDF di dalam iframe
        function openBookPdf(pdfFile, bookTitle, ID) {
            document.getElementById("pdfIframe").src = pdfFile;
            document.getElementById("bookTitle").textContent = bookTitle;
            document.getElementById("bookModal").classList.remove("hidden");
            // Menyimpan nama buku untuk digunakan saat tombol selesai membaca diklik
            document.getElementById("bookName").value = bookTitle;
            document.getElementById("id_buku").value = ID;
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("bookModal").classList.add("hidden");
        }

        // Fungsi untuk mencari buku
        function searchBooks() {
            var input, filter, bookContainer, books, bookTitle, i, txtValue;
            input = document.getElementById('searchBar');
            filter = input.value.toUpperCase();
            bookContainer = document.getElementById("bookContainer");
            books = bookContainer.getElementsByClassName('book');

            for (i = 0; i < books.length; i++) {
                bookTitle = books[i].getElementsByClassName("bookTitle")[0];
                txtValue = bookTitle.textContent || bookTitle.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    books[i].style.display = "";
                } else {
                    books[i].style.display = "none";
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <?php 
    require_once "navbar.php";
     ?>

    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="mb-3 bg-gradient-to-r from-orange-500 to-red-500 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold">Detail Buku</h2>
            <p class="mt-2">Temukan buku yang menarik dan dapatkan poin!</p>
        </div>

        <div id="bookContainer" class="">

            <?php if ($buku): ?>

                <?php foreach ($buku as $item): ?>

                    <div class="book bg-white p-6 rounded-lg shadow-md">

                        <h3 class="bookTitle text-xl font-semibold text-center mb-4"><?= $item["judul"] ?></h3>

                        <img src="file/<?= $item["sampul"] ?>" alt="Cover Buku" class="w-full h-48 object-contain rounded-md mb-4">

                        <p class="mt-2 mb-4 text-center"><?= $item["sinopsis"] ?></p>

                        <table style="margin: 0 auto;">
                            <tr>    
                                <td>Pengarang</td>
                                <td>:</td>
                                <td><?= $item["pengarang"] ?></td>
                            </tr>
                            <tr>    
                                <td>Penerbit</td>
                                <td>:</td>
                                <td><?= $item["penerbit"] ?></td>
                            </tr>
                            <tr>    
                                <td>Edisi</td>
                                <td>:</td>
                                <td><?= $item["edisi"] ?></td>
                            </tr>
                            <tr>    
                                <td>No. Klas DDC</td>
                                <td>:</td>
                                <td><?= $item["no_ddc"] ?></td>
                            </tr>
                            <tr>    
                                <td>No. Panggil</td>
                                <td>:</td>
                                <td><?= $item["no_panggil"] ?></td>
                            </tr>
                            <tr>    
                                <td>Tahun Terbit</td>
                                <td>:</td>
                                <td><?= $item["tahun"] ?></td>
                            </tr>
                            <tr>    
                                <td>Kota Terbit</td>
                                <td>:</td>
                                <td><?= $item["kota_terbit"] ?></td>
                            </tr>

                            <tr>    
                                <td>ISBN</td>
                                <td>:</td>
                                <td><?= $item["isbn"] ?></td>
                            </tr>
                            <tr>    
                                <td>Genre</td>
                                <td>:</td>
                                <td><?= $item["genre"] ?></td>
                            </tr>
                            <tr>    
                                <td>Bahasa</td>
                                <td>:</td>
                                <td><?= $item["bahasa"] ?></td>
                            </tr>
                        </table>
                        <div>   
                        <a href="book" class="mt-4 bg-gray-500 text-white py-2 px-4 rounded-full hover:bg-gray-600 transition">Kembali</a>
                        </div>

                    </div>
                    
                <?php endforeach ?>
                
            <?php endif ?>

        </div>

    </div>

    <!-- Modal Buku -->
    <div id="bookModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-7xl w-full">
            <h3 class="text-2xl font-semibold mb-4" id="bookTitle">Baca Buku</h3>
            <iframe id="pdfIframe" class="w-full h-[600px]" src="" frameborder="0"></iframe>
            
            <!-- Kontainer tombol Selesai Membaca dan Tutup -->
            <div class="flex justify-between mt-4">
                <!-- Tombol Selesai Membaca -->
                <form method="POST">
                    <input type="hidden" id="bookName" name="book">
                    <input type="hidden" id="id_buku" name="id_buku">
                    <button type="submit" name="finishReading" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 transition">Selesai Membaca</button>
                </form>
                <!-- Tombol Tutup Modal -->
                <button onclick="closeModal()" class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 transition">Tutup</button>
            </div>
        </div>
    </div>

</body>
</html>

