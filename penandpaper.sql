-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 19, 2019 at 01:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `penandpapercms`
--
CREATE DATABASE IF NOT EXISTS `penandpapercms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `penandpapercms`;

-- --------------------------------------------------------

--
-- Table structure for table `character`
--

CREATE TABLE `character` (
`id` int(11) NOT NULL,
`user_id` int(11) DEFAULT NULL,
`name` varchar(255) NOT NULL,
`created_at` datetime NOT NULL,
`last_login` datetime DEFAULT NULL,
`religion` varchar(50) NOT NULL,
`age` int(11) NOT NULL,
                `gender` varchar(50) NOT NULL,
                  `profession` varchar(50) NOT NULL,
                    `figure` varchar(50) NOT NULL,
                      `max_load_kg` int(11) NOT NULL,
                        `money` int(11) NOT NULL,
                          `max_hitpoints` int(11) NOT NULL,
                            `hitpoints` int(11) NOT NULL,
                              `max_energy` int(11) NOT NULL,
                                `energy` int(11) NOT NULL,
                                  `image_path` varchar(255) DEFAULT NULL
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                  --
                                  -- Dumping data for table `character`
                                  --

                                  INSERT INTO `character` (`id`, `user_id`, `name`, `created_at`, `last_login`, `religion`, `age`, `gender`, `profession`, `figure`, `max_load_kg`, `money`, `max_hitpoints`, `hitpoints`, `max_energy`, `energy`, `image_path`) VALUES
                                  (1, 1, 'John Doe', '2019-02-18 14:14:04', NULL, 'Atheist', 123, 'male', 'Barkeeper', 'Mr. Universe', 120, 1000, 100, 80, 100, 50, NULL),
                                  (2, 5, 'ironman6', '2019-02-18 14:14:04', NULL, 'Atheist', 32, 'male', 'Barkeeper', 'Mr. Universe', 120, 1000, 100, 80, 100, 50, NULL),
                                  (6, 5, 'Max', '2019-02-18 14:14:04', NULL, 'Atheist', 123, 'male', 'Barkeeper', 'Mr. Universe', 120, 1000, 100, 80, 100, 50, NULL);

                                  -- --------------------------------------------------------

                                  --
                                  -- Table structure for table `character_inventory`
                                  --

                                  CREATE TABLE `character_inventory` (
                                    `id` int(11) NOT NULL,
                                      `character_id` int(11) DEFAULT NULL,
                                        `name` varchar(60) NOT NULL,
                                          `weight_kg` int(11) NOT NULL,
                                            `count` int(11) NOT NULL DEFAULT '1'
                                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                            -- --------------------------------------------------------

                                            --
                                            -- Table structure for table `character_skill`
                                            --

                                            CREATE TABLE `character_skill` (
                                              `id` int(11) NOT NULL,
                                                `character_id` int(11) NOT NULL,
                                                  `name` varchar(60) NOT NULL,
                                                    `type` enum('action','knowledge','social') NOT NULL,
                                                      `points` int(11) NOT NULL,
                                                        `damage` int(11) DEFAULT '0'
                                                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                                        --
                                                        -- Dumping data for table `character_skill`
                                                        --

                                                        INSERT INTO `character_skill` (`id`, `character_id`, `name`, `type`, `points`, `damage`) VALUES
                                                        (1, 1, 'Flamethrower', 'action', 50, 100),
                                                        (2, 1, 'Throw stone', 'action', 10, 20);

                                                        -- --------------------------------------------------------

                                                        --
                                                        -- Table structure for table `character_thunderpoints`
                                                        --

                                                        CREATE TABLE `character_thunderpoints` (
                                                          `id` int(11) NOT NULL,
                                                            `character_id` int(11) NOT NULL,
                                                              `action_points` int(11) NOT NULL,
                                                                `knowledge_points` int(11) NOT NULL,
                                                                  `social_points` int(11) NOT NULL
                                                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                                                  --
                                                                  -- Dumping data for table `character_thunderpoints`
                                                                  --

                                                                  INSERT INTO `character_thunderpoints` (`id`, `character_id`, `action_points`, `knowledge_points`, `social_points`) VALUES
                                                                  (2, 2, 1, 2, 3);

                                                                  -- --------------------------------------------------------

                                                                  --
                                                                  -- Table structure for table `character_weapons`
                                                                  --

                                                                  CREATE TABLE `character_weapons` (
                                                                    `id` int(11) NOT NULL,
                                                                      `character_id` int(11) DEFAULT NULL,
                                                                        `name` varchar(60) NOT NULL,
                                                                          `parade` int(11) NOT NULL,
                                                                            `description` varchar(255) DEFAULT '',
                                                                              `damage` int(11) NOT NULL,
                                                                                `dice_count` int(11) NOT NULL,
                                                                                  `dice_value` int(11) NOT NULL,
                                                                                    `weight_kg` int(11) NOT NULL
                                                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                                                                    --
                                                                                    -- Dumping data for table `character_weapons`
                                                                                    --

                                                                                    INSERT INTO `character_weapons` (`id`, `character_id`, `name`, `parade`, `description`, `damage`, `dice_count`, `dice_value`, `weight_kg`) VALUES
                                                                                    (1, 1, 'Das Krawattenschwert', 10, 'Bla', 100, 2, 20, 10);

                                                                                    -- --------------------------------------------------------

                                                                                    --
                                                                                    -- Table structure for table `user`
                                                                                    --

                                                                                    CREATE TABLE `user` (
                                                                                      `id` int(11) NOT NULL,
                                                                                        `email_address` varchar(255) NOT NULL,
<<<<<<< HEAD
                                                                                          `password_hash` varchar(255) NOT NULL,
=======
                                                                                          `password_hash` varchar(40) NOT NULL,
>>>>>>> fc2dbc603f127271c63add6bdb6118712b98be49
                                                                                            `birth_date` datetime NOT NULL,
                                                                                              `first_name` varchar(60) NOT NULL,
                                                                                                `last_name` varchar(60) NOT NULL
                                                                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                                                                                                --
                                                                                                -- Dumping data for table `user`
                                                                                                --

                                                                                                INSERT INTO `user` (`id`, `email_address`, `password_hash`, `birth_date`, `first_name`, `last_name`) VALUES
                                                                                                (1, 'janos@wolter.example', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2019-01-01 01:01:01', 'John', 'Doe'),
                                                                                                (2, 'janos2@wolter.example', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2019-01-02 01:01:01', 'Jane', 'Doe'),
                                                                                                (4, 'max@mail', '906072001efddf3e11e6d2b5782f4777fe038739', '1990-01-01 00:00:00', 'Max', 'Muster'),
                                                                                                (5, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '1990-01-01 00:00:00', 'test', 'test'),
                                                                                                (6, 'elia', '247b11620f16283fda23935ee9605986aa12217f', '1990-01-01 00:00:00', 'Elia', 'ne'),
                                                                                                (7, 'web', '247b11620f16283fda23935ee9605986aa12217f', '1990-01-01 00:00:00', 'egal', 'egal'),
                                                                                                (8, 'typ', '2b88004726d60a0fff73ab26f015b0c759cdae75', '1990-01-01 00:00:00', 'egal', 'egal'),
                                                                                                (9, 'otti', '95315ae352c348d573497a7ec3633e9a78217983', '1990-01-01 00:00:00', 'egal', 'egal');

                                                                                                --
                                                                                                -- Indexes for dumped tables
                                                                                                --

                                                                                                --
                                                                                                -- Indexes for table `character`
                                                                                                --
                                                                                                ALTER TABLE `character`
                                                                                                  ADD PRIMARY KEY (`id`),
                                                                                                    ADD KEY `user_id` (`user_id`);

                                                                                                    --
                                                                                                    -- Indexes for table `character_inventory`
                                                                                                    --
                                                                                                    ALTER TABLE `character_inventory`
                                                                                                      ADD PRIMARY KEY (`id`),
                                                                                                        ADD KEY `character_id` (`character_id`);

                                                                                                        --
                                                                                                        -- Indexes for table `character_skill`
                                                                                                        --
                                                                                                        ALTER TABLE `character_skill`
                                                                                                          ADD PRIMARY KEY (`id`),
                                                                                                            ADD KEY `character_id` (`character_id`);

                                                                                                            --
                                                                                                            -- Indexes for table `character_thunderpoints`
                                                                                                            --
                                                                                                            ALTER TABLE `character_thunderpoints`
                                                                                                              ADD PRIMARY KEY (`id`),
                                                                                                                ADD KEY `character_id` (`character_id`);

                                                                                                                --
                                                                                                                -- Indexes for table `character_weapons`
                                                                                                                --
                                                                                                                ALTER TABLE `character_weapons`
                                                                                                                  ADD PRIMARY KEY (`id`),
                                                                                                                    ADD KEY `character_id` (`character_id`);

                                                                                                                    --
                                                                                                                    -- Indexes for table `user`
                                                                                                                    --
                                                                                                                    ALTER TABLE `user`
                                                                                                                      ADD PRIMARY KEY (`id`),
                                                                                                                        ADD UNIQUE KEY `email_address` (`email_address`);

                                                                                                                        --
                                                                                                                        -- AUTO_INCREMENT for dumped tables
                                                                                                                        --

                                                                                                                        --
                                                                                                                        -- AUTO_INCREMENT for table `character`
                                                                                                                        --
                                                                                                                        ALTER TABLE `character`
                                                                                                                          MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

                                                                                                                          --
                                                                                                                          -- AUTO_INCREMENT for table `character_inventory`
                                                                                                                          --
                                                                                                                          ALTER TABLE `character_inventory`
                                                                                                                            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

                                                                                                                            --
                                                                                                                            -- AUTO_INCREMENT for table `character_skill`
                                                                                                                            --
                                                                                                                            ALTER TABLE `character_skill`
                                                                                                                              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

                                                                                                                              --
                                                                                                                              -- AUTO_INCREMENT for table `character_thunderpoints`
                                                                                                                              --
                                                                                                                              ALTER TABLE `character_thunderpoints`
                                                                                                                                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

                                                                                                                                --
                                                                                                                                -- AUTO_INCREMENT for table `character_weapons`
                                                                                                                                --
                                                                                                                                ALTER TABLE `character_weapons`
                                                                                                                                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

                                                                                                                                  --
                                                                                                                                  -- AUTO_INCREMENT for table `user`
                                                                                                                                  --
                                                                                                                                  ALTER TABLE `user`
                                                                                                                                    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

                                                                                                                                    --
                                                                                                                                    -- Constraints for dumped tables
                                                                                                                                    --

                                                                                                                                    --
                                                                                                                                    -- Constraints for table `character`
                                                                                                                                    --
                                                                                                                                    ALTER TABLE `character`
                                                                                                                                      ADD CONSTRAINT `character_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

                                                                                                                                      --
                                                                                                                                      -- Constraints for table `character_inventory`
                                                                                                                                      --
                                                                                                                                      ALTER TABLE `character_inventory`
                                                                                                                                        ADD CONSTRAINT `character_inventory_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`);

                                                                                                                                        --
                                                                                                                                        -- Constraints for table `character_skill`
                                                                                                                                        --
                                                                                                                                        ALTER TABLE `character_skill`
                                                                                                                                          ADD CONSTRAINT `character_skill_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`);

                                                                                                                                          --
                                                                                                                                          -- Constraints for table `character_thunderpoints`
                                                                                                                                          --
                                                                                                                                          ALTER TABLE `character_thunderpoints`
                                                                                                                                            ADD CONSTRAINT `character_thunderpoints_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`);

                                                                                                                                            --
                                                                                                                                            -- Constraints for table `character_weapons`
                                                                                                                                            --
                                                                                                                                            ALTER TABLE `character_weapons`
                                                                                                                                              ADD CONSTRAINT `character_weapons_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`);
<<<<<<< HEAD
=======

>>>>>>> fc2dbc603f127271c63add6bdb6118712b98be49
