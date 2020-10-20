<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactions form large-9 medium-8 columns content">
    <?= $this->Form->create($transaction) ?>
    <fieldset>
        <legend><?= __('Edit Transaction') ?></legend>
        <?php
            echo $this->Form->control('ref_fuel_types_id', ['options' => $refFuelTypes]);
            echo $this->Form->control('Transaction_Date');
            echo $this->Form->control('Transaction_Amount');
            echo $this->Form->control('Others_Details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
