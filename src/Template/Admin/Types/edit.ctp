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
			<?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
		  </div>
		</div>
		</li>
    </ul>
</nav>
<div class="types form large-9 medium-8 columns content">
    <?= $this->Form->create($type) ?>
    <fieldset>
        <legend><?= __('Edit Type') ?></legend>
        <?php
            echo $this->Form->control('classification_id', ['options' => $classifications, 'empty' => true]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
