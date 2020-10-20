<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelPrice[]|\Cake\Collection\CollectionInterface $fuelPrices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fuel Price'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuelPrices index large-9 medium-8 columns content">
    <h3><?= __('Fuel Prices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref_fuel_types_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fuel_Price_Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Unit_Buying_Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Unit_Sales_Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fuelPrices as $fuelPrice): ?>
            <tr>
                <td><?= $this->Number->format($fuelPrice->id) ?></td>
                <td><?= $this->Number->format($fuelPrice->ref_fuel_types_id) ?></td>
                <td><?= h($fuelPrice->Fuel_Price_Date) ?></td>
                <td><?= $this->Number->format($fuelPrice->Unit_Buying_Price) ?></td>
                <td><?= $this->Number->format($fuelPrice->Unit_Sales_Price) ?></td>
                <td><?= h($fuelPrice->created) ?></td>
                <td><?= h($fuelPrice->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fuelPrice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuelPrice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuelPrice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelPrice->id)]) ?>
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
