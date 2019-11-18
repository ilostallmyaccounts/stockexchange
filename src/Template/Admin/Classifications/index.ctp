<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classification[]|\Cake\Collection\CollectionInterface $classifications
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
<div class="classifications index large-9 medium-8 columns content">
    <h3><?= __('Classifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classifications as $classification): ?>
            <tr>
                <td><?= $this->Number->format($classification->id) ?></td>
                <td><?= h($classification->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $classification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $classification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classification->id)]) ?>
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
