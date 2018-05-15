-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 15 mai 2018 à 09:02
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jForteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `undesirable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `pseudo`, `content`, `created_at`, `post_id`, `undesirable`) VALUES
(2, 'Isia', 'Un petit test', '2018-03-31 12:15:23', 1, 0),
(3, 'Cyril', 'Merci pour cet article très intéressant ! A bientôt', '2018-04-12 10:30:25', 1, 0),
(4, 'Samira', 'Un chapitre fort en émotion...', '2018-04-12 10:30:25', 2, 0),
(5, 'Cyril', 'Bravo pour ce deuxième chapitre! Vivement la suite merci!', '2018-04-14 17:45:33', 2, 0),
(6, 'jeanForteroche', 'Merci pour vos commentaires !', '2018-04-14 17:47:08', 2, 0),
(7, 'Sami', 'Vivement la suite ... :)', '2018-04-14 17:50:00', 1, 0),
(12, 'Cyril', 'Un chapitre hors du commun', '2018-04-24 17:24:40', 3, 0),
(13, 'Warren', 'Enorme comme toujours !', '2018-04-24 17:25:55', 3, 0),
(14, 'Toto', 'Ceci est un nouveau commentaire', '2018-05-02 17:35:14', 3, 0),
(19, 'Maurice', 'Ceci est super', '2018-05-09 10:59:39', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `images`) VALUES
(1, 1, 'SEUL EN FORÊT', 'Mauris ultrices justo diam, dignissim ornare felis consequat sed. Maecenas ultrices metus ac viverra maximus. Sed egestas enim lorem, et ullamcorper metus scelerisque non. Integer suscipit viverra dui, a semper ante tincidunt quis. Duis fringilla consectetur mi sit amet tristique. Proin dapibus neque eget diam sodales pharetra. Fusce eu purus sit amet diam varius dapibus et id nisi. Aenean eget turpis sed tortor cursus egestas et ut sapien. Fusce sagittis ante in arcu fringilla ultrices. Mauris gravida, ex a ullamcorper vehicula, magna metus gravida sem, eget pretium metus nibh sit amet mi. Quisque non euismod arcu. Maecenas nec auctor sapien, quis tempus justo. Cras ut ipsum risus. Etiam fermentum risus et magna fringilla, nec auctor dolor scelerisque.\r\n\r\nSuspendisse imperdiet lorem et ex ornare, id convallis ex malesuada. Suspendisse potenti. Proin imperdiet auctor est eu vulputate. Donec nec justo sed dolor hendrerit condimentum vel interdum neque. Sed commodo nulla et condimentum faucibus. Aliquam molestie non libero auctor placerat. Phasellus vulputate, nisl ut condimentum euismod, tortor velit pulvinar ante, et congue nunc leo sit amet massa. Quisque vestibulum lectus in dui viverra fermentum. Duis porttitor vitae quam sit amet facilisis. Maecenas sagittis urna nec augue pulvinar, vel molestie purus sodales. In vitae ex id diam blandit viverra. Aenean turpis enim, facilisis ac sapien non, lobortis laoreet magna. Morbi efficitur tortor vel feugiat egestas.', '2018-03-31 12:13:44', 'loup-foret.jpg'),
(2, 1, 'VOYAGE AU BOUT DU MONDE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ornare purus id ipsum porta, nec sollicitudin est suscipit. Morbi dolor lacus, fermentum et sapien quis, euismod posuere felis. Phasellus sodales dui pellentesque, fermentum tortor quis, molestie ex. Pellentesque aliquam leo turpis, auctor dapibus tellus rutrum ornare. Pellentesque faucibus risus id purus hendrerit, sed accumsan sapien elementum. Nunc at ullamcorper nibh. Integer ligula metus, eleifend id suscipit et, sagittis quis velit. Curabitur sagittis mauris lorem, vitae viverra nunc sollicitudin nec. Nullam porttitor nisi eu mollis tempor. Proin sed ipsum at leo ultrices ornare ac sit amet quam. Sed blandit nibh et lectus faucibus, non rhoncus felis rutrum.\r\n\r\nNunc id leo justo. Proin posuere dignissim sapien, rutrum fermentum diam pulvinar ut. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam cursus eros nibh, et aliquet ligula posuere in. Vestibulum imperdiet, elit ac dapibus ultrices, massa ipsum suscipit mi, in auctor orci purus quis neque. Ut orci nulla, feugiat non ultrices ac, volutpat vel justo.\r\n\r\nEtiam convallis leo quis eros dictum ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec lectus justo, venenatis non porta at, vestibulum non nisl. Nullam est massa, dapibus ultrices posuere ac, lobortis quis mi. Aliquam ultricies interdum velit sit amet vestibulum. Donec blandit felis ac metus porta, sed semper dolor rutrum. Nam vitae lectus purus. Nulla finibus, risus a convallis suscipit, quam libero egestas nibh, et mattis ante quam a nisl. Etiam sit amet hendrerit nisl. Aenean ac odio vitae lectus lobortis accumsan. Nulla eros tellus, dictum a interdum nec, viverra vel elit. Duis id leo a odio bibendum dignissim et sit amet neque.', '2018-03-31 12:13:44', 'voyage.jpg'),
(3, 1, 'Bear Lake', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, magna venenatis porta aliquet, leo sem ultricies lorem, in vulputate turpis est in nisi. Nam ac diam vitae risus auctor faucibus eget non purus. Etiam non mollis libero, id consectetur sapien. Etiam blandit ut metus vitae facilisis. Praesent blandit dapibus ex at condimentum. Ut mattis ac quam ac fringilla. Quisque euismod tempor vulputate. Nulla vestibulum consequat odio eu accumsan. Cras laoreet ullamcorper commodo. Maecenas ut suscipit lorem. Duis ullamcorper lectus felis, hendrerit bibendum eros faucibus a. Donec consectetur ultrices sagittis.&lt;/p&gt;\r\n&lt;p&gt;Ut tincidunt fringilla leo vel volutpat. Phasellus at quam eu neque commodo porttitor. Sed sit amet mauris diam. Vestibulum elementum, odio eu imperdiet laoreet, mauris mauris gravida lectus, sed dignissim urna felis vitae tortor. Mauris eget risus non ipsum consequat scelerisque. Aliquam vestibulum convallis tempor. Integer commodo sodales felis. Sed tincidunt felis at risus auctor fringilla eu a lacus. Curabitur ac ante sed felis hendrerit maximus sed sed nulla.&lt;/p&gt;\r\n&lt;p&gt;Donec fringilla nisl nec consectetur fermentum. Nam facilisis lobortis metus at venenatis. Donec lacinia blandit nisl placerat ultrices. Praesent rutrum porttitor odio nec finibus. Proin risus magna, vestibulum ut leo vitae, facilisis pulvinar libero. Praesent sed fermentum ligula. Integer gravida massa quis velit semper ultricies. Nulla condimentum ut libero sed accumsan. Mauris auctor mattis mauris, sollicitudin laoreet eros ullamcorper non. Suspendisse sagittis varius nisi vitae finibus. Sed nec ornare urna, ut molestie est.&lt;/p&gt;\r\n&lt;p&gt;Maecenas aliquam mi nec congue sollicitudin. Donec augue diam, scelerisque non tellus sit amet, efficitur tincidunt orci. Nulla aliquet, magna vitae luctus dapibus, ligula libero porttitor libero, vel posuere turpis lacus eu quam. Donec nibh nisl, tincidunt vitae congue ut, varius lobortis est. Integer ligula ipsum, pulvinar in sapien eu, scelerisque ullamcorper sem. Phasellus consectetur mauris quis enim finibus dictum. Fusce vel tempor eros. Suspendisse libero enim, efficitur eget lorem ac, elementum laoreet est. Donec elementum est at nunc pharetra, dignissim vehicula enim viverra. Nam rutrum sapien turpis.&lt;/p&gt;\r\n&lt;p&gt;Sed imperdiet consequat nisi, id laoreet augue aliquet in. Fusce sit amet nisi ante. Aenean gravida massa quis tempor convallis. Etiam a urna libero. Sed a porttitor ipsum. Nunc eget leo venenatis, volutpat urna a, blandit lacus. Donec ultricies, quam a tempor porta, mauris nulla fermentum ipsum, ac elementum diam tellus quis ipsum. Vestibulum posuere ligula at ipsum iaculis, sit amet dignissim enim semper. Ut eu tortor et purus bibendum dictum ut in arcu. Nunc rutrum quis velit vitae suscipit. Vestibulum ultricies dictum dictum. Cras pretium tellus erat, et pellentesque tortor ultrices et. Vivamus sed eros eget nisi pulvinar efficitur et eu nisi. Duis quis risus et tellus bibendum malesuada a sed nunc. Fusce turpis metus, pellentesque vitae erat et, tincidunt suscipit ligula. Vestibulum eu ex et leo fringilla viverra.&lt;/p&gt;', '2018-04-24 16:56:50', 'lac-alaska.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `created_at`) VALUES
(1, 'JeanForteroche', '$2y$10$L9Pwxhs/EWmHI1dCdH3Lcu0Iy3gXyqjZ4FTEKF7uJR47s4Lr/CL8m', '2018-03-31 12:12:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
