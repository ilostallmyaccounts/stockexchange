<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
	
    <?php
    echo $this->Html->css([
        'base.css',
        'style.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
    ]);
    echo $this->Html->script([
			'https://code.jquery.com/jquery-1.12.4.js',
			'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
        ], ['block' => 'scriptLibraries']
    );
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	
    <?= $this->fetch('scriptLibraries') ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
				<li><?= $this->Html->link(__('French'), ['controller' => 'Users', 'action' => 'setFR']); ?></li>
				<li><?= $this->Html->link(__('English'), ['controller' => 'Users', 'action' => 'setEN']); ?></li>
				<li><?= $this->Html->link(__('German'), ['controller' => 'Users', 'action' => 'setDE']); ?></li>
                <?php
					$loguser = $this->request->getSession()->read('Auth.User');
					 if ($loguser) {
						$user = $loguser['email'];
						echo '<li>' . $this->Html->link($user, ['controller' => 'Users', 'action' => 'view/' . $loguser['id']]) . '</li>';
						echo '<li>' . $this->Html->link('[logout]', ['controller' => 'Users', 'action' => 'logout']) . '</li>';
					} else {
						echo '<li>' . $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']) . '</li>';
					}
				?>
				<li><?= $this->Html->link(__('A propos'), ['controller' => 'Apropos', 'action' => 'index']); ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div id="cakephp-container" class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
		<?= $this->fetch('scriptBottom')?>
    </footer>
</body>
</html>
