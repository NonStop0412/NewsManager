CREATE TABLE if not exists `posts` (
                         `id` int NOT NULL AUTO_INCREMENT,
                         `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
                         `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
                         `thumbnail` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci,
                         `status` enum('publish','pending','planing','note','auto-note','private','unian_business','unian_news','trash') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `create_at` datetime DEFAULT NULL,
                         `update_at` datetime DEFAULT NULL,
                         `publish_at` datetime DEFAULT NULL,
                         `employee_id` int NOT NULL,
                         `locale` enum('en_US','uk_UA','ru_RU') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `type` enum('post','gallery','page','quote') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `anons` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `remark` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `last_publish_emp_id` int DEFAULT NULL,
                         `show_author` int NOT NULL DEFAULT '0',
                         `last_check` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '{}',
                         `time_checking` int NOT NULL DEFAULT '0',
                         `video_preview` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci,
                         `media_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `opinion_author` int unsigned DEFAULT NULL,
                         PRIMARY KEY (`id`) USING BTREE,
                         KEY `posts_employee_id` (`employee_id`) USING BTREE,
                         KEY `posts_title` (`title`) USING BTREE,
                         KEY `posts_route` (`route`) USING BTREE,
                         KEY `posts_status` (`status`) USING BTREE,
                         FULLTEXT KEY `content` (`content`)
) ENGINE=InnoDB AUTO_INCREMENT=214212 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_categories` (
                                    `id` int NOT NULL AUTO_INCREMENT,
                                    `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `posts_in` int DEFAULT NULL,
                                    `type` enum('internal','external') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `parent_id` int DEFAULT NULL,
                                    `title_page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `description_page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `keywords_page` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `h1_page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `skipChecking` int NOT NULL DEFAULT '0',
                                    `title_length` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '[]',
                                    PRIMARY KEY (`id`) USING BTREE,
                                    KEY `posts_categories_title` (`title`) USING BTREE,
                                    KEY `posts_categories_route` (`route`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_fines` (
                               `id` int NOT NULL AUTO_INCREMENT,
                               `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
                               `amount` int DEFAULT '0',
                               `create_at` datetime DEFAULT NULL,
                               `user` int NOT NULL,
                               `isDeleted` int DEFAULT '0',
                               PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_lock` (
                              `id` int NOT NULL AUTO_INCREMENT,
                              `lock_at` datetime DEFAULT NULL,
                              `post_id` int NOT NULL,
                              `employee_id` int NOT NULL,
                              PRIMARY KEY (`id`) USING BTREE,
                              KEY `posts_lock_post_id` (`post_id`) USING BTREE,
                              KEY `posts_lock_employee_id` (`employee_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53671 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_log` (
                             `id` int NOT NULL AUTO_INCREMENT,
                             `user_id` int NOT NULL,
                             `date` int DEFAULT NULL,
                             `action` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                             `posts_id` int NOT NULL,
                             PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=93144 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_options` (
                                 `id` int NOT NULL AUTO_INCREMENT,
                                 `post_id` int NOT NULL,
                                 `options` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
                                 PRIMARY KEY (`id`) USING BTREE,
                                 KEY `posts_options_post_id` (`post_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78815 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_rel_categories` (
                                        `id` int NOT NULL AUTO_INCREMENT,
                                        `post_id` int NOT NULL,
                                        `posts_category_id` int NOT NULL,
                                        PRIMARY KEY (`id`) USING BTREE,
                                        KEY `posts_rel_categories_post_id` (`post_id`) USING BTREE,
                                        KEY `posts_rel_categories_posts_category_id` (`posts_category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=299044 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_rel_fines` (
                                   `id` int NOT NULL AUTO_INCREMENT,
                                   `create_at` datetime DEFAULT NULL,
                                   `post` int NOT NULL,
                                   `fine` int NOT NULL,
                                   `user` int NOT NULL,
                                   `fined_user` int NOT NULL,
                                   `comment` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
                                   PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1147 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_rel_tags` (
                                  `id` int NOT NULL AUTO_INCREMENT,
                                  `post_id` int NOT NULL,
                                  `posts_tag_id` int NOT NULL,
                                  PRIMARY KEY (`id`) USING BTREE,
                                  KEY `posts_rel_tags_post_id` (`post_id`) USING BTREE,
                                  KEY `posts_rel_tags_posts_tag_id` (`posts_tag_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=410077 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_route_history` (
                                       `id` int NOT NULL AUTO_INCREMENT,
                                       `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                       `update_at` datetime DEFAULT NULL,
                                       `post_id` int NOT NULL,
                                       PRIMARY KEY (`id`) USING BTREE,
                                       KEY `posts_route_history_post_id` (`post_id`) USING BTREE,
                                       KEY `posts_route_history_route` (`route`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6352 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_socials` (
                                 `id` int NOT NULL AUTO_INCREMENT,
                                 `post_id` int NOT NULL,
                                 `is_fb` int NOT NULL DEFAULT '0',
                                 `is_google` int NOT NULL DEFAULT '0',
                                 `is_tw` int NOT NULL DEFAULT '0',
                                 `is_vk` int NOT NULL DEFAULT '0',
                                 PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33699 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_tags` (
                              `id` int NOT NULL AUTO_INCREMENT,
                              `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                              `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                              `posts_in` int DEFAULT NULL,
                              `categoryId` int NOT NULL DEFAULT '1',
                              PRIMARY KEY (`id`) USING BTREE,
                              KEY `posts_tags_title` (`title`) USING BTREE,
                              KEY `posts_tags_route` (`route`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56918 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `posts_views` (
                               `id` int NOT NULL AUTO_INCREMENT,
                               `last_view_at` datetime DEFAULT NULL,
                               `views` bigint DEFAULT NULL,
                               `post_id` int NOT NULL,
                               PRIMARY KEY (`id`) USING BTREE,
                               KEY `posts_views_post_id` (`post_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=192731 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `media` (
                         `id` int NOT NULL AUTO_INCREMENT,
                         `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `url` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci,
                         `mime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         `create_at` datetime DEFAULT NULL,
                         `employee_id` int NOT NULL,
                         PRIMARY KEY (`id`) USING BTREE,
                         KEY `media_employee_id` (`employee_id`) USING BTREE,
                         KEY `media_title` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=82461 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `media_categories` (
                                    `id` int NOT NULL AUTO_INCREMENT,
                                    `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `media_in` int DEFAULT NULL,
                                    PRIMARY KEY (`id`) USING BTREE,
                                    KEY `media_categories_title` (`title`) USING BTREE,
                                    KEY `media_categories_route` (`route`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `media_gallery` (
                                 `id` int NOT NULL AUTO_INCREMENT,
                                 `post_id` int NOT NULL,
                                 `media_id` int NOT NULL,
                                 `priority` int NOT NULL,
                                 PRIMARY KEY (`id`) USING BTREE,
                                 KEY `IDX_26FCFE73EA9FDD75` (`media_id`) USING BTREE,
                                 KEY `IDX_26FCFE734B89032C` (`post_id`) USING BTREE,
                                 CONSTRAINT `FK_26FCFE734B89032C` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
                                 CONSTRAINT `FK_26FCFE73EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5094 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `media_rel_categories` (
                                        `id` int NOT NULL AUTO_INCREMENT,
                                        `media_id` int NOT NULL,
                                        `media_category_id` int NOT NULL,
                                        PRIMARY KEY (`id`) USING BTREE,
                                        KEY `podcasts_rel_categories_podcast_id` (`media_id`) USING BTREE,
                                        KEY `podcasts_rel_categories_podcasts_category_id` (`media_category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11165 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

CREATE TABLE if not exists `employees` (
                             `id` int NOT NULL AUTO_INCREMENT,
                             `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `birth` date DEFAULT NULL,
                             `phone` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `reset_token` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `create_at` datetime DEFAULT NULL,
                             `update_at` datetime DEFAULT NULL,
                             `acl_id` int DEFAULT NULL,
                             `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `description` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci,
                             `firstname_en_US` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `firstname_ru_RU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `lastname_en_US` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `lastname_ru_RU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `description_en_US` text CHARACTER SET utf8 COLLATE utf8_general_ci,
                             `description_ru_RU` text CHARACTER SET utf8 COLLATE utf8_general_ci,
                             `allow_categories` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `is_unian` int NOT NULL DEFAULT '0',
                             `is_our_team` int NOT NULL DEFAULT '0',
                             `role_text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
                             `is_bloger` int NOT NULL DEFAULT '0',
                             `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                             `chat` int NOT NULL DEFAULT '0',
                             `facebook_url` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `vk_url` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `twitter_url` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             `instagram_url` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                             PRIMARY KEY (`id`) USING BTREE,
                             KEY `employees_acl_id` (`acl_id`) USING BTREE,
                             KEY `employees_email` (`email`) USING BTREE,
                             KEY `employees_reset_token` (`reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30324 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT
