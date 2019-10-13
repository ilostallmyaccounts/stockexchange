<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersGroupe[]|\Cake\Collection\CollectionInterface $usersGroupes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Groupe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groupes'), ['controller' => 'Groupes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Groupe'), ['controller' => 'Groupes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersGroupes index large-9 medium-8 columns content">
    <h3><?= __('Users Groupes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('groupe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersGroupes as $usersGroupe): ?>
            <tr>
                <td><?= $this->Number->format($usersGroupe->id) ?></td>
                <td><?= $usersGroupe->has('user') ? $this->Html->link($usersGroupe->user->id, ['controller' => 'Users', 'action' => 'view', $usersGroupe->user->id]) : '' ?></td>
                <td><?= $usersGroupe->has('groupe') ? $this->Html->link($usersGroupe->groupe->id, ['controller' => 'Groupes', 'action' => 'view', $usersGroupe->groupe->id]) : '' ?></td>
                <td><?= h($usersGroupe->created) ?></td>
                <td><?= h($usersGroupe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersGroupe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersGroupe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersGroupe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersGroupe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
