<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersGroupe $usersGroupe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Groupe'), ['action' => 'edit', $usersGroupe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Groupe'), ['action' => 'delete', $usersGroupe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersGroupe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Groupes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Groupe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groupes'), ['controller' => 'Groupes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Groupe'), ['controller' => 'Groupes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersGroupes view large-9 medium-8 columns content">
    <h3><?= h($usersGroupe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersGroupe->has('user') ? $this->Html->link($usersGroupe->user->id, ['controller' => 'Users', 'action' => 'view', $usersGroupe->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Groupe') ?></th>
            <td><?= $usersGroupe->has('groupe') ? $this->Html->link($usersGroupe->groupe->id, ['controller' => 'Groupes', 'action' => 'view', $usersGroupe->groupe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersGroupe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersGroupe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersGroupe->modified) ?></td>
        </tr>
    </table>
</div>
