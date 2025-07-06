-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 03:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcherry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_name`, `price`, `image`, `quantity`) VALUES
(7, 1, '11', 'Admin Pic', '5000.00', 'uploads/686918a884576_ADMIN.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productDescription` text NOT NULL,
  `keyBenefits` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productImage`, `productPrice`, `productDescription`, `keyBenefits`, `created_at`) VALUES
(1, 'TTest', 'uploads/68690caadbee6_iq test.png', 20.00, 'Test', 'Key test', '2025-07-05 11:29:46'),
(2, 'Sky Blue Solid Polyester Satin', './media/img/fabric.jpg', 40.00, 'Elevate your sewing projects with the Sky Blue Solid Polyester Satin – a smooth, lustrous fabric that combines elegance with versatility. With its soft sheen and silky touch, this satin is perfect for creating everything from elegant garments to decorative crafts and accessories.', 'Smooth & Easy to Sew: Glides easily under the machine, great for both beginners and experienced sewers.\nVibrant Color: The rich sky blue hue adds a calming, polished look to any project.\nWrinkle-Resistant & Durable: Maintains its shape and shine after washes, perfect for long-lasting creations.\nVersatile Use: Suitable for clothing, crafts, décor, event styling, and cosplay.\nCost-Effective Elegance: Get the look of luxury at an affordable price.', '2025-07-05 11:45:36'),
(3, 'Cabana Striped Dinner Plates', './media/img/plate.png', 135.00, 'Crafted from durable, food-safe ceramic or porcelain, each plate is designed to be both microwave and dishwasher safe, making cleanup easy and dining hassle-free. The wide surface offers plenty of space for your favorite dishes, whether it\'s a colorful summer salad or a hearty home-cooked dinner.', 'Easy to Clean: Dishwasher-safe material makes post-meal cleanup effortless.\nMicrowave-Safe: Perfect for reheating leftovers or keeping food warm.\nDurable & Practical: Built for daily use without compromising on style.\nVersatile Design: Suitable for everyday meals, brunches, or entertaining guests with a chic coastal vibe.', '2025-07-05 11:45:36'),
(4, 'Summer Beach Collage Matte Print', './media/img/wall poster.png', 89.00, 'Printed on high-quality matte paper, the artwork delivers a smooth, glare-free finish that looks stunning in any light. Whether you\'re decorating a bedroom, studio, or creative space, this wall print instantly adds a soft, breezy aesthetic that refreshes your surroundings and lifts your mood.', 'Aesthetic Appeal: The soft summer tones and curated imagery create a relaxing visual focal point.\nMood-Enhancing: Inspires calm, creativity, and positive vibes—perfect for spaces where you want to unwind or feel inspired.\nMatte Finish: No glare, no reflections—just clean, crisp visuals that stay vivid over time.\nReady to Frame: Available in standard sizes for easy framing and hanging.', '2025-07-05 11:45:36'),
(5, 'Stationery Blue Gel Pen (4 pcs)', './media/img/pen.png', 116.00, 'Each pen features a fine-tip point for precision writing and a comfortable grip that makes long writing sessions effortless. The quick-drying gel ink flows smoothly without skips or smudges, making your writing look clean and crisp every time.', 'Smooth Writing: Gel ink glides effortlessly across the page with rich, consistent color.\nPerfect for Study or Work: Ideal for highlighting important notes, underlining ideas, or writing with clarity and style.\nNo Smudges or Skips: Fast-drying formula prevents ink smears—great for left-handed writers too.\nPortable & Stylish: Sleek design fits easily into pencil cases, planners, or pockets.\nSet of 4: Keeps you stocked at home, school, or the office.', '2025-07-05 11:45:36'),
(6, 'Three-Sided Ruler (3 pcs)', './media/img/three sided ruler.png', 94.00, 'Made from durable, lightweight plastic or aluminum, these rulers are built to last and stay accurate over time. Whether you\'re drafting blueprints, sketching designs, or solving math problems, this set helps you measure, draw, and align with total confidence.', 'Multi-Angle Design: Each ruler features three sides with various scale markings—ideal for technical drawings, geometric designs, or classroom use.\nDurable & Lightweight: Built to withstand daily use without bending or breaking.\nPerfect for Learning & Work: Great for students, professionals, or hobbyists needing reliable precision.\nTime-Saving Tool: Quickly switch between measurements without needing multiple tools.', '2025-07-05 11:45:36'),
(7, 'Transparent Sakura Umbrella', './media/img/umbrella 2.webp', 203.00, 'Step into elegance and serenity with the Blue Shade Sakura Umbrella, a perfect blend of beauty and function. Inspired by the delicate bloom of cherry blossoms under a tranquil sky, this umbrella features a graceful sakura design set against calming shades of sky blue and deep indigo—bringing a touch of Japanese charm to your everyday essentials.', 'UV Protection: Blocks harmful UV rays, making it perfect for sunny days.\nWaterproof & Windproof: High-quality canopy keeps you dry, while the sturdy frame resists flipping in strong gusts.\nCompact & Lightweight: Folds easily into your bag, ideal for travel or everyday carry.\nAesthetic Design: The soft sakura patterns evoke peace and grace, making it a stylish statement piece.', '2025-07-05 11:45:36'),
(8, 'Shade Blue Highlighter (8 pcs)', './media/img/markers.png', 158.00, 'Highlight with style and clarity using the Shade Blue Highlighter Set, a pack of 8 beautifully toned blue highlighters designed to make your notes stand out—without overwhelming the page. With soft to deep blue shades, this set offers a cool, cohesive aesthetic perfect for planners, study notes, journals, and creative projects.', '8 Unique Shades of Blue: Great for organizing notes by tone or simply adding a clean, calming vibe to your work.\nDual-Use Tip: Highlight thick lines or underline with precision—all in one tool.\nPerfect for Studying & Journaling: Keep your pages neat, readable, and visually engaging.\nNo Bleed, No Mess: Quick-dry ink keeps your work smudge-free and crisp.\nAesthetic Stationery Must-Have: Ideal for students, artists, and stationery lovers alike.', '2025-07-05 11:45:36'),
(9, 'Acrylic Pen Shelf Three Slots', './media/img/acrylic shelf.png', 139.00, 'Keep your workspace clean, stylish, and organized with the Acrylic Pen Shelf – Three Slots, a sleek and minimal display stand designed to showcase your favorite pens, markers, or tools with elegance and ease. Crafted from high-quality clear acrylic, this shelf blends seamlessly with any desk setup or aesthetic space.', 'Organized & Accessible: Keeps your most-used tools visible and within easy reach.\nClutter-Free Desk: Reduces mess while adding a clean, polished look to your workspace.\nTransparent Design: The clear acrylic complements any color scheme or aesthetic style.\nDurable & Easy to Clean: Made from sturdy, scratch-resistant acrylic that\'s easy to wipe down.\nMultipurpose Use: Great for students, artists, writers, or anyone who loves a neat and creative space.', '2025-07-05 11:45:36'),
(10, 'Admin Pic', 'uploads/686918923da02_ADMIN.png', 5000.00, 'This is plaplaplaplaplaplaplap', 'Admin is Good.\r\nAdmin is Great.\r\nAdmin is God.', '2025-07-05 12:20:34'),
(11, 'Admin Pic', 'uploads/686918a884576_ADMIN.png', 5000.00, 'This is plaplaplaplaplaplaplap', 'Admin is Good.\r\nAdmin is Great.\r\nAdmin is God.', '2025-07-05 12:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `username`, `phone`, `address`, `created_at`) VALUES
(1, 'test@email.com', 'Tester 1', '$2y$10$9W/9XLGE74Mx0h5liZA3VexA8jR.Au8o.FcpP9c.Uf20toSce7nrm', 'tester1', '12121212', 'walang halaga', '2025-07-03 10:50:45'),
(2, 'hyrkan@email.com', 'Hyrkan Gamez', '$2y$10$AtgxrN5rYbhFlpSD2OdqTuCJ2leX9WwGXWwOkVSC2M0UDBTodYCdW', 'Hyrkan', '123123123123', 'lia', '2025-07-03 11:49:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
