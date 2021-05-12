-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2021 a las 23:20:08
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lacomprita`
--
CREATE DATABASE IF NOT EXISTS `lacomprita` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `lacomprita`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_11_143416_create_productos_table', 1),
(5, '2021_05_11_145336_create_productos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `nom_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `desc_producto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_producto` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_vendedor`, `nom_producto`, `precio_producto`, `stock_producto`, `desc_producto`, `imagen_producto`, `estado_producto`, `created_at`, `updated_at`) VALUES
(4, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/9nJac0B2OmcNN4NxaEtMQ6x0GLrzzxVaOHoYTtzp.jpg', 0, NULL, NULL),
(5, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/blpokP6LS34ejdKzNXxgUN03QcwBPgT7MBAaShX0.jpg', 0, NULL, NULL),
(6, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/WLehjoo9bYCb9I9Kx4pIJ6lMi3xIEk4TYo8L5Zv6.jpg', 0, NULL, NULL),
(7, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/qZWGHJrIixZfsnD1YfiXwEWAvbiXKsB9lypWEuh4.jpg', 0, NULL, NULL),
(8, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/hteO5QbNjFfKqsoRu8whQCShOP8coEG2Dps4JO1m.jpg', 0, NULL, NULL),
(9, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/G1XjC9C7UOgNX2HtsRckKrGtOOmmpdACFjvTgxMY.jpg', 0, NULL, NULL),
(10, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/oc6GVwzUWzdxu5gb9rOhowe6XfgLCWoXu4ERqxL4.jpg', 0, NULL, NULL),
(11, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/D3DUkwsk25A0AF4u6nJGsroQVRjIJnrUiITtkfpX.jpg', 0, NULL, NULL),
(12, 1, 'PC GAMER', 1200000, 5, 'PC GAMER\r\nINLCUYE:\r\nmouse\r\nteclado', 'uploads/pmlbM5wM4jOvDT1rdgag0v9YaF0f3HZlvTJHqQDr.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
