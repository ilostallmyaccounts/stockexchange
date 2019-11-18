<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classification $classification
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
			<?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
			<?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
		  </div>
		</div>
		</li>
    </ul>
</nav>
<div class="classifications form large-9 medium-8 columns content">
    <?= $this->Form->create($classification) ?>
    <fieldset>
        <legend><?= __('Add Classification') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
