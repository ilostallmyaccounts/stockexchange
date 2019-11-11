<?php
$urlToGroupesAutocompleteJson = $this->Url->build([
    "controller" => "Groupes",
    "action" => "findGroupe",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToGroupesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Groupes/autocomplete', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Groupe[]|\Cake\Collection\CollectionInterface $groupes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Groupe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupes index large-9 medium-8 columns content">
    <h3><?= __('Groupes') ?></h3>
	<?= $this->Form->create('Groupes') ?>
	<fieldset>
		<legend><?= __('Search Groupe') ?></legend>
		<?php
		echo $this->Form->input('name', ['id' => 'autocomplete']);
		?>
	</fieldset>
	<?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--th scope="col"><?= $this->Paginator->sort('id') ?></th-->
                <th scope="col"><?= $this->Paginator->sort('groupname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupes as $groupe): ?>
            <tr>
                <!--td><?= $this->Number->format($groupe->id) ?></td-->
                <td><?= h($groupe->groupname) ?></td>
                <td><?= $groupe->has('file') ? $this->Html->link($groupe->file->name, ['controller' => 'Files', 'action' => 'view', $groupe->file->id]) : '' ?></td>
                <td><?= h($groupe->created) ?></td>
                <td><?= h($groupe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $groupe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $groupe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $groupe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupe->id)]) ?>
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
