-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 11:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `catads` int(11) NOT NULL,
  `typeads` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catads`
--

CREATE TABLE `catads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catjobs`
--

CREATE TABLE `catjobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catmuti`
--

CREATE TABLE `catmuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catnews`
--

CREATE TABLE `catnews` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(25) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `jobsid` int(11) NOT NULL,
  `adsid` int(11) NOT NULL,
  `mutiid` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `position` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `catjobs` int(11) NOT NULL,
  `typejobs` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `view` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL,
  `from` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `muti`
--

CREATE TABLE `muti` (
  `id` int(11) NOT NULL,
  `catmuti` int(11) NOT NULL,
  `typemuti` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `view` int(11) NOT NULL,
  `playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutiplaylist`
--

CREATE TABLE `mutiplaylist` (
  `plid` int(11) NOT NULL,
  `mtid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `catnews` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `from` varchar(25) CHARACTER SET utf8 NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `catnews`, `title`, `desc`, `content`, `image`, `from`, `active`, `view`, `date_create`, `date_update`, `author`) VALUES
(1, 1, 'Nhân chứng vụ sập giàn giáo: Bàng hoàng thấy hai người rơi từ tầng cao', 'Vụ sập giàn giáo xảy ra tại công trường thi công nhà cao tầng tại số 1 Giáp Nhị (Hà Nội) làm ông Lê Văn Quý (53 tuổi) và chị Nguyễn Thị Cẩn (25 tuổi) thiệt mạng.', 'http://video.vnexpress.net/tin-tuc/xa-hoi/nhan-chung-vu-sap-gian-giao-bang-hoang-thay-hai-nguoi-roi-tu-tang-cao-3483076.html', 'avaspgingioJPG-1476342340.jpg', 'VnExpress', 1, 0, 1476345461, 0, 1),
(2, 1, 'Cách dùng số tay trên xe số tự động - tài xế Việt cần biết', 'Số tay hay số thể thao có thể sử dụng để vượt xe khác, hãm xe khi xuống dốc hay đơn giản là tăng cảm hứng lái.', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/cach-dung-so-tay-tren-xe-so-tu-dong-tai-xe-viet-can-biet-3482535.html', 'automatic-transmission-gear-3701-1476345166.jpg', 'VnExpress', 1, 0, 1476345462, 0, 1),
(3, 1, 'Những giáo viên truyền cảm hứng cho học trò', 'Nằm giảng bài ngoài sân vì quên chìa khóa cửa lớp, âm thầm trang trí lớp học suốt mùa hè, lập "câu lạc bộ quý ông" dành cho học sinh thiếu tình thương của bố là những hành động ghi điểm của giáo viên.', 'http://vnexpress.net/photo/giao-duc/nhung-giao-vien-truyen-cam-hung-cho-hoc-tro-3482879.html', 'nhung-giao-vien-dang-yeu-nhat-the-gioi3-1476326099.jpg', 'VnExpress', 1, 0, 1476345462, 0, 1),
(4, 1, 'Bộ Tài chính muốn truy thu 131 tỷ đồng sai phạm tại Tổng công ty Đường sắt', 'Đồng tình với kết luận của Thanh tra Chính phủ, Bộ Tài chính vừa đề nghị Thủ tướng cho giữ nguyên yêu cầu Tổng công ty Đường sắt nộp vào ngân sách hơn 131 tỷ đồng.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/bo-tai-chinh-muon-truy-thu-131-ty-dong-sai-pham-tai-tong-cong-ty-duong-sat-3483047.html', 'duongsat-1476335957-2965-1476336097.jpg', 'VnExpress', 1, 0, 1476345463, 0, 1),
(5, 1, 'Tuyển thủ Việt Nam mang nụ cười đến trại trẻ mồ côi tại TP HCM', 'Sáng 13/10, các thành viên đội tuyển cùng đại diện Liên đoàn bóng đá Việt Nam đã đến thăm, giao lưu với làng trẻ em SOS Gò Vấp.', 'http://thethao.vnexpress.net/photo/hinh-hau-truong/tuyen-thu-viet-nam-mang-nu-cuoi-den-trai-tre-mo-coi-tai-tp-hcm-3483044.html', '3-1476334451.jpg', 'VnExpress', 1, 0, 1476345463, 0, 1),
(6, 1, 'Vì sao phải mở ''phiên tòa'' với người cai nghiện bắt buộc?', 'Theo quy định hiện hành, quyết định đưa người đi cai nghiện bắt buộc thuộc về tòa án và phải mở phiên xem xét gồm thẩm phán, kiểm sát viên, các bên liên quan, luật sư...', 'http://vnexpress.net/tin-tuc/phap-luat/tu-van/vi-sao-phai-mo-phien-toa-voi-nguoi-cai-nghien-bat-buoc-3483030.html', 'minhhoacainghien2-1476330878.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(7, 1, 'Mất 11 giờ để pha trà với ấm đun nước Wi-Fi', 'Các thiết bị gia dụng thông minh, tích hợp Internet, không phải lúc nào cũng đem đến sự thuận tiện cho người dùng như quảng cáo.', 'http://sohoa.vnexpress.net/tin-tuc/dien-tu-gia-dung/mat-11-gio-de-pha-tra-voi-am-dun-nuoc-wi-fi-3483094.html', 'IoT3-1476343718-2352-1476343735.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(8, 1, 'Bé một tháng tuổi bị rao bán hơn 5.000 USD trên mạng', 'Cảnh sát Đức đang điều tra việc một bé gái sơ sinh nước này bị rao bán trên eBay với giá 5.500 USD.', 'http://vnexpress.net/tin-tuc/the-gioi/cuoc-song-do-day/be-mot-thang-tuoi-bi-rao-ban-hon-5-000-usd-tren-mang-3483017.html', 'baby-1476344361.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(9, 1, 'Ngư dân mạo hiểm kéo cá mập dài 2,5 mét về biển', 'Con cá mập dài gần 2,5 m, nặng hơn 200 kg bị mắc lưới ở ngoài khơi Nam Phi phản ứng quyết liệt khi các ngư dân cố gắng thả nó về biển.', 'http://vnexpress.net/tin-tuc/khoa-hoc/ngu-dan-mao-hiem-keo-ca-map-dai-2-5-met-ve-bien-3482938.html', '2-1476328562.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(10, 1, 'Người Philippines nhận xét ông Duterte ''thô lỗ nhưng chân thành''', 'Đánh dấu 100 ngày Tổng thống Duterte lãnh đạo đất nước, người dân Philippines nhận xét tuy có lúc ông nói năng thô lỗ nhưng là người chân thành, yêu dân và vì đân.', 'http://vnexpress.net/tin-tuc/the-gioi/cuoc-song-do-day/nguoi-philippines-nhan-xet-ong-duterte-tho-lo-nhung-chan-thanh-3481439.html', '2657-1476342325.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(11, 1, 'Du khách chết vì say độ cao', 'Một du khách đã chết vì say độ cao khi đi xe đạp trên con đường Tử thần ở Bolivia, cao hơn 3.000 m.', 'http://dulich.vnexpress.net/tin-tuc/quoc-te/du-khach-chet-vi-say-do-cao-3482972.html', 'conduongtuthan-2410-1476243827-5287-1476344556.jpg', 'VnExpress', 1, 0, 1476345464, 0, 1),
(12, 1, 'Chơi Pokemon Go có thể giúp sống lâu hơn', 'Càng vận động, con người càng có cơ hội kéo dài tuổi thọ và Pokemon Go đang giúp làm tăng mức độ hoạt động thể chất của những người trải nghiệm.', 'http://sohoa.vnexpress.net/tin-tuc/lang-game/choi-pokemon-go-co-the-giup-song-lau-hon-3483038.html', 'pokemon-go-6007-1476339990.jpg', 'VnExpress', 1, 0, 1476345465, 0, 1),
(13, 1, 'Nếu không cưới được chồng tôi, cô nhân tình quyết phá nhà tôi', 'Anh bảo đừng để cô ta kích động rồi buông bỏ tất cả thì đã trúng kế. Giờ anh mới hiểu bản chất và ý đồ này, cầu xin tôi đừng vội ly hôn.', 'http://vnexpress.net/tin-tuc/tam-su/neu-khong-cuoi-duoc-chong-toi-co-nhan-tinh-quyet-pha-nha-toi-3482893.html', 'ngheo-1476329542-8044-1476329561.jpg', 'VnExpress', 1, 1, 1476345465, 0, 1),
(14, 1, 'Phan Đinh Tùng đưa vợ và con gái lên sân khấu', 'Gia đình nam ca sĩ hòa giọng trong chương trình "Sài Gòn đêm thứ bảy" sắp phát sóng.', 'http://giaitri.vnexpress.net/tin-tuc/nhac/lang-nhac/phan-dinh-tung-dua-vo-va-con-gai-len-san-khau-3482959.html', 'phan-dinh-tung-2-6481-1476329645.jpg', 'VnExpress', 1, 0, 1476345465, 0, 1),
(15, 1, 'Váy xuyên thấu dẫn đầu 10 thiết kế đẹp nhất Xuân Hè 2016', 'Bộ đầm đuôi cá của Alexander McQueen được Vogue đánh giá đẹp từ phom dáng đến đường kim mũi chỉ.', 'http://giaitri.vnexpress.net/photo/lang-mot/vay-xuyen-thau-dan-dau-10-thiet-ke-dep-nhat-xuan-he-2016-3482649.html', 'vay-xuyen-thau-dan-dau-10-thiet-ke-dep-nhat-xuan-he-2016-1476341801.jpg', 'VnExpress', 1, 0, 1476345465, 0, 1),
(16, 1, 'Danh sách độc giả nhận vé xem ra mắt ''The Accountant''', 'Dưới đây là bốn độc giả ở Hà Nội nhận mỗi người một cặp vé dự lễ ra mắt tác phẩm hành động mới của Ben Affleck tối nay (13/10).', 'http://giaitri.vnexpress.net/tin-tuc/cong-dong/danh-sach-doc-gia-nhan-ve-xem-ra-mat-the-accountant-3483069.html', 'toppp-1476341562-1642-1476341565.jpg', 'VnExpress', 1, 0, 1476345465, 0, 1),
(17, 1, 'Công nghệ cao trong top ngành được tăng lương nhiều', 'Sản xuất, dược, hóa chất, công nghệ cao là 4 ngành có tỷ lệ tăng lương cao nhất, ở mức 10% trong năm nay so với các ngành nghề khác.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/cong-nghe-cao-trong-top-nganh-duoc-tang-luong-nhieu-3482157.html', 'cnc-1476332494-3295-1476332701.jpg', 'VnExpress', 1, 0, 1476345466, 0, 1),
(18, 1, 'Nga lập sư đoàn oanh tạc cơ chiến lược tuần tra Thái Bình Dương', 'Sư đoàn oanh tạc cơ chiến lược mới của Nga đóng ở vùng Viễn Đông sẽ sớm tuần tra gần các căn cứ Mỹ và Nhật Bản ở Thái Bình Dương.', 'http://vnexpress.net/tin-tuc/the-gioi/quan-su/nga-lap-su-doan-oanh-tac-co-chien-luoc-tuan-tra-thai-binh-duong-3483086.html', '2-1476343076.jpg', 'VnExpress', 1, 0, 1476345466, 0, 1),
(19, 1, 'Chất nghệ thuật trong kiến trúc hiện đại tại Feliz en Vista', 'Lấy cảm hứng từ thành phố được đan trên sợi tơ, chủ đầu tư CapitaLand Việt Nam kiến tạo khu đô thị đậm chất nghệ thuật mà vẫn hiện đại, tiện ích.', 'http://kinhdoanh.vnexpress.net/tin-tuc/bat-dong-san/chat-nghe-thuat-trong-kien-truc-hien-dai-tai-feliz-en-vista-3482611.html', 'Untitled-2-2905-1476264742.jpg', 'VnExpress', 1, 0, 1476345466, 0, 1),
(20, 1, 'Hàng chục xe máy ngã ra đường vì vết dầu rơi', 'Vết dầu máy từ xe ôtô rơi kết hợp với trận mưa khiến quốc lộ 18 đoạn qua xã Phù Lỗ, Sóc Sơn, Hà Nội trơn trượt, hàng chục người đi xe máy bị ngã xuống đường.', 'http://vnexpress.net/tin-tuc/thoi-su/giao-thong/ha-ng-chu-c-xe-ma-y-nga-ra-duo-ng-vi-ve-t-da-u-roi-3483070.html', 'st3-1476342255.jpg', 'VnExpress', 1, 0, 1476345467, 0, 1),
(21, 1, 'Vì sao tỷ số truyền hộp giảm tốc là số lẻ?', 'Các anh chị có kinh nghiệm cho em hỏi, vì sao tỷ số truyền hộp giảm tốc lại là số lẻ, ví dụ như 31.4/1 (Nguyễn Duy).', 'http://vnexpress.net/tin-tuc/oto-xe-may/tu-van/vi-sao-ty-so-truyen-hop-giam-toc-la-so-le-3483065.html', 'BMWserie5tvx-1476341521.jpg', 'VnExpress', 1, 1, 1476345467, 0, 1),
(22, 1, 'Ba cách hiệu quả chống say xe', 'Tập cho tiền đình bớt nhạy cảm là cách chống say xe triệt để nhất với những ai "cứ lên xe là nôn".', 'http://vnexpress.net/tin-tuc/oto-xe-may/dien-dan/ba-cach-hieu-qua-chong-say-xe-2132872.html', 'Say-xe-2728-1476342358.jpg', 'VnExpress', 1, 1, 1476345467, 0, 1),
(23, 1, '10 trải nghiệm dành cho dân du lịch bụi ở Hà Giang', 'Độc hành, trekking đèo Mã Pì Lèng, vượt sông Nho Quế bằng bè là những điều chỉ dành người ưa mạo hiểm.', 'http://dulich.vnexpress.net/photo/anh-video/10-trai-nghiem-danh-cho-dan-du-lich-bui-o-ha-giang-3482358.html', '8-Chay-Bo-Xe-Dap-1.jpg', 'VnExpress', 1, 9, 1476345468, 0, 1),
(24, 1, 'Trung Quốc yêu cầu Australia thận trọng về vấn đề Biển Đông', 'Quan chức quân đội Trung Quốc cho rằng Australia cần "thận trọng" với các hành động và phát ngôn liên quan đến Biển Đông.', 'http://vnexpress.net/tin-tuc/the-gioi/trung-quoc-yeu-cau-australia-than-trong-ve-van-de-bien-dong-3482830.html', 'davanhkhan-1476327479.jpg', 'VnExpress', 1, 6, 1476345468, 0, 1),
(25, 1, 'Vietnamese Stand-up Comedy @PiuPiu', 'Open mic for comedians every Sunday', 'http://e.vnexpress.net/news/travel-life/what-s-on/vietnamese-stand-up-comedy-piupiu-3482919.html', '147083021617985415168670301116-3454-1387-1476327921.jpg', 'VnExpress', 1, 6, 1476345468, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `view` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `date_create` int(25) NOT NULL,
  `date_update` int(25) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typeads`
--

CREATE TABLE `typeads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `display` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typejobs`
--

CREATE TABLE `typejobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typemuti`
--

CREATE TABLE `typemuti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `address`, `active`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'le anhhuy', '$2y$10$DWjJshwNtsrLF0BjHcma0.x1InNlrrXiSk7jRFpLZnNnAnsw4vV82', 'huyanhit@gmail.com', '', 0, '2016-10-13 01:34:50', '2016-10-13 01:34:50', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catads`
--
ALTER TABLE `catads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catjobs`
--
ALTER TABLE `catjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catmuti`
--
ALTER TABLE `catmuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catnews`
--
ALTER TABLE `catnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muti`
--
ALTER TABLE `muti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeads`
--
ALTER TABLE `typeads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typejobs`
--
ALTER TABLE `typejobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typemuti`
--
ALTER TABLE `typemuti`
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
-- AUTO_INCREMENT for table `catads`
--
ALTER TABLE `catads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catjobs`
--
ALTER TABLE `catjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catmuti`
--
ALTER TABLE `catmuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `muti`
--
ALTER TABLE `muti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeads`
--
ALTER TABLE `typeads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typejobs`
--
ALTER TABLE `typejobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typemuti`
--
ALTER TABLE `typemuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
