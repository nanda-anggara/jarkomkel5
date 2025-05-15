-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 23.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nabiladb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `animal`
--

CREATE TABLE `animal` (
  `id` int(5) NOT NULL,
  `nama_hewan` varchar(100) NOT NULL,
  `tentang_hewan` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `animal`
--

INSERT INTO `animal` (`id`, `nama_hewan`, `tentang_hewan`, `gambar`) VALUES
(9, 'Paus Biru', 'Paus biru (Balaenoptera musculus) adalah mamalia laut terbesar di dunia dan termasuk dalam kelompok paus balin (Mysticeti). Panjangnya bisa mencapai lebih dari 30 meter, dengan berat yang melampaui 150 ton, sebanding dengan 25 gajah dewasa. Tubuhnya ramping dan berwarna biru keabu-abuan, sering kali dengan pola bercak lebih terang. Paus biru dikenal sebagai penyaring makanan yang sangat efisien, menggunakan lempengan balin di mulutnya untuk menangkap plankton dan krill, yang merupakan makanan utamanya. Hewan ini memiliki lubang sembur ganda di kepalanya, yang memancarkan semburan air setinggi 9 meter saat bernapas. Suara paus biru adalah salah satu yang paling keras di alam, digunakan untuk komunikasi jarak jauh hingga ribuan kilometer. Sayangnya, paus biru termasuk spesies yang terancam punah akibat perburuan di masa lalu dan ancaman modern seperti perubahan iklim, polusi laut, serta tabrakan kapal. Kini, upaya konservasi terus dilakukan untuk melindungi populasi mereka yang tersisa.', 'desktop-wallpaper-blue-whale-art-blue-whale.jpg'),
(10, 'Lumba Lumba', 'Lumba-lumba adalah mamalia laut yang termasuk dalam keluarga Delphinidae dan dikenal karena kecerdasannya, kecepatan berenang, serta sifat sosialnya. Hewan ini hidup di berbagai perairan, baik laut maupun sungai, dan mencakup lebih dari 40 spesies, seperti lumba-lumba hidung botol (Tursiops truncatus) yang paling terkenal, serta lumba-lumba air tawar seperti lumba-lumba sungai Amazon. Tubuh lumba-lumba ramping dan aerodinamis, memungkinkannya berenang dengan kecepatan hingga 60 km/jam. Panjang tubuhnya bervariasi tergantung spesies, biasanya antara 2 hingga 4 meter. Kulit mereka halus dan sering berwarna abu-abu dengan variasi putih atau biru di bagian bawah. Lumba-lumba bernapas melalui lubang sembur di atas kepala dan harus naik ke permukaan air secara berkala untuk mengambil udara. Lumba-lumba dikenal karena perilaku sosialnya yang kompleks. Mereka hidup dalam kelompok yang disebut pod, yang dapat terdiri dari beberapa hingga ratusan individu. Hewan ini menggunakan suara, seperti klik dan siulan, untuk berkomunikasi dan berburu mangsa, serta memanfaatkan ekolokasi untuk navigasi di perairan. Lumba-lumba memakan ikan, cumi-cumi, dan hewan laut kecil lainnya. Hewan ini sering menjadi simbol keramahan dan kecerdasan, berkat kemampuan belajar yang luar biasa, termasuk meniru suara, memecahkan masalah, dan berinteraksi dengan manusia. Namun, mereka juga menghadapi ancaman seperti polusi laut, perburuan, dan kerusakan habitat. Upaya konservasi terus dilakukan untuk melindungi populasi lumba-lumba di seluruh dunia.', 'pngtree-two-dolphins-swimming-in-the-ocean-image_2562934.jpg'),
(11, 'Paus Orca', 'Paus orca (Orcinus orca), yang sering disebut \"paus pembunuh,\" adalah mamalia laut bergigi terbesar dalam keluarga lumba-lumba (Delphinidae). Panjang tubuhnya bisa mencapai 8–10 meter dengan berat hingga 6 ton. Paus ini memiliki tubuh berwarna hitam-putih yang mencolok: punggungnya hitam, sementara perut dan sebagian sisi tubuhnya berwarna putih, dengan pola khas di sekitar mata. Orca dikenal sebagai predator puncak, yang memangsa beragam hewan laut, termasuk ikan, anjing laut, bahkan paus lainnya. Orca adalah hewan sosial dengan struktur kelompok yang kompleks, sering hidup dalam kelompok keluarga yang disebut pod. Mereka memiliki cara berkomunikasi unik menggunakan suara-suara tertentu, dan setiap pod memiliki \"dialek\" sendiri. Selain itu, orca menunjukkan perilaku berburu yang cerdas, seperti menjatuhkan anjing laut dari es atau bekerja sama untuk mengepung mangsa. Hewan ini tersebar luas di lautan seluruh dunia, dari perairan Arktik yang dingin hingga daerah tropis. Meskipun mereka tidak terancam punah secara global, beberapa populasi orca menghadapi risiko akibat polusi, penangkapan ikan berlebih, dan gangguan habitat. Keindahan, kecerdasan, dan perilaku sosial orca menjadikannya salah satu hewan laut paling menakjubkan dan menarik perhatian para ilmuwan serta pecinta alam.', 'orca.jpg'),
(15, 'Ikan Kerapu	', 'Ikan kerapu adalah ikan laut dari keluarga Serranidae, yang terkenal karena dagingnya yang lezat dan bernilai ekonomi tinggi. Ikan ini hidup di perairan tropis dan subtropis, biasanya di sekitar terumbu karang, laguna, atau daerah berbatu. Ada berbagai jenis kerapu, seperti kerapu macan (Epinephelus fuscoguttatus), kerapu bebek (Cromileptes altivelis), dan kerapu lumpur (Epinephelus coioides). Ciri khas ikan kerapu adalah tubuhnya yang besar dan tebal dengan kepala lebar serta mulut besar, yang memungkinkan mereka memangsa hewan laut seperti ikan kecil, udang, dan cumi-cumi. Kulitnya sering berwarna cokelat, hijau, atau kekuningan, dengan pola bintik atau bercak yang membantu mereka berkamuflase di lingkungan terumbu karang. Ikan ini umumnya hidup soliter, lebih aktif berburu saat malam hari (nokturnal), dan memiliki pertumbuhan yang relatif lambat. Beberapa jenis kerapu juga bersifat hermafrodit protogini, yaitu terlahir sebagai betina dan kemudian dapat berubah menjadi jantan seiring bertambahnya usia. Kerapu memiliki nilai ekonomi yang tinggi dan menjadi salah satu komoditas perikanan penting, terutama di kawasan Asia. Namun, populasi mereka menghadapi ancaman akibat penangkapan berlebihan, kerusakan habitat, dan perubahan iklim. Untuk menjaga kelestariannya, budidaya kerapu telah menjadi solusi yang semakin populer di berbagai negara.	', 'kerapu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `created_at`, `reset_token`, `reset_token_expiry`, `role_id`) VALUES
(1, 'admin', 'siapaajah@gmail.com', 'dsadsadsa', '2024-11-30 21:02:20', NULL, NULL, 1),
(2, 'gian', 'gian@gmail.com', '30', '2024-11-30 21:25:25', NULL, NULL, 2),
(3, 'TP', 'ddsa47245@gmail.com', 'dsadsa', '2024-11-30 21:48:43', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
