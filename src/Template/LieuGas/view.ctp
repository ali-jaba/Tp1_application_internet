<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LieuGa $lieuGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lieu Ga'), ['action' => 'edit', $lieuGa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lieu Ga'), ['action' => 'delete', $lieuGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lieuGa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lieuGas view large-9 medium-8 columns content">
    <h3><?= h($lieuGa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lieu') ?></th>
            <td><?= h($lieuGa->lieu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lieuGa->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nom Gas') ?></h4>
        <?php if (!empty($lieuGa->nom_gas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lieu Id') ?></th>
                <th scope="col"><?= __('Prix Id') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lieuGa->nom_gas as $nomGas): ?>
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
    <div class="related">
        <h4><?= __('Related Prix Gas') ?></h4>
        <?php if (!empty($lieuGa->prix_gas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lieu Id') ?></th>
                <th scope="col"><?= __('Prix') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lieuGa->prix_gas as $prixGas): ?>
            <tr>
                <td><?= h($prixGas->id) ?></td>
                <td><?= h($prixGas->lieu_id) ?></td>
                <td><?= h($prixGas->prix) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PrixGas', 'action' => 'view', $prixGas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PrixGas', 'action' => 'edit', $prixGas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrixGas', 'action' => 'delete', $prixGas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prixGas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
