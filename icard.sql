-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2012 at 02:07 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icard`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `filename`, `title`, `description`, `created`) VALUES
(1, '32edb4d0.jpg', 'Lorem Ipsum е елементарен примерен текст, използва', 'test', '24-August-2012, 21:15:41'),
(2, '600px-bmw.png', 'bmwto bmwto bmwto  bmwto bmwto bmwto bmwto bmwto', 'qkata ralta', '24-August-2012, 21:37:18'),
(3, '1_1.jpg', 'asdada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras urna felis, venenatis quis tristique ut, ultricies et neque. Vestibulum nibh nisi, interdum non sodales nec, condimentum id tortor. Mauris sagittis blandit velit id euismod. Etiam tincidunt porta ultricies. Fusce nec metus nec erat condimentum consequat. Mauris auctor aliquet magna, vel porttitor mauris porttitor molestie. Pellentesque id neque et augue cursus feugiat. Etiam consequat ligula vel turpis tristique egestas.\r\n\r\nUt lacinia suscipit ante sit amet dignissim. Nam ut dui est. Cras et urna dolor. Vivamus pharetra, ligula sed sodales tincidunt, est lectus vestibulum purus, ac tincidunt velit magna quis dolor. Vivamus porta tempor rhoncus. Vestibulum arcu enim, eleifend vel consequat nec, semper ut tortor. Sed eget ligula turpis. Praesent erat ligula, tincidunt ut malesuada nec, ultrices vel arcu. Duis adipiscing, ligula ac vehicula imperdiet, justo nisi pretium turpis, vel ultrices nulla orci eget velit. Integer sed orci leo. Vestibulum ut est tortor, sed vulputate magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nCras vel luctus massa. Vivamus ornare felis eget sapien pellentesque sed faucibus urna hendrerit. Maecenas feugiat hendrerit dolor, ac convallis mauris porttitor rutrum. Pellentesque nec diam nibh, vitae pulvinar metus. Nulla metus ipsum, viverra sit amet fermentum cursus, sollicitudin sed purus. Integer in rhoncus nisi. Vestibulum vel ipsum erat. Fusce volutpat nibh et tortor venenatis vitae volutpat neque elementum. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nVivamus cursus ullamcorper tellus mattis tristique. Aenean et mauris purus, at pretium est. Nam nulla nisi, hendrerit at lobortis laoreet, faucibus eu lectus. Proin nec lorem vitae ligula gravida imperdiet. Mauris vel ligula non risus laoreet gravida. Duis non eros hendrerit orci aliquam dignissim. Sed eros turpis, feugiat sit amet hendrerit malesuada, tempor sed elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nisl arcu, accumsan id vehicula at, euismod sed justo. Cras fringilla turpis est. Sed commodo rhoncus pulvinar. Curabitur suscipit blandit tortor, eu ornare lorem volutpat eu.\r\n\r\nNulla eros lectus, lobortis sed vehicula id, accumsan nec velit. Praesent leo ante, pellentesque ullamcorper condimentum in, rhoncus a massa. Nam tortor dolor, sodales sed ullamcorper eu, consequat a urna. Fusce eget nisl at diam vulputate feugiat. Donec dignissim vestibulum enim, a lacinia odio faucibus vel. Mauris varius risus vel orci blandit id porttitor justo scelerisque. Maecenas diam orci, lacinia quis condimentum nec, vulputate nec justo. Etiam lobortis mollis rutrum. Praesent iaculis luctus orci vel tristique.\r\n\r\nSuspendisse vulputate facilisis dolor, eget pellentesque eros facilisis id. Sed vestibulum fermentum eleifend. Aenean vitae ipsum elit, sit amet ultricies sapien. Cras elit lectus, ornare at vehicula malesuada, mollis id tortor. Fusce eu lorem id nunc rutrum porttitor sit amet id enim. Morbi vitae mauris in lorem lacinia feugiat. Mauris consequat malesuada magna quis tincidunt. Sed sapien lacus, eleifend id sollicitudin eget, sollicitudin eget risus. Proin interdum, turpis eu interdum luctus, risus metus porta mi, a rhoncus risus nibh at magna. Pellentesque et enim ac ligula mattis egestas. Morbi bibendum bibendum suscipit. In ut augue urna. In bibendum, ante imperdiet imperdiet volutpat, purus diam ultricies velit, eu ultricies mauris arcu nec lorem. Vestibulum ac neque libero. Donec odio est, tempor eu dapibus eget, imperdiet et diam. Nam rutrum, lorem ut scelerisque placerat, libero neque pellentesque ante, sit amet rhoncus risus massa ac lacus.\r\n\r\nMaecenas volutpat venenatis diam mattis feugiat. Donec ullamcorper venenatis massa in consectetur. Cras placerat ligula sed ipsum faucibus in ultricies nunc lobortis. Phasellus sem sapien, pellentesque quis pretium at, molestie vel odio. Mauris cursus velit non ipsum vulputate lacinia. Duis non purus diam, at porttitor tellus. Nulla auctor, felis sed facilisis pretium, mauris magna aliquet nisi, non dictum quam est vitae metus. Curabitur non arcu imperdiet neque pharetra lacinia et sit amet eros. Curabitur elit augue, aliquam eget facilisis nec, faucibus ac leo. Cras vel tempus purus. Cras neque sem, elementum non congue vitae, faucibus nec ante. Etiam tincidunt libero lacinia elit bibendum vehicula. Nullam vestibulum lorem id mauris mollis placerat. Mauris volutpat aliquam mattis.\r\n\r\nNullam purus ipsum, bibendum sed sollicitudin non, lacinia ut magna. Nunc dignissim egestas tincidunt. Morbi fringilla rutrum molestie. Duis gravida dui sed dolor tincidunt egestas. Nunc aliquam iaculis magna, a mattis nisl mollis et. Duis lacinia, dui in feugiat sagittis, sapien arcu hendrerit tellus, vitae aliquam arcu massa nec leo. Curabitur scelerisque, arcu vel placerat lobortis, est mi feugiat quam, in mattis tortor orci nec massa.\r\n\r\nAenean in magna augue, eget varius risus. Morbi et posuere elit. Suspendisse potenti. Donec suscipit sapien faucibus enim bibendum viverra. Quisque urna felis, ultrices vel condimentum quis, consequat a arcu. Sed iaculis est eget odio laoreet at tempor leo tincidunt. Morbi augue ligula, elementum mollis cursus eu, adipiscing at neque. Aliquam volutpat lorem non elit pretium eget hendrerit felis commodo. Aenean tristique, nulla a condimentum lobortis, massa nunc vehicula sapien, nec rhoncus est eros non mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod egestas fermentum. Donec augue tellus, faucibus vel ullamcorper at, scelerisque eget tellus.\r\n\r\nProin rhoncus sodales imperdiet. Nullam ut sapien diam, ut ornare sapien. Nulla congue accumsan ipsum sed feugiat. Sed ut lectus congue est sollicitudin tincidunt. Duis egestas pharetra sem, ac venenatis massa pulvinar nec. Sed vel tincidunt risus. Phasellus in dui eget massa tincidunt porta. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi massa odio, fermentum a suscipit non, fringilla in felis. Phasellus sodales rutrum massa, in porttitor nisi sodales at. Curabitur auctor rhoncus dui, eu porta justo dapibus id. Praesent sagittis, nunc et tristique molestie, lectus dolor cursus diam, a convallis eros nibh nec sapien. Sed bibendum massa vel tellus molestie pharetra.', '24-August-2012, 21:37:30'),
(4, '2009-BMW-E92-M3-Darth-Maul-by-MW-Design-Technik-Girl-Interior-2-1920x1440.jpg', 'Test title', 'Test Desc', '24-August-2012, 21:59:30'),
(5, '422659_10150673129085070_716995069_11634652_1885497566_n.jpg', 'awesome', 'desc madafaka', '24-August-2012, 22:00:00'),
(6, 'BMW_M3_Darth_Maul_RE_Looking_for_a_sexy_wallpaper-s1600x1200-76619.jpg', 'beemveee', 'desrrrrr', '24-August-2012, 22:00:28'),
(7, '2006_Ac_Schnitzer_Black_Bmw_Rear.jpg', 'm6cata', 'tihu sq chui ma ko ti kazvam bre !', '24-August-2012, 22:01:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
