<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ref Fuel Type') ?></th>
            <td><?= $transaction->has('ref_fuel_type') ? $this->Html->link($transaction->ref_fuel_type->id, ['controller' => 'RefFuelTypes', 'action' => 'view', $transaction->ref_fuel_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Amount') ?></th>
            <td><?= $this->Number->format($transaction->Transaction_Amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($transaction->Transaction_Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transaction->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Others Details') ?></h4>
        <?= $this->Text->autoParagraph(h($transaction->Others_Details)); ?>
    </div>
</div>
