<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LieuGa[]|\Cake\Collection\CollectionInterface $lieuGas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lieuGas index large-9 medium-8 columns content">
    <h3><?= __('Lieu Gas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lieu') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lieuGas as $lieuGa): ?>
            <tr>
                <td><?= $this->Number->format($lieuGa->id) ?></td>
                <td><?= h($lieuGa->lieu) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lieuGa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lieuGa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lieuGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lieuGa->id)]) ?>
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
