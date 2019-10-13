<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersGroupe $usersGroupe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersGroupe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersGroupe->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Groupes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groupes'), ['controller' => 'Groupes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Groupe'), ['controller' => 'Groupes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersGroupes form large-9 medium-8 columns content">
    <?= $this->Form->create($usersGroupe) ?>
    <fieldset>
        <legend><?= __('Edit Users Groupe') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('groupe_id', ['options' => $groupes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
