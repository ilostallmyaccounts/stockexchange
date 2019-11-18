<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		<li>
		<div class="dropdown hidden-xs">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Actions
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<span class="dropdown-header">Classifications</span> 
			<?= $this->Html->link(__('List Classifications'), ['action' => 'index'], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('New Classification'), ['action' => 'add'], ['class' => 'dropdown-item']) ?>
			<span class="dropdown-header">Types</span> 
			<?= $this->Html->link(__('Edit Type'), ['action' => 'edit', $type->id], ['class' => 'dropdown-item']) ?>
			<?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
		  </div>
		</div>
		</li>
    </ul>
</nav>
<div class="types view large-9 medium-8 columns content">
    <h3><?= h($type->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $type->has('classification') ? $this->Html->link($type->classification->name, ['controller' => 'Classifications', 'action' => 'view', $type->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($type->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($type->id) ?></td>
        </tr>
    </table>
</div>
