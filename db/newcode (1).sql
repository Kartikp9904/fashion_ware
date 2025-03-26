-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 06:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'Kartik12', 'Kartikp9904');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `proid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `proid`, `userid`, `qty`, `size`) VALUES
(10, 8, 3, 4, ''),
(11, 16, 3, 7, ''),
(12, 12, 1, 0, ''),
(13, 10, 1, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(3, 'WOMEN'),
(9, 'MEN'),
(13, 'Custom');

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE `fabric` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ctype` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`id`, `name`, `ctype`, `image`, `price`, `status`) VALUES
(25, 'BRAGA', 'COTTON', '503009484_braga.jpg', 140, 1),
(28, 'BELMONT BLUE', '', '931694529_fullselveebbelmoont.jpg', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `price`, `qty`, `image`, `short_desc`, `description`, `status`) VALUES
(8, 3, 'Straight Kurta', 500, 10, '193127924_picw2.jpeg', 'Women Printed Pure Cotton Straight Kurta', 'This stylish Woven Design kurta from janasya is made of Pure Cotton and is Pink in color. It features 3/4 Sleeve, V Neck, Straight and it is a Calf Length kurta that is suitable for Casual occasions or a day out. Unlock the secret of ultimate comfort wearing this Pink colored kurta specially designed to suit your taste. Made from Pure Cotton, it is light in weight and perfect for daily wear. Team it up with matching pants or legging, sandals and minimal jewellery and get a trendy look.', 1),
(9, 9, 'Mandarin Collar', 540, 10, '214363966_pic3.jpeg', 'Solid Men Mandarin Collar White, Black T-Shirt', 'Type : Mandarin Collar\r\nSleeve : Full Sleeve\r\nFit : Regular\r\nFabric : Cotton Blend\r\nPack of : 1\r\nStyle Code : FC4058\r\nNeck Type : Mandarin Collar\r\nIdeal For : Men\r\nSize : M\r\nPattern : Solid\r\nSuitable For : Western Wear\r\nBrand Fit : Regular\r\nSleeve Type : Narrow\r\nReversible : No\r\nFabric Care : Machine wash as per tag\r\nLatest men t shirts full sleeve from FastColors, This Mandarin Collar TShirts men offers a Fashion and Trendy look for true business men working from home and a perfect all day cotton t shirt suitable for summer season. Wear it with trendy FastColors Bottomwear to have fashion look. Wear it with face mask to safeguard yourself. Whatever the occasion this tshirt full hand will be your choice. The style you want and the summer feel you need all rolled into this T-Shirt. Wear it for monsoon too. Trusted brand online and no compromise on quality', 1),
(10, 3, 'YESLY Kurta', 500, 10, '311987064_picw3.jpeg', 'Women Solid Rayon Anarkali Kurta', 'Ideal For : Women\r\nLength Type : Calf Length\r\nBrand Color : Pink\r\nOccasion : Casual\r\nPattern : Solid\r\nType : Anarkali\r\nFabric : Rayon\r\nNeck : Round Neck\r\nSleeve : 3/4 Sleeve\r\nColor : Pink\r\nNumber of Contents in Sales Package : Pack of 1\r\nFabric Care : Gentle Machine Wash\r\nStyle Code : A J-001-PINK\r\nPackage contains : 1 Kurta\r\nGeneric Name : Kurta\r\nCountry of Origin : India', 1),
(11, 9, 'MoonVelly', 400, 10, '460792632_pic1.jpeg', 'Men Solid Cotton Blend Straight Kurta', 'Ideal For : Men\r\nLength Type : Long\r\nOccasion : Casual\r\nPattern : Solid\r\nType : Straight\r\nFabric : Cotton Blend\r\nNeck : Mandarin/Chinese Neck\r\nSleeve : Full Sleeve\r\nNumber of Contents in Sales Package : Pack of 1\r\nFabric Care : Regular Machine Wash\r\nStyle Code : KURTA-001\r\nPackage contains : 1 KURTA', 1),
(12, 9, 'Folgen', 400, 10, '527825026_pic2.jpeg', 'Men Self Design, Solid Cotton Blend Straight Kurta', 'FOLGEN MENS KURTA :We are an emerging global online retailer of ethnic wear from India: Our vision is to provide excellent customer quality and latest fashion in contemporary ethnic wear.:This product is made of cotton blended material. :Disclaimer: Product color may slightly vary due to Photographic Lighting Sources or your Display Settings', 1),
(13, 3, 'Anarkali Kurta', 600, 10, '686263544_picw1.jpeg', 'Women Printed Rayon Anarkali Kurta  (Multicolor)', 'Ideal For : Women\r\nLength Type : Ankle Length\r\nBrand Color : Black\r\nOccasion : Casual\r\nPattern : Printed\r\nType : Anarkali\r\nFabric : Rayon\r\nNeck : Round Neck\r\nSleeve : 3/4 Sleeve\r\nColor : Multicolor\r\nNumber of Contents in Sales Package : Pack of 1\r\nStyle Code : AJ-517', 1),
(14, 3, 'Dhirai Kurta', 800, 10, '144299451_picw6.jpeg', 'Women Kurta and Sharara Set Rayon', 'Fabric : Rayon\r\nType : Kurta and Sharara Set\r\nSales Package : Kurta, Sharara, Dupatta\r\nStyle Code : DS011\r\nSecondary color : Gold\r\nTop fabric : Rayon\r\nBottom fabric : Rayon\r\nTop type : Anarkali\r\nBottom type : Sharara\r\nPattern : Printed\r\nColor : Maroon\r\nNeck : Round Neck\r\nFabric care : First Wash Separate after that Gentle Machine or Hand Wash', 1),
(15, 3, 'Baba Kutri', 500, 10, '713766550_picw4.jpeg', 'Women Kurta and Dupatta Set Rayon', 'Fabric : Rayon\r\nType : Kurta and Dupatta Set\r\nSales Package : 1 KURTI WITH 1 DUPATTA\r\nStyle Code : BKGREEN\r\nSecondary color : Gold\r\nTop fabric : Rayon\r\nBottom fabric : Rayon\r\nTop type : Kurta\r\nPattern : Printed\r\nColor : Green\r\nNeck : Round Neck\r\nFabric care : Dry clean only', 1),
(16, 3, 'Trivety', 600, 10, '589041661_picw5.jpeg', 'Women Kurta and Dupatta Set Rayon', 'Fabric : Rayon\r\nType : Kurta and Dupatta Set\r\nSales Package : 1 Kurti With 1 Dupatta , Pant .\r\nStyle Code : SW.Bunaai.Purple\r\nTop type : Anarkali\r\nPattern : Printed\r\nColor : Purple', 1),
(17, 3, 'SANGAKURT', 1000, 10, '350154907_picw7.jpeg', 'Women Palazzo and Dupatta Set Cotton Blend', 'Fabric : Cotton Blend\r\nType : Palazzo and Dupatta Set\r\nSales Package : Kurta Pant With Dupatta\r\nStyle Code : LF-372_M\r\nSecondary color : Grey\r\nTop fabric : Cotton\r\nBottom fabric : Cotton\r\nTop type : Kurta\r\nBottom type : Pant\r\nPattern : Floral Print\r\nColor : Grey\r\nNeck : Mandarin Collar\r\nSeason : AW16\r\nFabric care : Machine Wash\r\nNew Women Beautiful Designer Kurtas These Attractive Kurta are Beautifully Designed You can happily use these anywhere.with finest quality gives you great comfort and Suitable on any occasion and gives you a trendy look with SANGAKURTI.', 1),
(18, 3, 'Gulmohar Jaipur', 500, 10, '672143011_picw8.jpeg', 'Women Solid Rayon Asymmetric Kurta  (Yellow)', 'Ideal For : Women\r\nLength Type : Calf Length\r\nBrand Color : Mustard\r\nOccasion : Casual\r\nPattern : Solid\r\nType : Asymmetric\r\nFabric : Rayon\r\nNeck : Round Neck\r\nSleeve : 3/4 Sleeve\r\nColor : Yellow\r\nNumber of Contents in Sales Package : Pack of 1\r\nFabric Care : Gentle Machine Wash\r\nStyle Code : GC31300MUSTARD\r\nPackage contains : Kurta\r\nDouble your fashion flair as you wear this Beautiful Kurta from the house of Gulmohar Jaipur. Look classy and stylish in this piece and revel in the comfort of its Cotton fabric. This Kurta ensures breathability and super comfort. This attractive Kurta will surely fetch you compliments for your rich sense of style.', 1),
(19, 3, 'Frontslit Kurta', 500, 10, '773567067_picw9.jpeg', 'Women Floral Print Rayon Frontslit Kurta  (Black)', 'Ideal For : Women\r\nLength Type : Ankle Length\r\nBrand Color : Black\r\nOccasion : Casual\r\nPattern : Floral Print\r\nType : Frontslit\r\nFabric : Rayon\r\nNeck : Round Neck\r\nSleeve : Sleeveless\r\nColor : Black\r\nNumber of Contents in Sales Package : Pack of 1\r\nFabric Care : Regular Machine Wash\r\nStyle Code : PWK222', 1),
(20, 9, 'Collared Neck', 620, 10, '192389103_pic4.jpeg', 'Printed Men Collared Neck Dark Blue T-Shirt', 'Type : Collared Neck\r\nSleeve : Half Sleeve\r\nFit : Regular\r\nFabric : Cotton Blend\r\nSales Package : 1 Polo Tshirt\r\nPack of : 1\r\nStyle Code : BUL-1AOPP-006\r\nNeck Type : Collared Neck\r\nIdeal For : Men\r\nSize : XL\r\nPattern : Printed\r\nSuitable For : Western Wear\r\nSleeve Type : Narrow\r\nReversible : No\r\nFabric Care : Machine wash as per tag\r\nBullmer T-Shirts makes you a prefect Man. Bullmer premium quality Knitted cotton t-shirt makes you feel more easier and comfort. Amazing Bullmer designer collections makes you look smarter. Wear with love and feel the comfort of Bullmer T-Shirts. 100% Export Quality cotton rich product. All our tshirts are made up of 200 GSM -220 GSM fabrics for high durability and strength. For more cool Half Sleeve & Full Sleeve T-shirts, check out the entire collection of Bullmer brand. Features: * Premium quality stylish designer Tshirts * Export Quality Fabric and passed through all quality checks * 200 GSM with good quality print. * Buy Pack of two tshirts to save shipping charge Wash Care: Machine washes in cold water. Do not bleach. Do not wring or twist. Dry in shade. Warm low Iron. Don not tumble dry Machine dry not recommended.', 1),
(21, 9, 'Spread Collar Casual Shirt', 599, 10, '220840496_pic5.jpeg', 'U.S. POLO ASSN. Men Regular Fit Printed Spread Collar Casual Shirt', 'Pack of : 1\r\nStyle Code : UDSHTD0024\r\nClosure : Button\r\nFit : Regular\r\nFabric : Cotton Blend\r\nSleeve : Full Sleeve\r\nPattern : Printed\r\nReversible : No\r\nCollar : Spread\r\nColor : Blue\r\nFabric Care : Gentle Machine Wash\r\nSuitable For : Western Wear\r\nHem : Round\r\nU.S Polo Assn. is known for creating impeccable quality of casuals, and this shirt is no exception. Woven from smooth cotton, it\'s framed with a spread collar and long sleeves. Pair it with chinos and loafers.', 1),
(22, 9, 'Sherwani', 699, 10, '155741999_pic6.jpeg', 'Hangup Solid Sherwani', 'Ideal For : Men\r\nOccasion : Festive, Party\r\nPattern : Solid\r\nType : Sherwani Set\r\nFabric : Polyester Viscose Blend\r\nKnit Type : woven\r\nNeck : Mandarin/Chinese Neck\r\nPockets : 2 side pocket and one patch pocket, no square pocket\r\nSleeve : Full Sleeve\r\nFabric Care : Dryclean Only\r\nColor : multi, kurta fabric : viscose, type :sherwani, neck : mandarin collar, pattern : solid/printd, kurta length : knee length, sleeve : full sleeve, , number of items : 2, included items : only 1 sherwani top and 1 bottom, recommended wear: south Asian traditional fashion, fusion, ethnic, festive, party, marriage/wedding, evening, indo western and other occasions as preferred by the shoppers', 1),
(23, 9, 'Asymmetric Kurta', 659, 10, '558365220_pic7.jpeg', 'BENSTOKE Men Solid Dupion Silk Asymmetric Kurta  (Black)', 'Ideal For : Men\r\nLength Type : Knee Length\r\nBrand Color : Gold\r\nOccasion : Festive & Party\r\nPattern : Solid\r\nType : Asymmetric\r\nFabric : Dupion Silk\r\nStyle : Asymmetric\r\nNeck : Mandarin/Chinese Neck\r\nSleeve : Full Sleeve\r\nColor : Black\r\nNumber of Contents in Sales Package : Pack of 1\r\nFabric Care : Regular Machine Wash\r\nStyle Code : DKN\r\nOther Details : Only kurta\r\nPackage contains : 1 Kurta\r\nBENSTOKE as a brand brings you quality and affordability. We take pride in our commitment to maintain quality standards in each piece manufactured by us. A true epitome of class, this designer kurta will surely reflect your impeccable taste in fashion. Made from banarsi dupion silk fabric, this kurta will surely make you the cynosure of all eyes. Team this kurta with a pair of mojris or kolhapuri chappals to give a classy touch to your ethnic look.', 1),
(24, 9, 'Men Full Sleeve Blazer', 1599, 10, '475488788_pic8.jpeg', 'AD by Arvind Checkered Single Breasted Formal Men Full Sleeve Blazer  (Black)', 'Color : Black\r\nFabric : Nylon\r\nPattern : Checkered\r\nStyle code : Fewobl156\r\nOccasion : Formal\r\nSleeve : Full Sleeve\r\nClosure : Button\r\nVents : Single Vent at Back\r\nFabric care : Dry Clean\r\nPck of : 1\r\nType : Single Breasted\r\nFor a debonair finishing touch to your boardroom ensemble, this blazer comes with a handsome windowpane check design all over. It\'s cut slim with a sharp notched lapel, vented back and long sleeves. Wear this classic black version with tailored trousers and a crisp white shirt.', 1),
(25, 9, 'Checkered Spread Collar', 539, 10, '524421976_pic9.jpeg', 'METRONAUT Men Regular Fit Checkered Spread Collar Casual Shirt', 'Pack of : 1\\r\\nStyle Code : MSS21EPPSH100C\\r\\nClosure : Button\\r\\nFit : Regular\\r\\nFabric : Cotton Blend\\r\\nSleeve : Full Sleeve\\r\\nPattern : Checkered\\r\\nReversible : No\\r\\nCollar : Spread\\r\\nColor : Blue, White\\r\\nFabric Care : Do not bleach, Do not tumble dry, Dry in shade, Gentle Machine Wash\\r\\nSuitable For : Western Wear\\r\\nHem : Curved\\r\\nPockets : 1 Patch Pocket at Front', 1),
(27, 13, 'Custom Shirt', 1500, 0, '539415564_dress-shirt-02.jpg', 'Custom Shirt', 'Custom Shirt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subpart`
--

CREATE TABLE `subpart` (
  `id` int(5) NOT NULL,
  `fabricid` int(5) NOT NULL,
  `partname` varchar(100) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subpart`
--

INSERT INTO `subpart` (`id`, `fabricid`, `partname`, `pname`, `image`, `price`, `status`) VALUES
(3, 25, 'SLEEVE', 'HALF SLEEVE', '826289728_halfselveebraga.jpg', 100, 1),
(5, 25, 'SLEEVE', 'LONG SLEEVE', '297941795_fullselveebraga.jpg', 100, 1),
(6, 25, 'COLLAR', 'TWO BUTTON', '920123192_COLLA.jpg', 20, 1),
(7, 25, 'COLLAR', 'MAO', '797176503_MAO.jpg', 50, 1),
(8, 25, 'CUFF', 'SINGLE BUTTON', '691824470_CUFF1.jpg', 10, 1),
(9, 25, 'CUFF', 'DOUBLE BOTTON', '190592184_CUFF2.jpg', 100, 1),
(10, 28, 'SLEEVE', 'LONG SLEEVE', '331475304_fullselveebbelmoont.jpg', 100, 1),
(11, 28, 'SLEEVE', 'HALF SLEEVE', '442425658_HALFselveebbelmoont.jpg', 120, 1),
(12, 28, 'COLLAR', 'DOUBLE BUTTON', '866486314_COLLADFVB.jpg', 130, 1),
(13, 28, 'COLLAR', 'MAO', '618407901_MAO3.jpg', 100, 1),
(14, 28, 'CUFF', 'SINGLE BUTTON', '169085228_CUFF1j.jpg', 100, 1),
(15, 28, 'CUFF', 'DOUBLE BUTTON', '781525176_CUFF2l.jpg', 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temporder`
--

CREATE TABLE `temporder` (
  `id` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `proid` int(5) NOT NULL,
  `cloth` int(5) NOT NULL,
  `sleeve` int(5) NOT NULL,
  `collar` int(5) NOT NULL,
  `cuff` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temporder`
--

INSERT INTO `temporder` (`id`, `userid`, `proid`, `cloth`, `sleeve`, `collar`, `cuff`) VALUES
(53, 1, 27, 28, 11, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `pnumber` varchar(13) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `realpass` varchar(100) NOT NULL,
  `email_otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `email_status`, `pnumber`, `uname`, `pass`, `realpass`, `email_otp`) VALUES
(1, 'Kartik Patel', 'Kartikp9904@gmail.com', 'verifed', '0000000000', 'Kartik2032', '095db49fdc87a6bd13cecff407c54e96', 'Kartikp9904', 113946),
(2, 'Naruto', 'narutoyt812@gmail.com', 'verifed', '0000000000', 'Narutoyt', '6424a2e9d3c60edb6154c822c759b308', 'narutoyt', 0),
(3, 'Riddhi', 'riddhinayi2003@gmail.com', 'verifed', '0000000000', 'riddhi2032', '7e5be18f58a2c318437bfc2a24ed7adb', 'Riddhinayi', 942710),
(18, 'Vidhi', 'vbchauhan2001@gmail.com', 'verifed', '0000000000', 'vidhi', '140362895bb6a05eed71d66b03b95553', 'vidhi', 240676),
(19, 'Kinjal', 'kinjujagtap22@gmail.com', 'verifed', '0000000000', 'kinju', '8f6aedaad5eeb37f91ee51be4876a347', 'kinju123', 338717);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subpart`
--
ALTER TABLE `subpart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporder`
--
ALTER TABLE `temporder`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fabric`
--
ALTER TABLE `fabric`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subpart`
--
ALTER TABLE `subpart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temporder`
--
ALTER TABLE `temporder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
