<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NomGa $nomGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nomGa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nomGa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nomGas form large-9 medium-8 columns content">
    <?= $this->Form->create($nomGa) ?>
    <fieldset>
        <legend><?= __('Edit Nom Ga') ?></legend>
        <?php
            echo $this->Form->control('lieu_id', ['options' => $lieuGas]);
            echo $this->Form->control('prix_id', ['options' => $prixGas]);
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
