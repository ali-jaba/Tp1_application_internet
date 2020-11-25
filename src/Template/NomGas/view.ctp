<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NomGa $nomGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nom Ga'), ['action' => 'edit', $nomGa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nom Ga'), ['action' => 'delete', $nomGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomGa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nomGas view large-9 medium-8 columns content">
    <h3><?= h($nomGa->nom) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lieu Ga') ?></th>
            <td><?= $nomGa->has('lieu_ga') ? $this->Html->link($nomGa->lieu_ga->id, ['controller' => 'LieuGas', 'action' => 'view', $nomGa->lieu_ga->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prix Ga') ?></th>
            <td><?= $nomGa->has('prix_ga') ? $this->Html->link($nomGa->prix_ga->id, ['controller' => 'PrixGas', 'action' => 'view', $nomGa->prix_ga->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($nomGa->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nomGa->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ref Fuel Types') ?></h4>
        <?php if (!empty($nomGa->ref_fuel_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('NomGas Id') ?></th>
                <th scope="col"><?= __('Fuel Type Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Fuel Type Description') ?></th>
                <th scope="col"><?= __('Unit Buying Price') ?></th>
                <th scope="col"><?= __('Unit Sales Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nomGa->ref_fuel_types as $refFuelTypes): ?>
            <tr>
                <td><?= h($refFuelTypes->id) ?></td>
                <td><?= h($refFuelTypes->user_id) ?></td>
                <td><?= h($refFuelTypes->NomGas_id) ?></td>
                <td><?= h($refFuelTypes->Fuel_Type_Name) ?></td>
                <td><?= h($refFuelTypes->slug) ?></td>
                <td><?= h($refFuelTypes->Fuel_Type_Description) ?></td>
                <td><?= h($refFuelTypes->Unit_Buying_Price) ?></td>
                <td><?= h($refFuelTypes->Unit_Sales_Price) ?></td>
                <td><?= h($refFuelTypes->created) ?></td>
                <td><?= h($refFuelTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RefFuelTypes', 'action' => 'view', $refFuelTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RefFuelTypes', 'action' => 'edit', $refFuelTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RefFuelTypes', 'action' => 'delete', $refFuelTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
