-- phpMyAdmin SQL Dump

-- version 4.5.4.1deb2ubuntu2

-- http://www.phpmyadmin.net

--

-- Client :  localhost

-- Généré le :  Jeu 26 Octobre 2017 à 13:53

-- Version du serveur :  5.7.19-0ubuntu0.16.04.1

-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données :  ???????????????

--

-- --------------------------------------------------------

--

-- Structure de la table `user`

--

-- --------------------------------------------------------

DROP TABLE IF EXISTS user;

CREATE TABLE
    `user` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `email` VARCHAR(100) NOT NULL,
        `password` CHAR(60) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY unique_email (email),
        UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Contenu de la table `user`

--

-- --------------------------------------------------------

INSERT INTO
    `user` (`email`, `password`)
VALUES (
        'admin@wildcodeschool.fr',
        '$2y$10$DVgw60StPVYub9zMCdfQfOZJ/nnYQdVkoTvcp1CMa8jwLlGBTlUAa' -- generate ===> print_r(password_hash("mypassword", PASSWORD_DEFAULT));
    );

-- --------------------------------------------------------

--

-- Structure de la table `actuality`

--

-- --------------------------------------------------------

/*
 DROP TABLE IF EXISTS actuality;
 CREATE TABLE
 `actuality` (
 `id` INT NOT NULL AUTO_INCREMENT,
 `title` VARCHAR(100) NOT NULL,
 `content` TEXT NULL,
 `creation_date` DATETIME NOT NULL DEFAULT NOW(),
 `image_path` VARCHAR(255) NULL,
 PRIMARY KEY (`id`),
 UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE
 ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
 --
 -- Contenu de la table `Actuality`
 --
 INSERT INTO
 `actuality` (
 `title`,
 `content`,
 `creation_date`,
 `image_path`
 )
 VALUES (
 'Convocation Assemblée Générale 2023',
 'L''assemblée générale du Club.
 L''ordre du jour sera le suivant :
 Ouverture de l''assamblée générale par la présidente.
 Compte rendu moral de l''année 2022 par la présidente.',
 NOW(),
 'assemblee-generale.jpg'
 )
 */