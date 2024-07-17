-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 17 日 16:25
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_class`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bookmark_table`
--

CREATE TABLE `gs_bookmark_table` (
  `id` int(12) NOT NULL,
  `category` varchar(64) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `book_url` text NOT NULL,
  `book_comment` text DEFAULT NULL,
  `book_status` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bookmark_table`
--

INSERT INTO `gs_bookmark_table` (`id`, `category`, `book_name`, `book_url`, `book_comment`, `book_status`, `date`) VALUES
(1, 'literature', 'テスト', 'https://ssss.xxxx', '面白い', 'inProgress', '2024-07-15 12:41:13'),
(2, 'economy', 'テスト2', 'https:www//qqqq.bbb', '普通', 'completed', '2024-07-15 13:10:31'),
(3, 'literature', '百年の孤独', 'https://www.amazon.co.jp/%E7%99%BE%E5%B9%B4%E3%81%AE%E5%AD%A4%E7%8B%AC-%E6%96%B0%E6%BD%AE%E6%96%87%E5%BA%AB-24-2-%E3%82%AC%E3%83%96%E3%83%AA%E3%82%A8%E3%83%AB%E3%83%BB%E3%82%AC%E3%83%AB%E3%82%B7%E3%82%A2-%E3%83%9E%E3%83%AB%E3%82%B1%E3%82%B9/dp/4102052127', '', 'notStarted', '2024-07-15 15:34:42'),
(4, 'society', 'ファストアンドフロー', 'https://aaa.xxxx', '', 'inProgress', '2024-07-16 19:56:37'),
(5, 'others', 'プロジェクトヘイルメアリー', 'https://www.amazon.co.jp/dp/B09Q59CL75?binding=kindle_edition&searchxofy=true&ref_=dbs_s_aps_series_rwt_tkin&qid=1721223652&sr=8-1', '面白い', 'completed', '2024-07-17 22:41:54');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bookmark_table`
--
ALTER TABLE `gs_bookmark_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bookmark_table`
--
ALTER TABLE `gs_bookmark_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
