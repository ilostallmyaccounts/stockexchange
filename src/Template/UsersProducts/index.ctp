<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersProduct[]|\Cake\Collection\CollectionInterface $usersProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersProducts index large-9 medium-8 columns content">
    <h3><?= __('Users Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersProducts as $usersProduct): ?>
            <tr>
                <td><?= $this->Number->format($usersProduct->id) ?></td>
                <td><?= $usersProduct->has('user') ? $this->Html->link($usersProduct->user->id, ['controller' => 'Users', 'action' => 'view', $usersProduct->user->id]) : '' ?></td>
                <td><?= $usersProduct->has('product') ? $this->Html->link($usersProduct->product->name, ['controller' => 'Products', 'action' => 'view', $usersProduct->product->id]) : '' ?></td>
                <td><?= h($usersProduct->created) ?></td>
                <td><?= h($usersProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersProduct->id)]) ?>
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
