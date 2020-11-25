<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NomGa[]|\Cake\Collection\CollectionInterface $nomGas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nomGas index large-9 medium-8 columns content">
    <h3><?= __('Nom Gas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lieu_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prix_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nomGas as $nomGa): ?>
            <tr>
                <td><?= $this->Number->format($nomGa->id) ?></td>
                <td><?= $nomGa->has('lieu_ga') ? $this->Html->link($nomGa->lieu_ga->id, ['controller' => 'LieuGas', 'action' => 'view', $nomGa->lieu_ga->id]) : '' ?></td>
                <td><?= $nomGa->has('prix_ga') ? $this->Html->link($nomGa->prix_ga->id, ['controller' => 'PrixGas', 'action' => 'view', $nomGa->prix_ga->id]) : '' ?></td>
                <td><?= h($nomGa->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nomGa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nomGa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nomGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomGa->id)]) ?>
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
