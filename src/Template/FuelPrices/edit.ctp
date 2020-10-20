<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelPrice $fuelPrice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fuelPrice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fuelPrice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fuel Prices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fuelPrices form large-9 medium-8 columns content">
    <?= $this->Form->create($fuelPrice) ?>
    <fieldset>
        <legend><?= __('Edit Fuel Price') ?></legend>
        <?php
            echo $this->Form->control('ref_fuel_types_id');
            echo $this->Form->control('Fuel_Price_Date');
            echo $this->Form->control('Unit_Buying_Price');
            echo $this->Form->control('Unit_Sales_Price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
