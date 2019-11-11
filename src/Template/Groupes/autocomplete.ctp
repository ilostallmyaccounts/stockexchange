<?php
$urlToGroupesAutocompleteJson = $this->Url->build([
    "controller" => "Groupes",
    "action" => "findGroupe",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToGroupesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Groupes/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Groupe'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Groupes') ?>
<fieldset>
    <legend><?= __('Search Groupe') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>