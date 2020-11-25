<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType $refFuelType
 */
?>
<?php
$urlToNomGasAutocompletedemoJson = $this->Url->build([
    "controller" => "NomGas",
    "action" => "findNomGas",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToNomGasAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('RefFuelTypes/add_edit/NomGasAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refFuelTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($refFuelType) ?>
    <fieldset>
        <legend><?= __('Add Ref Fuel Type') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('Fuel_Type_Name');
             echo $this->Form->control('NomGas_id', ['label' => __('Nom') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);
            echo $this->Form->control('slug');
            echo $this->Form->control('Fuel_Type_Description');
            echo $this->Form->control('Unit_Buying_Price');
            echo $this->Form->control('Unit_Sales_Price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
