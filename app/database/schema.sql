CREATE TABLE `movie` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` text,
  `category_id` int,
  `tag_id` int,
  `poster_id` int,
  `description` text,
  `release_date` date,
  `created_at` timestamp,
  `user_id` int,
  `updated_at` timestamp,
  `status` ENUM ('released', 'upcoming', 'canceled')
);

CREATE TABLE `tv_show` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` text,
  `category_id` int,
  `tag_id` int,
  `poster_id` int,
  `description` text,
  `release_date` date,
  `created_at` timestamp,
  `user_id` int,
  `updated_at` timestamp,
  `status` ENUM ('airing', 'ended', 'canceled', 'on_break')
);

CREATE TABLE `poster` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `filename` varchar(255),
  `path` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` text,
  `parent_id` int
);

CREATE TABLE `tag` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255)
);

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `firstname` varchar(255),
  `lastname` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `bio` text,
  `role_id` int
);

CREATE TABLE `role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` text,
  `access_level` int DEFAULT 1,
  `admin` boolean DEFAULT false
);

CREATE TABLE `watchlist` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `movie_id` int,
  `tv_show_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `movie` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `movie` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

ALTER TABLE `movie` ADD FOREIGN KEY (`poster_id`) REFERENCES `poster` (`id`);

ALTER TABLE `movie` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `tv_show` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `tv_show` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

ALTER TABLE `tv_show` ADD FOREIGN KEY (`poster_id`) REFERENCES `poster` (`id`);

ALTER TABLE `tv_show` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `category` ADD FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

ALTER TABLE `user` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `watchlist` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `watchlist` ADD FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

ALTER TABLE `watchlist` ADD FOREIGN KEY (`tv_show_id`) REFERENCES `tv_show` (`id`);
