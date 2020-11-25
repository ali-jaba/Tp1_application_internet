<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrixGa[]|\Cake\Collection\CollectionInterface $prixGas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prixGas index large-9 medium-8 columns content">
    <h3><?= __('Prix Gas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lieu_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prix') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prixGas as $prixGa): ?>
            <tr>
                <td><?= $this->Number->format($prixGa->id) ?></td>
                <td><?= $prixGa->has('lieu_ga') ? $this->Html->link($prixGa->lieu_ga->id, ['controller' => 'LieuGas', 'action' => 'view', $prixGa->lieu_ga->id]) : '' ?></td>
                <td><?= $this->Number->format($prixGa->prix) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prixGa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prixGa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prixGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prixGa->id)]) ?>
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
