<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groupes'), ['controller' => 'Groupes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Groupe'), ['controller' => 'Groupes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
	<p><strong style="color:red;">*</strong>&nbsp;&nbsp;<small style="font-size:14px;color:#ccc;font-style:italic;">Les informations pour le TP2 se trouvent à la suite de celles pour le TP1</small></p>
	<h1>A propos</h1>
	<h2>Informations générales</h2>
    <p>Gabriel GR - 420-5b7 MO Applications internet. Automne 2018, Collège Montmorency.</p>
	<h2>Informations spécifiques au travail pratique 1</h2>
	<p>Actions possibles : </p>
	<ul>
		<li><a href="/stockexchange/users/login">Se connecter*</a></li>
		<li><a href="/stockexchange/users/add">Créer un compte**</a></li>
		<li><a href="/stockexchange/products">Gérez vos produits à vendre (products) et vos produits favoris (users_products)</a></li>
		<li><a href="/stockexchange/orders">Gérez vos commandes</a></li>
		<li><a href="/stockexchange/files">Gérez les fichiers</a></li>
		<li><a href="/stockexchange/groupes">Gérez les groupes</a></li>
	</ul>
	<p>* Pour vous connecter à un compte existant : jr@jr.jr, mdp "p@ssW0RD", usager normal; root@jr.jr, mdp "p@ssW0RD", administrateur.</p>
	<p>** Pour créer un compte, assurez-vous d'avoir un serveur SMTP local avec un usager "stockexchange" dont le mot de passe est "stockexchange". Il n'est pas possible de ré-envoyer un courriel de confirmation si le courriel original est perdu.</p>
	<h2>Informations spécifiques au travail pratique 2</h2>
	<p><a href="https://github.com/ilostallmyaccounts/stockexchange">Accéder à la page GitHub</a></p>
	<p>Fonctionnalités :</p>
	<ul>
		<li><a href="/stockexchange/products/add">Liste liées</a></li>
		<li><a href="/stockexchange/groupes">Autocomplétion</a></li>
		<li><a href="/stockexchange/api/classifications">Api json</a> (accès direct, le lien pour la monopage est ci-dessous)</li>
		<li><a href="/stockexchange/classifications">Monopage</a></li>
		<li><a href="/stockexchange/admin/types">Routage admin (tables Types) + Menu déroulant Bootstrap</a> <strong>(assurez-vous d'être connecté en tant qu'administrateur : "root@jr.jr", "p@ssW0RD")</strong></li>
		<li><a href="/stockexchange/products/pdf/1.pdf">Téléchargement PDF</a> (Table Products; accessible à partir du menu ne navigation à gauche)</li>
	</ul>
	<h2>Diagramme de phpMyAdmin</h2>
	<img src="webroot/img/diagramme.png" alt="Diagramme des relations" />
</div>
