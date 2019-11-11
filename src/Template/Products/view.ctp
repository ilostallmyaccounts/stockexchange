<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products Name Translation'), ['controller' => 'Products_name_translation', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Name Translation'), ['controller' => 'Products_name_translation', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orderlines'), ['controller' => 'Orderlines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderline'), ['controller' => 'Orderlines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List I18n'), ['controller' => 'I18n', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New I18n'), ['controller' => 'I18n', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $product->has('type') ? $this->Html->link($product->type->name, ['controller' => 'Types', 'action' => 'view', $product->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Products Name Translation') ?></th>
            <td><?= $product->has('name_translation') ? $this->Html->link($product->name_translation->id, ['controller' => 'Products_name_translation', 'action' => 'view', $product->name_translation->id]) : '' ?></td>
        </tr>
        <!--tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($product->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td>$ <?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($product->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!--th scope="col"><?= __('Id') ?></th-->
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Isadmin') ?></th>
                <th scope="col"><?= __('Joindate') ?></th>
                <th scope="col"><?= __('Validation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->users as $users): ?>
            <tr>
                <!--td><?= h($users->id) ?></td-->
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->isadmin) ?></td>
                <td><?= h($users->joindate) ?></td>
                <td><?= h($users->validation) ?></td>
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
    <div class="related">
        <h4><?= __('Related Orderlines') ?></h4>
        <?php if (!empty($product->orderlines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!--th scope="col"><?= __('Id') ?></th-->
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->orderlines as $orderlines): ?>
            <tr>
                <!--td><?= h($orderlines->id) ?></td-->
                <td><?= h($orderlines->order_id) ?></td>
                <td><?= h($orderlines->product_id) ?></td>
                <td><?= h($orderlines->quantity) ?></td>
                <td><?= h($orderlines->created) ?></td>
                <td><?= h($orderlines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orderlines', 'action' => 'view', $orderlines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orderlines', 'action' => 'edit', $orderlines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orderlines', 'action' => 'delete', $orderlines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
