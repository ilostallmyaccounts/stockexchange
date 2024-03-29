<?php
$urlToLinkedListFilter = $this->Url->build([
    //"controller" => "Types",
    //"action" => "getByClassification",
	"controller" => "Classifications",
    "action" => "getClassifications",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Products/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products Name Translation'), ['controller' => 'Products_name_translation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Name Translation'), ['controller' => 'Products_name_translation', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orderlines'), ['controller' => 'Orderlines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderline'), ['controller' => 'Orderlines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List I18n'), ['controller' => 'I18n', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New I18n'), ['controller' => 'I18n', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="classificationsController">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend><div>
            Classification: 
            <select name="classification_id"
                    id="classification-id" 
                    ng-model="classification" 
                    ng-options="classification.name for classification in classifications track by classification.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Type: 
            <select name="type_id"
                    id="type-id" 
                    ng-disabled="!classification" 
                    ng-model="type"
                    ng-options="type.name for type in classification.types track by type.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
            echo $this->Form->control('name');
            //echo $this->Form->control('user_id');
            echo $this->Form->control('price');
			//echo $this->Form->control('Classification_id', ['options' => $classification_id]);
            //echo $this->Form->control('type_id', ['options' => $types]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
