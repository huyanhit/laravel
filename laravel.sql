-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2016 at 07:48 AM
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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `newsid`, `name`, `comment`, `jobsid`, `adsid`, `mutiid`, `playlistid`, `position`, `date_create`, `like`, `dislike`, `idcomment`, `active`) VALUES
(1, 31, 'huy', 'Ch??ng trình t?ng phát hi?n nhi?u tài n?ng âm nh?c nh? H?ng Nhung, M? Linh, Tr?ng T?n hay ', 0, 0, 0, 0, 0, 1477302599, 0, 0, 0, 0);

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
(26, 1, 'TP HCM cấm ôtô khách ở 3 đường trung tâm', 'Ôtô hơn 25 chỗ bị cấm lưu thông trên đường Lê Hồng Phong, Vĩnh Viễn và Trần Nhân Tôn (quận 10) để đảm bảo trật tự giao thông.', 'http://vnexpress.net/tin-tuc/thoi-su/tp-hcm-cam-oto-khach-o-3-duong-trung-tam-3488502.html', 'thong-bao-5524-1477298671.jpg', 'VnExpress', 1, 0, 1477301095, 0, 1),
(27, 1, 'Con tin bị cướp biển Somali bắt phải ăn thịt chuột để sống', 'Một người sống sót trong nhóm con tin bị cướp biển Somali bắt giữ trong gần 5 năm kể rằng phải ăn thịt chuột để sống.', 'http://vnexpress.net/tin-tuc/the-gioi/cuoc-song-do-day/con-tin-bi-cuop-bien-somali-bat-phai-an-thit-chuot-de-song-3488400.html', '92063638bcd18e3b74b84030a7369851911c56da-1477294773.jpg', 'VnExpress', 1, 0, 1477301096, 0, 1),
(28, 1, 'Châu Tinh Trì ra mắt ''Tây Du Giáng Ma 2'' vào Tết 2017', 'Ở dự án mới mang tên "Tây du phục yêu", vua hài viết kịch bản và sản xuất, còn “ông trùm phim kiếm hiệp” Từ Khắc đứng vai trò đạo diễn.', 'http://giaitri.vnexpress.net/tin-tuc/phim/diem-phim/chau-tinh-tri-ra-mat-tay-du-giang-ma-2-vao-tet-2017-3488424.html', 'chatinhtri-1477300154.jpg', 'VnExpress', 1, 0, 1477301096, 0, 1),
(29, 1, 'Microsoft từng hỏi mua Facebook với giá 24 tỷ USD', 'Cựu CEO Microsoft Steve Ballmer tiết lộ hãng có ý định mua lại Facebook năm 2010, nhưng Mark Zuckerberg đã từ chối một cách khiếm nhã.', 'http://sohoa.vnexpress.net/tin-tuc/doi-song-so/microsoft-tung-hoi-mua-facebook-voi-gia-24-ty-usd-3488494.html', 'Steve-Ballmer-at-CES-2010-2881-1477297969.jpg', 'VnExpress', 1, 1, 1477301096, 0, 1),
(30, 1, 'Guardiola ''nhốt'' các cầu thủ Man City sau trận hoà', 'HLV người Tây Ban Nha đã buộc các cầu thủ ở yên trong phòng thay đồ khoảng gần một tiếng đồng hồ, sau trận Man City bị Southampton cầm hòa 1-1 ở Etihad.', 'http://thethao.vnexpress.net/tin-tuc/giai-ngoai-hang-anh/guardiola-nhot-cac-cau-thu-man-city-sau-tran-hoa-3488452.html', 'Pep-8883-1477299040.jpg', 'VnExpress', 1, 0, 1477301096, 0, 1),
(31, 1, 'Cô gái 20 tuổi giành giải nhất Giọng hát hay Hà Nội 2016', 'Nguyễn Thu Thủy vượt 9 gương mặt tiềm năng khác để đoạt danh hiệu cao nhất trong chung kết cuộc thi tối 23/10.', 'http://giaitri.vnexpress.net/tin-tuc/nhac/lang-nhac/co-gai-20-tuoi-gianh-giai-nhat-giong-hat-hay-ha-noi-2016-3488454.html', 'top-1477297550.jpg', 'VnExpress', 1, 4, 1477301096, 0, 1),
(32, 1, 'Người đẹp hốt hoảng vì suýt trúng mũi lao', 'Không chỉ cô gái mà tất cả mọi người xung quanh đều há hốc mồm khi thấy mũi lao của người đàn ông đâm xuyên qua cánh cửa.', 'http://video.vnexpress.net/tin-tuc/cuoi/nguoi-dep-hot-hoang-vi-suyt-trung-mui-lao-3488527.html', 'Sequence04Still001-1477299787.jpg', 'VnExpress', 1, 0, 1477301097, 0, 1),
(33, 1, 'Người đàn ông đen đủi nhất quả đất', 'Không chỉ bị rơi xuống hồ vì bị chơi xấu mà người đàn ông còn nhận thêm trái đắng khi vừa lên khỏi mặt nước.', 'http://video.vnexpress.net/tin-tuc/cuoi/nguoi-dan-ong-den-dui-nhat-qua-dat-3488525.html', 'Sequence03Still001-1477299696.jpg', 'VnExpress', 1, 0, 1477301097, 0, 1),
(34, 1, 'Bà vợ cao tay khiến ông chồng yêu thương mình hơn', 'Vừa thấy chồng về, bà vợ liền lật tung mọi thứ lên khiến căn nhà vô cùng bề bộn.', 'http://video.vnexpress.net/tin-tuc/cuoi/ba-vo-cao-tay-khien-ong-chong-yeu-thuong-minh-hon-3488523.html', 'Sequence02Still001-1477299611.jpg', 'VnExpress', 1, 0, 1477301097, 0, 1),
(35, 1, 'Trường Giang tức ói máu khi thấy Trấn Thành hôn Nhã Phương', 'Dù rất tức giận đến mức thổ huyết nhưng Trường Giang vẫn tỉnh táo nhận ra đối thủ đẹp trai hơn mình và chấp nhận thất bại.', 'http://video.vnexpress.net/tin-tuc/cuoi/truong-giang-tuc-oi-mau-khi-thay-tran-thanh-hon-nha-phuong-3488520.html', 'Untitled1-1477299503.jpg', 'VnExpress', 1, 0, 1477301097, 0, 1),
(36, 1, 'Xuất khẩu tôm năm nay dự kiến đạt 3,1 tỷ USD', '9 tháng xuất khẩu tôm Việt Nam đạt 2,2 tỷ USD, dự kiến hết năm có thể đạt 3,1 tỷ USD.', 'http://kinhdoanh.vnexpress.net/tin-tuc/hang-hoa/xuat-khau-tom-nam-nay-du-kien-dat-3-1-ty-usd-3488491.html', 'tomthechantrang1-1660-1477298959.jpg', 'VnExpress', 1, 1, 1477301097, 0, 1),
(37, 1, 'Trường Giang tức ói máu khi thấy Trấn Thành hôn Nhã Phương', 'Dù rất tức giận đến mức thổ huyết nhưng Trường Giang vẫn tỉnh táo nhận ra đối thủ đẹp trai hơn mình và chấp nhận thất bại.', 'http://vnexpress.net/tin-tuc/cuoi/video/truong-giang-tuc-oi-mau-khi-thay-tran-thanh-hon-nha-phuong-3488515.html', 'Untitled-1-8578-1477299267.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(38, 1, 'Kerber thắng trận đầu tại WTA Finals', 'Tay vợt số một thế giới khởi đầu chiến dịch chinh phục giải đấu tại Singapore bằng chiến thắng với tỷ số 6-7, 6-2, 6-3 trước Dominika Cibulkova.', 'http://thethao.vnexpress.net/tin-tuc/tennis/kerber-thang-tran-dau-tai-wta-finals-3488512.html', '2016-10-23T141324Z-96608814-2927-1477299168.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(39, 1, 'Mercedes-Benz ''đổ bộ'' tại gian hàng lớn nhất VIMS 2016', 'Lần đầu tiên góp mặt tại Triển lãm ôtô quốc tế Việt Nam 2016 (VIMS), thương hiệu ngôi sao ba cánh đầu tư gian hàng 776 m2 với nhiều điều thú vị.', 'http://vnexpress.net/tin-tuc/oto-xe-may/mercedes-benz-do-bo-tai-gian-hang-lon-nhat-vims-2016-3488319.html', 'Image-ExtractWord-0-Out-3849-1477300261.jpeg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(40, 1, 'Hoa hậu Thu Hoài xoạc người trên không', 'Bà mẹ ba con khoe dáng với trang phục bó sát trong bộ ảnh mừng tuổi 40.', 'http://giaitri.vnexpress.net/photo/trong-nuoc/hoa-hau-thu-hoai-xoac-nguoi-tren-khong-3488443.html', 'hoa-hau-thu-hoai-du-day-tren-khong-1477295195.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(41, 1, 'Iceland khoan sâu 5 km để khai thác năng lượng địa nhiệt', 'Iceland hy vọng khai thác được nguồn năng lượng địa nhiệt vô tận bằng mũi khoan sâu 5 km xuống bể nham thạch.', 'http://vnexpress.net/tin-tuc/khoa-hoc/moi-truong/iceland-khoan-sau-5-km-de-khai-thac-nang-luong-dia-nhiet-3488396.html', 'VNEIceland3-1477296119.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(42, 1, 'Người cho thuê nhà được kê khai thuế điện tử', 'Từ tháng 11 tới, người có nhà cho thuê ở Hà Nội và TP HCM sẽ khai thuế thu nhập cá nhân điện tử thay vì đến nộp tờ khai trực tiếp ở cơ quan thuế, giúp tiết kiệm được chi phí đi lại và thời gian.', 'http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/nguoi-cho-thue-nha-duoc-ke-khai-thue-dien-tu-3488460.html', 'thue7920152121711441597267-147-5013-5182-1477296157.jpeg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(43, 1, 'Trò cũ và CĐV châm chọc Mourinho', 'Sau thất bại 0-4 trước Chelsea, HLV của Man Utd phải nhận hàng loạt chỉ trích xen lẫn châm biếm trên mạng xã hội.', 'http://thethao.vnexpress.net/tin-tuc/giai-ngoai-hang-anh/tro-cu-va-cdv-cham-choc-mourinho-3488263.html', 'mourinho-4340-1477280707.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(44, 1, 'Hồ Văn Cường theo mẹ nuôi Phi Nhung đi cứu trợ lũ lụt', 'Quán quân Vietnam Idol Kids 2016 và mẹ nuôi tặng quà, hát phục vụ người dân huyện Hương Khê, Hà Tĩnh vào ngày 23/10.', 'http://giaitri.vnexpress.net/tin-tuc/gioi-sao/trong-nuoc/ho-van-cuong-theo-me-nuoi-phi-nhung-di-cuu-tro-lu-lut-3488406.html', 'phi-nhung-top-4311-1477298541.jpg', 'VnExpress', 1, 0, 1477301098, 0, 1),
(45, 1, 'Khách Tây: Hà Nội là chốn rong chơi, Sài Gòn là nơi để sống', 'Những hàng cây cổ thụ dọc con phố nhộn nhịp, ẩm thực đa dạng, con người dễ mến là những điều níu chân khách Tây tại Sài Gòn.', 'http://dulich.vnexpress.net/tin-tuc/cong-dong/dau-chan/khach-tay-ha-noi-la-chon-rong-choi-sai-gon-la-noi-de-song-3488320.html', '11411703239697-1477295225.jpg', 'VnExpress', 1, 0, 1477301099, 0, 1),
(46, 1, 'Công dân Anh tra tấn gái bán dâm ba ngày rồi sát hại ở Hong Kong', 'Rurik Jutting, nhân viên ngân hàng người Anh, bị buộc tội giết người sau khi cảnh sát phát hiện thi thể hai cô gái trẻ trong căn hộ của anh ở Hong Kong.', 'http://vnexpress.net/tin-tuc/the-gioi/cuoc-song-do-day/cong-dan-anh-tra-tan-gai-ban-dam-ba-ngay-roi-sat-hai-o-hong-kong-3488427.html', '2016-10-24T015557Z-234285068-S-6435-6268-1477297291.jpg', 'VnExpress', 1, 0, 1477301099, 0, 1),
(47, 1, 'Dịch vụ ''ở ké'' online bị phản đối trên toàn cầu', 'Airbnb - dịch vụ chia sẻ phòng trọ trong thời gian ngắn được định giá 30 tỷ USD đang đối mặt với nhiều vấn đề pháp lý trên toàn cầu.', 'http://kinhdoanh.vnexpress.net/tin-tuc/quoc-te/dich-vu-o-ke-online-bi-phan-doi-tren-toan-cau-3488470.html', 'AIRBUB-jpeg-2491-1477298414.jpg', 'VnExpress', 1, 4, 1477301099, 0, 1),
(48, 1, 'Tên cướp bị cảnh sát ép ngã xe sau 10 km tháo chạy', 'Bị truy đuổi sau khi giật sợi dây chuyền của người phụ nữ, tên cướp 19 tuổi phóng xe bạt mạng, liên tục ép cảnh sát hòng thoát thân nhưng bất thành.', 'http://vnexpress.net/tin-tuc/phap-luat/ten-cuop-bi-canh-sat-ep-nga-xe-sau-10-km-thao-chay-3488450.html', 'cuop1-1477297320.jpg', 'VnExpress', 1, 0, 1477301099, 0, 1),
(49, 1, 'Chồng hiến thận cho vợ để tận hưởng từng ngày trước khi cô mất', 'Biết rằng vợ có thể ra đi bất cứ lúc nào, người chồng Singapore đã cố gắng để mỗi ngày sống của chị đều ý nghĩa, trọn vẹn. ', 'http://giadinh.vnexpress.net/tin-tuc/to-am/chong-hien-than-cho-vo-de-tan-huong-tung-ngay-truoc-khi-co-mat-3488445.html', 'chong1-1477297655-9573-1477297911.jpg', 'VnExpress', 1, 0, 1477301099, 0, 1),
(50, 1, 'Trung Quốc bắt đầu đại hội đảng Cộng sản', 'Gần 400 thành viên cấp cao của đảng Cộng sản Trung Quốc bắt đầu cuộc họp 4 ngày để cải cách "các quy chuẩn đời sống chính trị" và quy định giám sát nội bộ. ', 'http://vnexpress.net/tin-tuc/the-gioi/trung-quoc-bat-dau-dai-hoi-dang-cong-san-3488403.html', 'tapcanbinh-1477296102.jpg', 'VnExpress', 1, 3, 1477301100, 0, 1);

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

--
-- Dumping data for table `typeads`
--

INSERT INTO `typeads` (`id`, `title`, `icon`, `display`, `active`) VALUES
(1, 'short text', '', 1, 1),
(2, 'short text & short image', '', 2, 1),
(3, 'short text & image', '', 3, 1),
(4, 'short text & long image', '', 4, 1),
(5, 'text', '', 2, 1),
(6, 'text & short image', '', 3, 1),
(7, 'text & image', '', 4, 1),
(8, 'long text & short image', '', 4, 1),
(9, 'short image', '', 1, 1),
(10, 'image', '', 2, 1),
(11, 'long image', '', 3, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeads`
--
ALTER TABLE `typeads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
