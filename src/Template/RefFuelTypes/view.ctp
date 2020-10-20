<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType $refFuelType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <p><?php
            $this->request->session()->write('RefFuelTypes.id', $refFuelType->id);
            echo $this->Html->link(__('New Transactions'), ['controller' => 'transactions', 'action' => 'add']);
            ?></p>
        <li><?= $this->Html->link(__('Edit Ref Fuel Type'), ['action' => 'edit', $refFuelType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Fuel Type'), ['action' => 'delete', $refFuelType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refFuelTypes view large-9 medium-8 columns content">
    <h3><?= h($refFuelType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $refFuelType->has('user') ? $this->Html->link($refFuelType->user->id, ['controller' => 'Users', 'action' => 'view', $refFuelType->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fuel Type Name') ?></th>
            <td><?= h($refFuelType->Fuel_Type_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($refFuelType->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($refFuelType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Buying Price') ?></th>
            <td><?= $this->Number->format($refFuelType->Unit_Buying_Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Sales Price') ?></th>
            <td><?= $this->Number->format($refFuelType->Unit_Sales_Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($refFuelType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($refFuelType->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Fuel Type Description') ?></h4>
        <?= $this->Text->autoParagraph(h($refFuelType->Fuel_Type_Description)); ?>
    </div>

    <div class="related">
        <h4><?= __('Related transactions') ?></h4>
        <?php if (!empty($refFuelType->transactions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('id') ?></th>
                    <th scope="col"><?= __('ref fuel types id') ?></th>
                    <th scope="col"><?= __('Transaction Date') ?></th>
                    <th scope="col"><?= __('Transaction Amount') ?></th>
                    <th scope="col"><?= __('created') ?></th>
                    <th scope="col"><?= __('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>


                </tr>
                <?php foreach ($refFuelType->transactions as $transaction): ?>
                    <tr>
                        <td><?= h($transaction->id) ?></td>
                        <td><?= h($transaction->Ref_Fuel_Types_Id) ?></td>
                        <td><?= h($transaction->Transaction_Amount) ?></td>
                        <td><?= h($transaction->Modified) ?></td>
                        <td><?= h($transaction->Transaction_Date) ?></td>
                        <td><?= h($transaction->Created) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transaction->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transaction->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        
    </div>
</div>

</div>



