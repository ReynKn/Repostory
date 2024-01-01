-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 04:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riaustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `dash`
--

CREATE TABLE `dash` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` bigint(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi` int(11) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash`
--

INSERT INTO `dash` (`id`, `nama`, `nim`, `jenis_kelamin`, `email`, `prodi`, `asal_sekolah`, `no_hp`, `alamat`) VALUES
(37, 'Ardiyant', 1657301049, 'Laki-laki', 'ardiyanto@alumni.pcr.ac.id', 18, 'MAN ', 55, 'Rumbai'),
(38, 'Freddy Fazzbear', 1757301037, 'Laki-laki', 'uunsi@alumni.pcr.ac.id', 18, 'SMKN 1 Sumbar', 2245345, 'Umban Sari'),
(39, 'OREO', 2255301166, 'Laki-laki', 'OEREO22TI@MAHSSIWA.PCR.AC.ID', 18, 'SMKS YPPI TUALANG', 809, 'Rumah'),
(40, 'insane people', 35645645747, 'Laki-laki', 'renolzdong@gmail.com', 18, 'Hutan', 85464565756, 'rumbai'),
(43, 'makhluks', 1518515, 'Laki-laki', 'makhluk@gmail.com', 18, 'Disana', 8, 'disana');

-- --------------------------------------------------------

--
-- Table structure for table `formd`
--

CREATE TABLE `formd` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `gambar_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formd`
--

INSERT INTO `formd` (`id`, `nama_lengkap`, `tanggal`, `jenis_kelamin`, `email`, `username`, `gambar`, `gambar_ktp`) VALUES
(2, 'Polinotoka', '3222-08-12', 'Laki-laki', 'a@example.com', 'poligustov', 'default_ktp1.jpg', 'default_pet1.jpg'),
(3, 'weminu', '2023-02-02', 'perempuan', 'ardiyanto@alumni.pcr.ac.id', 'user', 'default_ktp2.jpg', 'hutao1.png'),
(4, 'kuntilinigg', '1000-10-08', 'Laki-laki', 'dosen@gmail.com', 'capybara', 'default_ktp3.jpg', 'hutao2.png'),
(6, 'anjay', '0999-12-07', 'Laki-laki', 'erick@gmail.com', 'bobby', 'alhaitam1.png', 'hutao21.png'),
(7, 'Polinotoka', '2007-03-11', 'perempuan', 'q@q', 'poligustov', 'default_pet11.jpg', 'default_ktp31.jpg'),
(8, 'Hermit Kernividulcth Tovish', '2020-08-10', 'perempuan', 'Hermit@gmail.com', 'Ann', 'default_pet2.jpg', 'default_ktp4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `payment_status`, `order_date`, `action`) VALUES
(1, 11, 14, 1, 0, 'Sudah\r\n', '2024-01-01 07:02:43', ''),
(2, 11, 14, 2, 0, 'Sudah\r\n', '2024-01-01 07:03:18', ''),
(3, 11, 14, 3, 0, 'Sudah', '2024-01-01 14:40:08', ''),
(4, 11, 15, 4, 350000, 'Sudah', '2024-01-01 07:03:18', ''),
(5, 11, 16, 5, 90000, 'Sudah', '2024-01-01 07:03:18', ''),
(6, 12, 17, 7, 830000, 'Sudah', '2024-01-01 07:03:18', ''),
(7, 12, 18, 8, 90000, 'Sudah', '2024-01-01 07:03:49', ''),
(8, 13, 20, 10, 90000, 'Sudah', '2024-01-01 07:03:49', ''),
(9, 7, 23, 16, 45000, 'Sudah', '2024-01-01 07:03:49', ''),
(10, 12, 24, 18, 900000, 'Lunas', '2024-01-01 11:24:13', ''),
(11, 12, 25, 20, 65000, 'Sudah', '2024-01-01 07:00:23', ''),
(12, 13, 26, 22, 230000, 'Sudah', '2024-01-01 07:00:13', ''),
(13, 13, 28, 24, 105000, 'Lunas', '2024-01-01 14:10:05', ''),
(14, 12, 29, 25, 105000, 'Lunas', '2024-01-01 14:09:58', ''),
(15, 12, 30, 26, 105000, 'Belum Lunas', '2024-01-01 14:36:27', ''),
(16, 12, 31, 27, 90000, 'Belum Lunas', '2024-01-01 14:41:05', ''),
(17, 12, 32, 29, 105000, 'Lunas', '2024-01-01 14:10:07', ''),
(18, 12, 33, 31, 495000, 'Sudah', '2024-01-01 14:35:20', ''),
(19, 12, 34, 33, 60000, 'Sudah', '2024-01-01 14:40:08', ''),
(20, 12, 35, 0, 900000, 'Belum Lunas\r\n', '2024-01-01 14:32:49', ''),
(21, 12, 36, 35, 195000, '', '2024-01-01 14:46:41', ''),
(23, 7, 38, 38, 900000, '', '2024-01-01 14:56:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, 4, 4, 'Cedea Fish Dumpling Cheese', 350000, 1, 'foto4.jpg'),
(2, 5, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(3, 6, 5, 'Duo Twister Ikan Olahan', 45000, 3, 'foto515.jpg'),
(4, 6, 4, 'Cedea Fish Dumpling Cheese', 350000, 1, 'foto4.jpg'),
(5, 6, 3, 'Cedea Ikan Olahan ', 30000, 1, 'foto3.jpg'),
(6, 6, 1, 'Crispy Chicken bellfoods', 450000, 1, 'foto1.jpg'),
(7, 7, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(8, 8, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(9, 11, 2, 'Bakso Udang Shifudosaki', 65000, 3, 'foto2.jpg'),
(10, 11, 6, 'Ikan Aja', 35000, 2, 'foto122.jpg'),
(11, 12, 6, 'Ikan Aja', 35000, 1, 'foto122.jpg'),
(12, 15, 5, 'Duo Twister Ikan Olahan', 45000, 1, 'foto515.jpg'),
(13, 15, 2, 'Bakso Udang Shifudosaki', 65000, 1, 'foto2.jpg'),
(14, 15, 4, 'Cedea Fish Dumpling ', 35000, 2, 'foto4.jpg'),
(15, 15, 1, 'Crispy Chicken bellfoodszszszs', 45000, 2, 'foto1.jpg'),
(16, 9, 5, 'Duo Twister Ikan Olahan', 45000, 1, 'foto515.jpg'),
(17, 10, 3, 'Cedea Ikan Olahan ', 30000, 30, 'foto3.jpg'),
(18, 11, 2, 'Bakso Udang Shifudosaki', 65000, 1, 'foto2.jpg'),
(19, 12, 6, 'Ikan Aja', 35000, 4, 'foto122.jpg'),
(20, 12, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(21, 13, 4, 'Cedea Fish Dumpling ', 35000, 3, 'foto4.jpg'),
(22, 14, 4, 'Cedea Fish Dumpling ', 35000, 3, 'foto4.jpg'),
(23, 15, 4, 'Cedea Fish Dumpling ', 35000, 3, 'foto4.jpg'),
(24, 16, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(25, 17, 6, 'Ikan Frozen Food Chikuwa Cedea', 35000, 3, 'foto122.jpg'),
(26, 18, 5, 'Duo Twister Ikan Olahan', 45000, 11, 'foto515.jpg'),
(27, 19, 6, 'Ikan Frozen Food Chikuwa Cedea', 35000, 30, 'foto122.jpg'),
(28, 20, 5, 'Duo Twister Ikan Olahan', 45000, 20, 'foto515.jpg'),
(29, 21, 2, 'Bakso Udang Shifudosaki', 65000, 3, 'foto2.jpg'),
(30, 22, 6, 'Ikan Frozen Food Chikuwa Cedea', 35000, 2, 'foto122.jpg'),
(31, 22, 1, 'Crispy Chicken bellfoodszszszs', 45000, 1, 'foto1.jpg'),
(32, 23, 5, 'Duo Twister Ikan Olahan', 45000, 20, 'foto515.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_image` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_type`, `payment_image`, `action`) VALUES
(11, 'Mandiri', 'bukti.png\r\n', ''),
(12, 'BCA', 'bukti.png', ''),
(13, 'BCA', 'bukti.png', ''),
(14, 'Mandiri', 'bukti.png', ''),
(15, 'Cash On Delivery', '', ''),
(16, 'Panin', 'bukti.png', ''),
(17, 'Panin', 'bukti1.png', ''),
(18, 'Mandiri', 'bukti.png', ''),
(19, 'Mandiri', 'bukti.png', ''),
(20, 'BCA', 'bukti.png', ''),
(21, 'BCA', 'bukti.png', ''),
(22, 'BRI', 'bukti.png', ''),
(23, 'BRI', 'bukti1.png', ''),
(24, 'Cash On Delivery', 'silviacool.png\r\n', ''),
(25, 'BRI', 'bukti.png', ''),
(26, 'BCA', 'bukti.png', ''),
(27, 'BRI', 'bukti.png\r\n', ''),
(28, 'BRI', 'Screenshot_2023-08-03_223958.png', ''),
(29, 'BRI', 'silviacool.png\r\n', ''),
(30, 'BRI', 'silviacool.png', ''),
(32, 'BCA', 'bukti2.png', ''),
(33, 'Panin', 'logo.jpg', ''),
(34, 'Panin', 'logo2.jpg', ''),
(35, 'BCA', 'ERD.png', ''),
(36, 'BCA', 'ERD.png', ''),
(37, 'Mandiri', '', ''),
(38, 'BCA', 'ERD2.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `akreditasi` varchar(15) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `output_lulusan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`, `ruangan`, `jurusan`, `akreditasi`, `nama_kaprodi`, `tahun_berdiri`, `output_lulusan`, `gambar`) VALUES
(18, 'Teknik Informatika', '327', 'JTI', 'A', 'Kartina Diah Kesuma Wardhani, S.T., M,T,', 2008, 'Multimedi', 'default.jpg'),
(19, 'Kedkteran', '2', 'JTI', 'A', 'p', 2008, 'Business', 'default.jpg'),
(20, 'Teknik Mesin', 'Surga', 'kedokteran gigi', 'A', 'Agnessss', 2050, 'Kedokteran gigi', 'default.jpg'),
(23, 'o', '328', 'JTI', 'A', 'p', 2002, 'Multimedi', 'default1.jpg'),
(24, 'Teknik Rekayasa Komputer', '318', 'JTI', 'A', 'Dr. Eng. Yoanda Alim Syahbana, S.T., M.Sc', 2008, 'IOT', 'trk1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` bigint(30) NOT NULL,
  `product_feature` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `created_at`) VALUES
(1, 'Crispy Chicken bellfoodszszszs', 'Ayam Goreng Renyah (Crispy Chicken), bellfoods', 'foto1.jpg', 45000, 30, 1, '2023-12-30 05:12:19'),
(2, 'Bakso Udang Shifudosaki', 'Shifudo, Bakso Udang Beku', 'foto2.jpg', 65000, 25, 1, '2023-12-30 05:13:19'),
(3, 'Cedea Ikan Olahan ', 'Ikan Olahan Cedea (Flower Twister)', 'foto3.jpg', 30000, 45, 1, '2023-12-26 09:50:52'),
(4, 'Cedea Fish Dumpling ', 'Cedea Fish Dumpling Cheese, Dumpling Ikan dengan isi Keju', 'foto4.jpg', 35000, 35, 1, '2023-12-30 05:07:57'),
(5, 'Duo Twister Ikan Olahan', 'i', 'foto515.jpg', 45000, 50, 0, '2023-12-27 12:54:02'),
(6, 'Ikan Frozen Food Chikuwa Cedea', 'Frozen Food Cedea Chikuwa Ikan', 'foto122.jpg', 35000, 50, 0, '2024-01-01 10:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `customer_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`) VALUES
(9, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(10, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(11, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(12, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(13, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(14, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(15, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(16, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(17, 0, 'twice', 'twice@gmail.com', 'twiceeria', '123'),
(18, 0, 'dedek', 'dedek@gmail.com', 'rumhnya', '1234'),
(19, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '1234'),
(20, 0, 'Polygon', 'polipo@gmail.com', 'cus', '1234'),
(21, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '1234'),
(22, 0, 'Custoemr1', 'dedek@gmail.com', 'cus', '08192'),
(23, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(24, 0, 'Polygon', 'dedek@gmail.com', 'polypon', '1234'),
(25, 0, 'Custoemr1', 'customer1@gmail.com', 'cus', '0812'),
(26, 0, 'disana', 'polipo@gmail.com', 'rumhnya', '08192'),
(27, 0, 'Polygon', 'dedek@gmail.com', 'rumhnya', '08192'),
(28, 0, 'Polygon', 'polipo@gmail.com', 'rumhnya', '08192'),
(29, 0, 'Nama', 'Email@gmail.com', 'Alamat', '123'),
(30, 0, 'twice', 'polipo@gmail.com', 'cus', '1234'),
(31, 0, 'Custoemr1', 'dedek@gmail.com', 'twiceeria', '08192'),
(32, 0, 'disana', 'polipo@gmail.com', 'cus', '1234'),
(33, 0, 'Polygon', 'polipo@gmail.com', 'rumhnya', '08192'),
(34, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '08192'),
(35, 0, 'dedek', 'polipo@gmail.com', 'cus', '123'),
(36, 0, 'Polygon', 'dedek@gmail.com', 'rumhnya', '08192'),
(37, 0, 'dedek', 'dedek@gmail.com', 'cus', '1234'),
(38, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` bigint(15) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_phone`, `role`, `date_created`) VALUES
(2, 'a', 'a@gmail.com', 'a', '', 0, 'User', '2023-12-28 14:31:45'),
(4, 'Hermit', 'Hermit@gmail.com', '$2y$10$lUrlghih5pq.eH49QS/QE.ceX6gUxJHtMIv99sfcLuD8y5pRQZSuq', '', 0, 'Admin', '2023-12-28 14:31:45'),
(5, 'qwq', 'wqw@gmail.com', '$2y$10$lZE8aL.0Bu0J2vomD1Ob7u7R3fsqRUUpfXmZQHBmN4CfoPNXwHNSW', '', 0, 'User', '2023-12-28 14:31:45'),
(7, 'Admin', 'admin@gmail.com', '$2y$10$t9G8YpgRSAnt/mLCWg69.OWBeHj9dEkmEpH6YLkXh6WC5u.AhWloO', '', 0, 'Admin', '2023-12-28 14:31:45'),
(8, 'ReynK', 'reyn@gmail.com', '$2y$10$VSMPySF9AA2wPXz4eCvH4.GUpOUtGRh5l9tbWAxDEcvozcAoCVvey', '', 0, 'User', '2023-12-28 14:31:45'),
(9, 'yoku', 'yokult@gmail.com', '$2y$10$IB8FOqAXmn9KNeiVQ101AeZHlTSIvC7nyHV4pFMhLKaF9t2GrFMbe', '', 0, 'User', '2023-12-28 14:31:45'),
(10, 'customer', 'customer@gmail.com', '$2y$10$G.dO02t1VmN706qn9M/KMOHSvR0nEl4J0Aw82VnKC01BLwbURvula', '', 0, 'User', '2023-12-28 14:31:45'),
(11, 'customer1', 'customer1@gmail.com', '$2y$10$C45Bm57xrOuWCCtYVTefpuh4bg.JkRsdGSlLDLcM8zmnLcv/lrjl2', '', 0, 'User', '2023-12-28 14:31:45'),
(12, 'twice', 'twice@gmail.com', '$2y$10$h47nXs0q.eIN5oA4aw03M.xrGcwYU.QEMSsqTX7DVqhbs6OORhrRC', 'twice', 123, 'User', '0000-00-00 00:00:00'),
(13, 'ricks', 'ricks@gmail.com', '$2y$10$DE59T6iXBzjmk.hF.giDj.7NjgXABeVuPNL3otNdHYZ7jgfy8BV5G', 'ricku', 0, 'User', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dash`
--
ALTER TABLE `dash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi` (`prodi`);

--
-- Indexes for table `formd`
--
ALTER TABLE `formd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `cust` (`customer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dash`
--
ALTER TABLE `dash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `formd`
--
ALTER TABLE `formd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dash`
--
ALTER TABLE `dash`
  ADD CONSTRAINT `prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
