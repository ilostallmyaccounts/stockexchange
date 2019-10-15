


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stockexchange`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
);

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'itop.txt', 'uploads/files/', '2019-10-14 00:27:21', '2019-10-14 00:27:21', 1),
(2, 'e.html', 'uploads/files/', '2019-10-14 00:48:11', '2019-10-14 00:48:11', 1),
(3, '6b0c7491d0776cf40dc0f455b937edf8.jpg', 'uploads/files/', '2019-10-14 00:52:18', '2019-10-14 00:52:18', 1),
(4, 'YYKGVl2.jpg', 'uploads/files/', '2019-10-14 01:02:52', '2019-10-14 01:02:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `groupname` varchar(32) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `groupname`, `file_id`, `created`, `modified`) VALUES
(1, 'Test', 4, '2019-10-13', '2019-10-14');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
);

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_FR', 'Products', 2, 'name', 'Test (en français)');

-- --------------------------------------------------------

--
-- Structure de la table `orderlines`
--

CREATE TABLE `orderlines` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `date_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_purchase`, `created`, `modified`) VALUES
(1, 1, '2019-10-12 23:54:00', '2019-10-12', '2019-10-12');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`, `price`, `created`, `modified`) VALUES
(1, 'Produit 101', 1, 19, '2019-10-12', '2019-10-12'),
(3, 'Test', 1, 79, '2019-10-13', '2019-10-13'),
(4, 'Test 2', 1, 39, '2019-10-13', '2019-10-13'),
(5, 'qwerty', 1, 12, '2019-10-13', '2019-10-13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `joindate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validation` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `isadmin`, `joindate`, `validation`, `created`, `modified`) VALUES
(1, 'Jeanne', 'Roberte', 'jr@jr.jr', '1234567890', '$2y$10$mVrhM.ees.NW7Z4WH2j1MeNUB7p7v/ndAGxm12.M8M6PLfJeBzocK', 0, '2019-10-12 23:53:00', NULL, '2019-10-12', '2019-10-13'),
(3, 'Charlie', 'Root', 'root@jr.jr', '1234567890', '$2y$10$BB2KIMus4z1COw1pdcIMXeCbX/2W4mjJHgirNMtbrh5XPziorDP9G', 1, '2019-10-12 23:55:00', NULL, '2019-10-12', '2019-10-12');

-- --------------------------------------------------------

--
-- Structure de la table `users_groupes`
--

CREATE TABLE `users_groupes` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
);

--
-- Déchargement des données de la table `users_products`
--

INSERT INTO `users_products` (`id`, `user_id`, `product_id`, `created`, `modified`) VALUES
(1, 1, 3, '2019-10-13', '2019-10-13'),
(2, 1, 4, '2019-10-13', '2019-10-13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `files`
--

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groupes`
--
ALTER TABLE `users_groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `groupe_id` (`groupe_id`);

--
-- Index pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `orderlines`
--
ALTER TABLE `orderlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users_groupes`
--
ALTER TABLE `users_groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);

--
-- Contraintes pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD CONSTRAINT `orderlines_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderlines_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users_groupes`
--
ALTER TABLE `users_groupes`
  ADD CONSTRAINT `users_groupes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_groupes_ibfk_2` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`);

--
-- Contraintes pour la table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `users_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
