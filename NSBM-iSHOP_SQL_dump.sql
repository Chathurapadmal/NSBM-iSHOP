-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2024 at 05:02 AM
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
-- Database: `ishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specifications` text NOT NULL,
  `colors` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `specifications`, `colors`, `image_url`, `category`) VALUES
(4, 'Apple iPhone 16 Pro 1TB', 'The *iPhone 16 Pro 1TB* offers an unparalleled smartphone experience with cutting-edge technology and impressive storage capabilities. With a massive 1TB of internal storage, it provides ample space for all your photos, videos, apps, and files without ever worrying about running out of space. \r\n\r\nThe device boasts a stunning 6.7-inch Super Retina XDR display, offering vibrant colors, deep blacks, and high contrast for an immersive viewing experience. Powered by the latest A18 Bionic chip, it ensures lightning-fast performance, smooth multitasking, and impressive energy efficiency. \r\n\r\nThe iPhone 16 Pro features a top-tier triple-camera system, including a 48MP main sensor, 12MP ultra-wide lens, and telephoto lens, making it ideal for capturing detailed, professional-quality photos and videos. Advanced features like ProRAW and ProRes video allow users to fine-tune their content creation.\r\n\r\nWith 5G connectivity, you’ll experience ultra-fast internet speeds, while the device’s Face ID provides secure, effortless unlocking. The iPhone 16 Pro is also equipped with iOS 17, offering a host of new features, from enhanced privacy tools to AI-driven enhancements, further boosting its functionality.\r\n\r\nWhether for productivity, entertainment, or photography, the *iPhone 16 Pro 1TB* sets the bar for what’s possible in a smartphone.', 690900.00, '6.7″ Super Retina XDR display\r\nTitanium with textured matte glass back\r\nApple Intelligence\r\nA18 chip with 6-core GPU\r\nDolby Vision up to 4K at 120 fps\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 33 hours’ video playback\r\n2 Years GNEXT Warranty\r\nTRCSL APPROVED\r\nOne time FREE Display Replacement Warranty', 'white,lightblue,pink', 'uploads/Product-Template-4.png', 'iPhones'),
(5, 'Apple iPhone 16 Plus 128GB', 'The *Apple iPhone 16 Plus 128GB* combines power, style, and an excellent user experience at an accessible price point. With 128GB of internal storage, it provides ample space for all your essential apps, photos, videos, and more, ensuring you can keep everything you need right at your fingertips.\r\n\r\nThe device features a large *6.7-inch Super Retina XDR display, offering stunning visuals with bright colors, deep blacks, and high contrast for an immersive viewing experience, whether you\'re streaming content, browsing, or playing games.\r\n\r\nPowered by the latest **A18 Bionic chip, the iPhone 16 Plus ensures smooth and efficient performance, enabling you to multitask with ease, run demanding apps, and enjoy seamless gaming experiences. \r\n\r\nThe camera system includes a **12MP dual-camera setup, featuring an advanced main lens and ultra-wide lens, allowing you to capture sharp, vibrant photos and 4K video with incredible detail. Night Mode and Smart HDR also enhance low-light photography and video, making sure every shot looks its best.\r\n\r\nWith **5G support, the iPhone 16 Plus delivers fast internet speeds for streaming, downloading, and browsing. **Face ID* technology offers secure and convenient unlocking, while iOS 17 introduces a host of new features to improve the overall user experience.\r\n\r\nThe *iPhone 16 Plus 128GB* is an excellent choice for those looking for a premium smartphone with powerful features, a stunning display, and ample storage, all within an affordable package.', 406900.00, '6.7″ Super Retina XDR display\r\nApple Intelligence\r\nA18 chip with 5-core GPU\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 27 hours’ video playback\r\n2 Years GNEXT Warranty\r\nTRCSL APPROVED\r\nOne time FREE Display Replacement Warranty', 'silver,lightbrown,metalblack', 'uploads/image_2024-11-25_044428888.png', 'iPhones'),
(6, 'Apple iPhone 16 Plus 256GB', 'The *Apple iPhone 16 Plus 256GB* offers a powerful and premium smartphone experience with enhanced storage, making it perfect for users who need more space for apps, photos, videos, and files. With *256GB of internal storage, you\'ll have plenty of room for all your content, while ensuring that you don’t have to worry about running out of space anytime soon.\r\n\r\nThe **6.7-inch Super Retina XDR display* delivers a crisp, vibrant viewing experience with stunning color accuracy, deep blacks, and high contrast, whether you\'re watching videos, gaming, or browsing your favorite apps.\r\n\r\nUnder the hood, the *A18 Bionic chip* provides exceptional performance and efficiency, enabling smooth multitasking, faster app launches, and better gaming experiences, all while optimizing battery life.\r\n\r\nThe iPhone 16 Plus features an advanced *12MP dual-camera system, including a main wide lens and ultra-wide lens, for capturing high-quality photos and 4K videos. Enhanced features like **Night Mode* and *Smart HDR* improve low-light performance, ensuring your shots look great in any lighting condition.\r\n\r\nWith *5G connectivity, you’ll enjoy ultra-fast download and upload speeds, while **Face ID* ensures secure and effortless unlocking of your device.\r\n\r\nRunning on *iOS 17, the iPhone 16 Plus 256GB introduces new features, including advanced privacy settings and AI-driven enhancements, making the device smarter and more user-friendly.\r\n\r\nThe **iPhone 16 Plus 256GB* is an ideal choice for those looking for a spacious, high-performance smartphone that combines power, storage, and premium features in one sleek device.', 309900.00, '6.7″ Super Retina XDR display\r\nApple Intelligence\r\nA18 chip with 5-core GPU\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 27 hours’ video playback\r\n2 Years GNEXT Warranty\r\nTRCSL APPROVED\r\nOne time FREE Display Replacement Warranty', 'lightblue,silver,white', 'uploads/image_2024-11-25_044611420.png', 'iPhones'),
(7, 'Apple iPhone 16 Plus 512GB', 'The *Apple iPhone 16 Plus 512GB* is a premium smartphone that combines ample storage, top-tier performance, and a stunning design for users who demand the very best. With *512GB of internal storage, this iPhone offers plenty of space for your photos, videos, apps, music, and documents, making it ideal for those who need a lot of storage for media or work-related files.\r\n\r\nThe **6.7-inch Super Retina XDR display* is designed to deliver a brilliant viewing experience with vibrant colors, deep blacks, and remarkable contrast, whether you\'re watching videos, playing games, or browsing through content. The large screen size offers an immersive experience, perfect for productivity or entertainment.\r\n\r\nPowered by the cutting-edge *A18 Bionic chip, the iPhone 16 Plus ensures fast and efficient performance, handling demanding apps and multitasking with ease. The chip is optimized for gaming, augmented reality (AR), and heavy usage, all while providing excellent battery efficiency.\r\n\r\nThe **12MP dual-camera system* includes an advanced main wide lens and ultra-wide lens, offering professional-grade photo and video capabilities. Features like *Night Mode, **Smart HDR, and **Deep Fusion* enhance your images, ensuring crisp details even in low-light conditions, while *ProRAW* and *ProRes video* options cater to content creators.\r\n\r\nWith *5G connectivity, you\'ll enjoy incredibly fast internet speeds, perfect for streaming, downloading, and gaming on the go. **Face ID* provides advanced security and seamless unlocking, ensuring your device remains protected.\r\n\r\nRunning on *iOS 17, the iPhone 16 Plus 512GB comes with a range of new features, including enhanced privacy settings and smarter automation, further enhancing your experience.\r\n\r\nThe **iPhone 16 Plus 512GB* is perfect for users who need a powerful, spacious, and feature-rich device for both personal and professional use. Whether you\'re into photography, gaming, or need extra storage for your day-to-day needs, this iPhone offers it all.', 506900.00, '6.7″ Super Retina XDR display\r\nApple Intelligence\r\nA18 chip with 5-core GPU\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 27 hours’ video playback\r\n2 Years GNEXT Warranty\r\nTRCSL APPROVED\r\nOne time FREE Display Replacement Warranty', 'lightblue,silver,white', 'uploads/Apple-iPhone-16-Plus-4.png', 'iPhones'),
(8, 'Apple iPhone 16 Pro Max | 1TB', 'The *Apple iPhone 16 Pro Max 1TB* is the ultimate flagship smartphone, designed for users who demand the best in performance, storage, and cutting-edge features. With a massive *1TB of internal storage, it offers unparalleled space for all your photos, videos, apps, documents, and files—perfect for power users, content creators, and those who need extensive storage without relying on cloud services.\r\n\r\nThe **6.7-inch Super Retina XDR display* is a visual masterpiece, delivering breathtaking colors, deep blacks, and sharp details, making it ideal for everything from media consumption to productivity. The Pro Max\'s display is further enhanced by *ProMotion technology, offering a 120Hz refresh rate for incredibly smooth scrolling and responsiveness.\r\n\r\nPowered by the **A18 Bionic chip, the iPhone 16 Pro Max delivers exceptional performance and energy efficiency. Whether you\'re running demanding apps, playing graphics-intensive games, or multitasking across multiple apps, the device handles everything with ease. The chip is also optimized for advanced features like augmented reality (AR) and machine learning, further boosting the device\'s capabilities.\r\n\r\nThe **triple-camera system* is one of the most advanced ever on an iPhone. Featuring a *48MP main sensor, a **12MP ultra-wide lens, and a **telephoto lens, the iPhone 16 Pro Max captures professional-grade photos and videos. With **ProRAW, **ProRes video, and advanced features like **Night Mode* and *Deep Fusion, it excels in low-light conditions and provides the flexibility needed for content creation.\r\n\r\nWith **5G connectivity, you’ll enjoy ultra-fast speeds for streaming, downloading, and browsing. The **Face ID* technology provides secure, hassle-free unlocking, while *iOS 17* brings a host of new features, from advanced privacy settings to smarter AI integrations, enhancing your overall experience.\r\n\r\nThe *iPhone 16 Pro Max 1TB* is the epitome of smartphone technology, designed for those who want the very best in performance, storage, and features. Whether for professional work, content creation, or gaming, this device sets the standard for what a smartphone can do.', 594400.00, '6.7″ Super Retina XDR display\r\nTitanium with textured matte glass back\r\nApple Intelligence\r\nA18 chip with 6-core GPU\r\nDolby Vision up to 4K at 120 fps\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 33 hours’ video playback\r\nONE YEAR APPLE CARE WARRANTY', 'lightblue,white,silver', 'uploads/image_2024-11-25_045033735.png', 'iPhones'),
(9, 'Apple iPhone 16 Pro Max | 512GB', 'The *Apple iPhone 16 Pro Max 512GB* is a top-tier smartphone, offering powerful performance, an impressive camera system, and ample storage for users who need both power and space. With *512GB of internal storage, it provides generous space to store photos, videos, apps, and other important files, ensuring you have plenty of room for everything you need.\r\n\r\nThe device features a **6.7-inch Super Retina XDR display, delivering stunning visuals with vibrant colors, deep blacks, and sharp contrast. The **ProMotion technology* ensures a smooth 120Hz refresh rate for seamless scrolling and responsiveness, making it perfect for gaming, media consumption, and productivity tasks.\r\n\r\nAt its core, the *A18 Bionic chip* provides exceptional speed, performance, and energy efficiency. Whether you\'re multitasking between apps, playing high-end games, or using AR features, the iPhone 16 Pro Max handles everything with ease while maintaining excellent battery life.\r\n\r\nThe *triple-camera system* includes a *48MP main sensor, a **12MP ultra-wide lens, and a telephoto lens, making it perfect for capturing high-quality photos and 4K videos. With features like **ProRAW, **ProRes video, **Night Mode, and **Deep Fusion, the iPhone 16 Pro Max excels in all lighting conditions, offering professional-grade content creation capabilities.\r\n\r\nWith **5G connectivity, you’ll experience ultra-fast download speeds for streaming, gaming, and browsing. **Face ID* provides secure unlocking, while *iOS 17* brings new features and enhanced privacy tools, improving your overall experience with smarter, more personalized device management.\r\n\r\nThe *iPhone 16 Pro Max 512GB* is designed for those who demand the best in both performance and storage, offering a premium experience for gaming, content creation, photography, and everyday use. Whether you’re a professional or an enthusiast, this device delivers everything you need.', 493000.00, '6.7″ Super Retina XDR display\r\nTitanium with textured matte glass back\r\nApple Intelligence\r\nA18 chip with 6-core GPU\r\nDolby Vision up to 4K at 120 fps\r\n48MP Fusion |12MP Ultra Wide\r\nSuper-high-resolution photos\r\nEmergency SOS\r\nUp to 33 hours’ video playback\r\nONE YEAR APPLE CARE WARRANTY', 'lightblue,white,silver', 'uploads/image_2024-11-25_045131180.png', 'iPhones'),
(11, 'MacBook Air (M1, 2020)', 'The *MacBook Air (M1, 2020)* revolutionized Apple\'s laptop lineup with the introduction of the *M1 chip, offering incredible performance and efficiency in an ultra-thin, lightweight design. As the first MacBook to feature Apple\'s custom silicon, the M1 chip provides significant improvements over previous Intel-powered models, making the MacBook Air faster, more power-efficient, and capable of handling a variety of tasks with ease.\r\n\r\nWith a **13.3-inch Retina display, the MacBook Air offers crisp, vibrant visuals with True Tone technology, ensuring accurate color reproduction whether you\'re working on creative projects, watching videos, or browsing the web.\r\n\r\nThe **M1 chip* features an 8-core CPU, 7-core GPU, and a 16-core Neural Engine, delivering outstanding performance for everyday tasks like web browsing, document editing, and video conferencing, as well as more demanding activities like light photo editing, video editing, and gaming. It also boasts *unified memory architecture* (8GB or 16GB RAM), making it more efficient at handling multiple apps and tasks simultaneously.\r\n\r\nOne of the standout features of the MacBook Air (M1, 2020) is its *battery life. With up to **15 hours of wireless web browsing* and *18 hours of video playback, it offers all-day usage on a single charge, thanks to the energy efficiency of the M1 chip.\r\n\r\nThe MacBook Air is equipped with **Magic Keyboard, providing a comfortable and reliable typing experience, and features **Touch ID* for secure login and purchases. Additionally, the *Thunderbolt 3/USB-C ports* offer fast data transfer and charging capabilities.\r\n\r\nRunning on *macOS Big Sur* (and later updates), the MacBook Air (M1, 2020) is fully optimized for Apple\'s software, offering a seamless and responsive user experience. The transition to the M1 chip also means better integration with iPhone and iPad apps, thanks to Rosetta 2 and Universal apps.\r\n\r\nThe *MacBook Air (M1, 2020)* is ideal for users who need a powerful yet portable laptop for everyday computing tasks, offering incredible value, performance, and battery life in a sleek, fanless design. Whether for work, study, or personal use, it provides an exceptional experience at an accessible price.', 350000.00, 'Retina display\r\n13.3-inch (diagonal) LED-backlit display with IPS technology\r\nApple M1 chip\r\n8GB unified memory\r\nTouch ID sensor\r\nTwo Thunderbolt / USB 4 ports\r\nWith 01 Year Local + International Warranty.', 'black,silver,white', 'uploads/Mac-Book-Air-M1-1.jpg', 'MacBooks'),
(12, 'MacBook Air M2 ', 'The MacBook Air M2 is Apple\'s latest iteration of the ultra-portable and powerful MacBook Air lineup, powered by the M2 chip, which delivers a substantial performance boost over its predecessor, the M1. The M2 chip features an 8-core CPU, a 10-core GPU, and a 16-core Neural Engine, making it an excellent choice for users who need a lightweight laptop that can handle more demanding tasks, including multitasking, creative work, and productivity apps.', 380000.00, '16-core Neural Engine\r\n13.6-inch Liquid Retina display\r\n1080p FaceTime HD camera\r\nMagSafe 3 charging port\r\nTwo Thunderbolt / USB 4 ports\r\nMagic Keyboard with Touch ID\r\n30W USB-C Power Adapter\r\nWith 01-Year Local + International Warranty.', 'silver,black,white', 'uploads/image_2024-11-25_053114754.png', 'MacBooks'),
(13, 'MacBook Pro M3', 'The MacBook Pro M3 is the next evolution of Apple\'s professional-grade laptops, powered by the M3 chip, which brings significant improvements in performance, efficiency, and graphics over its predecessors. The M3 chip is built on a more advanced fabrication process, offering higher performance for both CPU and GPU tasks, making the MacBook Pro M3 an ideal choice for professionals working in areas like video editing, 3D rendering, software development, and other demanding applications.', 444900.00, 'Apple M3 chip with 8-core CPU, 10-core GPU, 16-core Neural Engine\r\n8GB unified memory\r\n512GB SSD storage\r\n14-inch Liquid Retina XDR display\r\n70W USB-C Power Adapter\r\nTwo Thunderbolt / USB 4 ports, HDMI port, SDXC card slot, headphone jack, MagSafe 3 port\r\nBacklit Magic Keyboard with Touch ID – US English\r\nWith 01-Year Local + International Warranty.', 'black,silver,white', 'uploads/image_2024-11-25_053304808.png', 'MacBooks'),
(14, 'MacBook Air M3 ', 'A sleek, lightweight laptop featuring an 8-core CPU and 8-core GPU for efficient performance. With 8GB RAM and a 512GB SSD, it ensures smooth multitasking, fast storage, and portability, making it perfect for students, professionals, and everyday use.', 424990.00, '16-core Neural Engine\r\n13.6-inch Liquid Retina display with True Tone\r\n1080p FaceTime HD camera\r\nMagSafe 3 charging port\r\nTwo Thunderbolt / USB 4 ports\r\nSupport for up to two external displays (with laptop lid closed)\r\nMagic Keyboard with Touch ID\r\nForce Touch trackpad', 'Red', 'uploads/MacBook-Air-M3-2.jpg', 'MacBooks'),
(15, 'MacBook Pro M2 Pro', 'A high-performance laptop featuring the M2 Pro chip with up to 12-core CPU and 19-core GPU, designed for demanding tasks like video editing and coding. Offers up to 32GB unified memory, superfast SSD storage, and a Liquid Retina XDR display for exceptional visuals. Ideal for professionals needing power and efficiency.', 664990.00, '16-core Neural Engine\r\n14-inch Liquid Retina XDR display\r\nMagic Keyboard with Touch ID\r\nForce Touch trackpad\r\n67W USB-C Power Adapter\r\nWith 01 Year Local + International Warranty.\r\n', 'Red', 'uploads/MacBook-Pro-M2-Pro-Grey.jpg', 'MacBooks'),
(16, 'MacBook Pro', 'A powerful and versatile laptop designed for professionals, featuring advanced processors, high-performance GPUs, up to 64GB unified memory, superfast SSDs, and a stunning Liquid Retina XDR display. Perfect for demanding workflows like video editing, coding, and graphic design.', 349990.00, 'Supercharged by M2 Chip\r\n13.3-inch Retina display\r\nUp to 24GB memory\r\nUp to 2TB storage\r\nFacetime HD Camera\r\nMagic keyboard with touch bar\r\nUp to 20Hours of battery life\r\nWith 01 Year Local + International Warranty.', 'light pink,light pink,light pink', 'uploads/MacBook-Pro-M2-1.jpg', 'MacBooks'),
(17, 'AirPods (3rd generation)', 'Wireless earbuds with a sleek design, spatial audio, adaptive EQ, and longer battery life. Sweat and water-resistant, ideal for immersive music, calls, and on-the-go use.', 51990.00, 'AirPods (3rd generation)\r\nTHIS PRODUCT IS ELIGIBLE FOR SAME DAY COLLECTION\r\n\r\nAll new with spatial audio\r\nUp to 6 hours of listening time\r\nAirPods rated IPX4 sweat and water resistant\r\nUp to 30 hours of total listening time with the case.4\r\nA great sense of detection\r\nAnnounce Notifications\r\nWith 01 Year Local + AppleCare Warranty', 'light pink,light pink,light green', 'uploads/AirPods-3-5.jpg', 'AirPods'),
(18, 'AirPods 4', 'The latest Apple earbuds feature the H2 chip for better sound, Spatial Audio, and efficient Bluetooth 5.3. Available in two versions, including a model with active noise cancellation (ANC), they offer up to 30 hours of battery life and improved comfort with a refined design', 41990.00, 'The next evolution of sound and comfort.\r\nAirPods 4 with Active Noise Cancellation also available — a first for this design.\r\nClearer calls with Voice Isolation and a new, hands-free way to interact with Siri.\r\nPower up with USB‑C, an Apple Watch charger, or a Qi‑certified charger.', 'light pink,light pink,light pink', 'uploads/AirPods-4.jpg', 'AirPods'),
(19, 'iPad Air (5th Generation)', 'Powered by the M1 chip, it delivers pro-level performance in a lightweight design. Features a 10.9-inch Liquid Retina display, 12MP cameras with Center Stage, 5G support, and compatibility with Apple Pencil (2nd Gen) and Magic Keyboard. Ideal for productivity and creativity​', 184990.00, 'SuperCharged by Apple M1 Chip\r\n12MP Ultrawide front camera\r\nBlazing fast 5G\r\nWorks with Apple Pencil & Magic keyboard\r\nFive gorgeous colors\r\nWiFi Only\r\nWith 01 Year Local + International Warranty.', 'light pink,light pink,light pink', 'uploads/iPad-Air-5-Purple.jpg', 'iPads'),
(20, 'iPad Pro 2022 11-inch (WiFi + Cellular)', 'The iPad Pro 2022 11-inch (WiFi + Cellular) is a high-performance tablet featuring Apple\'s M2 chip, delivering top-notch processing power for multitasking and demanding applications. It comes with an 11-inch Liquid Retina display supporting ProMotion and HDR, offering vibrant visuals with a smooth 120Hz refresh rate', 304990.00, 'Supercharged by M2 Chip\r\n11″ Liquid retina XDR display\r\nUltra Wide camera with a 12MP\r\nPowerful new features in iPadOS 16\r\n8‑core CPU, 10‑core GPU\r\nWith 01 Year Local + international Warranty.', 'light pink,light pink,light pink', 'uploads/iPad-Pro-2022-11-Silver.jpg', 'iPads'),
(21, 'iPad Air (M2 Chip – 11inch – WiFi Only)', 'The iPad Air (M2 Chip, 11-inch, Wi-Fi Only) offers powerful performance and portability. It features an M2 chip with an 8-core CPU, 10-core GPU, and a 16-core Neural Engine, making it excellent for multitasking, graphic-intensive tasks, and AI-based apps', 194990.00, 'Serious performance in a thin and light design.\r\n13” & 11” Liquid Retina display\r\nM2 chip\r\nLandscape 12MP Ultra Wide front camera\r\nSupports Apple Pencil Pro & Supports Apple Pencil (USB-C)', 'light pink,light pink,light pink', 'uploads/iPad-Air-6-Blue.jpg', 'iPads'),
(22, 'iPad Pro 2022 12.9-inch (WiFi + Cellular)', 'The iPad Pro 2022 (12.9-inch, WiFi + Cellular) is a high-performance tablet powered by the M2 chip, offering exceptional speed and efficiency for demanding tasks. It features a stunning Liquid Retina XDR display with vibrant colors, a resolution of 2732x2048, and a peak brightness of 1600 nits, perfect for creative professionals', 399990.00, 'Supercharged by M2 Chip\r\n12.9″ Liquid retina XDR display\r\nUltra Wide camera with a 12MP\r\nPowerful new features in iPadOS 16\r\n8‑core CPU, 10‑core GPU\r\nStorage of 256GB\r\nWith 01 Year Local + International Warranty.', 'light pink,light pink,light pink', 'uploads/iPad-Pro-2022-12.9-Grey.jpg', 'iPads'),
(23, 'Apple iPad 10th Gen (WiFi-Only)', 'The Apple iPad 10th Gen (WiFi-Only) features a 10.9-inch Liquid Retina display with a resolution of 2360 x 1640, offering vibrant visuals with True Tone technology. Powered by the A14 Bionic chip, it delivers fast performance and supports advanced machine learning with a 16-core Neural Engine. It comes with 4GB RAM and storage options of 64GB or 256GB.', 124990.03, '10.9-inch Liquid Retina display\r\nNo paring or charging required\r\nTake notes, collaborate, and work seamlessly\r\nA14 Bionic chip\r\nExpress yourself, draw, and brainstorm\r\nlandscape 12MP Ultra Wide front camera\r\n12MP Wide back camera\r\nWith 01 Year Local + International Warranty.', 'light red,light pink,light pink', 'uploads/iPad-10th-Gen-Blue.jpg', 'iPads'),
(24, 'AirPods Max', 'The AirPods Max are premium over-ear headphones by Apple, offering a high-quality listening experience with features like Active Noise Cancellation, Adaptive EQ, and Spatial Audio for immersive sound. They include a unique design with memory foam earcups and a stainless steel frame for comfort and durability', 149990.00, 'Designed for an Exceptional Fit\r\nHigh-Fidelity Audio\r\nNoise Control\r\nSpatial Audio\r\nWith 1 Year Local + International Warranty', 'light red,light red,light red', 'uploads/Apple-Airpods-Max-Silver.jpg', 'AirPods'),
(25, 'AirPods (2nd generation) with Charging Case', 'The AirPods (2nd generation) with Charging Case deliver an excellent wireless audio experience with seamless connectivity across Apple devices. They feature automatic setup, touch controls, and \"Hey Siri\" voice activation for hands-free use', 32990.00, 'More than 24 hours of listening time\r\nDual beamforming microphones\r\nDual optical sensors\r\nQuick access to Siri by saying “Hey Siri”\r\n Charging Case\r\nRich, high-quality audio and voice\r\nWith 01 Year Local + AppleCare Warranty', 'light red,light red,light red', 'uploads/Airpods-2.jpg', 'AirPods'),
(27, 'iPad Pro 2022 11-inch (WiFi + Cellular)', 'The **iPad Pro 2022 11-inch (WiFi + Cellular)** combines unmatched power and versatility, powered by the **Apple M2 chip** for pro-level performance. Its **11-inch Liquid Retina display** with ProMotion technology delivers stunning visuals, smooth scrolling, and vibrant colors. Featuring **5G connectivity**, it ensures blazing-fast internet speeds on the go.  \r\n\r\nWith support for the **Apple Pencil (2nd generation)** and the **Magic Keyboard**, it\'s perfect for creative tasks, productivity, and entertainment. Boasting a **12MP Ultra Wide front camera** with Center Stage and **12MP + 10MP rear cameras**, it excels in video calls and content creation. The iPad Pro 2022 is a sleek, powerful device designed to handle the demands of professionals and creatives alike.', 44400.00, 'Supercharged by M2 Chip\r\n11″ Liquid retina XDR display\r\nUltra Wide camera with a 12MP\r\nPowerful new features in iPadOS 16\r\n8‑core CPU, 10‑core GPU\r\nWith 01 Year Local + international Warranty.', 'lightblue,silver,black', 'uploads/image_2024-11-25_150102909.png', 'iPads'),
(28, 'MagSafe Charger', 'The **MagSafe Charger** is designed to provide seamless and efficient wireless charging for your Apple devices. It magnetically aligns with compatible iPhones, ensuring a secure connection and optimized charging performance.  \r\n\r\n- **Fast Charging**: Delivers up to **15W of power** for iPhones and supports Qi wireless charging for other devices.  \r\n- **Compatibility**: Works perfectly with iPhone models starting from the iPhone 12 series and also charges AirPods with wireless charging cases.  \r\n- **Sleek Design**: Compact and portable, with a soft-touch finish for durability and elegance.  \r\n\r\nThe MagSafe Charger is a must-have accessory for a modern, cable-free charging experience.', 5000.00, 'wireless charging a snap\r\nperfectly aligned magnets\r\nwireless charging up to 15W\r\nUSB-C integrated cable', 'white,white,white', 'uploads/image_2024-11-25_150208580.png', 'AirPods'),
(29, 'AirPods Pro (2nd generation)', 'The **AirPods Pro (2nd generation) with MagSafe Charging Case (USB-C)** deliver unparalleled audio quality and convenience with enhanced features:  \r\n\r\n- **Active Noise Cancellation**: Blocks out external noise for immersive listening.  \r\n- **Adaptive Transparency**: Lets important sounds through while reducing harsh noise.  \r\n- **Personalized Spatial Audio**: Creates a surround sound experience tailored to you.  \r\n- **Improved Battery Life**: Enjoy up to **6 hours of listening time** on a single charge and up to **30 hours with the case**.  \r\n- **MagSafe Charging Case**: Now with **USB-C** for faster, more versatile charging, and built-in speakers for precision location using Find My.  \r\n\r\nThese AirPods Pro are the ultimate choice for immersive, high-quality audio and seamless Apple ecosystem integration.', 64900.00, 'Adaptive Audio\r\nActive Noise Cancellation and Transparency mode\r\nConversation Awareness¹⁶\r\nPersonalized Spatial Audio with dynamic head tracking\r\nDust, sweat, and water resistant AirPods and charging case\r\nMagSafe Charging Case (USB‑C) with speaker¹⁷ and lanyard loop\r\nWith 01 Year Apple Limited Warranty.', 'black,white,silver', 'uploads/image_2024-11-25_150402994.png', 'AirPods'),
(30, 'i 7', 'sdvsvsvasvs', 123456.00, 'sdjsvsdhvksh\r\nsdkdsvhhvbs\r\nsvhdjvhsd\r\nskjvbjshv\r\nksfjfvhs', 'lightblue,white,green', 'uploads/Apple-M4-chip-iPad-Pro-silver-and-space-black_X.png', 'iPhones');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
