<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrixGa $prixGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prix Ga'), ['action' => 'edit', $prixGa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prix Ga'), ['action' => 'delete', $prixGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prixGa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prixGas view large-9 medium-8 columns content">
    <h3><?= h($prixGa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lieu Ga') ?></th>
            <td><?= $prixGa->has('lieu_ga') ? $this->Html->link($prixGa->lieu_ga->id, ['controller' => 'LieuGas', 'action' => 'view', $prixGa->lieu_ga->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prixGa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prix') ?></th>
            <td><?= $this->Number->format($prixGa->prix) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nom Gas') ?></h4>
        <?php if (!empty($prixGa->nom_gas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lieu Id') ?></th>
                <th scope="col"><?= __('Prix Id') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($prixGa->nom_gas as $nomGas): ?>
            <tr>
                <td><?= h($nomGas->id) ?></td>
                <td><?= h($nomGas->lieu_id) ?></td>
                <td><?= h($nomGas->prix_id) ?></td>
                <td><?= h($nomGas->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NomGas', 'action' => 'view', $nomGas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NomGas', 'action' => 'edit', $nomGas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NomGas', 'action' => 'delete', $nomGas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomGas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
