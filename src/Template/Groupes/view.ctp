<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Groupe $groupe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Groupe'), ['action' => 'edit', $groupe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Groupe'), ['action' => 'delete', $groupe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groupes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Groupe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groupes view large-9 medium-8 columns content">
    <h3><?= h($groupe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Groupname') ?></th>
            <td><?= h($groupe->groupname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $groupe->has('file') ? $this->Html->link($groupe->file->name, ['controller' => 'Files', 'action' => 'view', $groupe->file->id]) : '' ?></td>
        </tr>
        <!--tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($groupe->id) ?></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($groupe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($groupe->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($groupe->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Isadmin') ?></th>
                <th scope="col"><?= __('Joindate') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($groupe->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->isadmin) ?></td>
                <td><?= h($users->joindate) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
