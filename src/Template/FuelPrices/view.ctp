<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelPrice $fuelPrice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fuel Price'), ['action' => 'edit', $fuelPrice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fuel Price'), ['action' => 'delete', $fuelPrice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelPrice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fuel Prices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuel Price'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fuelPrices view large-9 medium-8 columns content">
    <h3><?= h($fuelPrice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuelPrice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Fuel Types Id') ?></th>
            <td><?= $this->Number->format($fuelPrice->ref_fuel_types_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Buying Price') ?></th>
            <td><?= $this->Number->format($fuelPrice->Unit_Buying_Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Sales Price') ?></th>
            <td><?= $this->Number->format($fuelPrice->Unit_Sales_Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fuel Price Date') ?></th>
            <td><?= h($fuelPrice->Fuel_Price_Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fuelPrice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fuelPrice->modified) ?></td>
        </tr>
    </table>
</div>
