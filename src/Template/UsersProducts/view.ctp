<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersProduct $usersProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Product'), ['action' => 'edit', $usersProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Product'), ['action' => 'delete', $usersProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersProducts view large-9 medium-8 columns content">
    <h3><?= h($usersProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersProduct->has('user') ? $this->Html->link($usersProduct->user->id, ['controller' => 'Users', 'action' => 'view', $usersProduct->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $usersProduct->has('product') ? $this->Html->link($usersProduct->product->name, ['controller' => 'Products', 'action' => 'view', $usersProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersProduct->modified) ?></td>
        </tr>
    </table>
</div>
