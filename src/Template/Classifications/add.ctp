<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classification $classification
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['action' => 'index']) ?></li>
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
