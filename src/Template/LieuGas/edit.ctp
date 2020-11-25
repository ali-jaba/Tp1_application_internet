<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LieuGa $lieuGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lieuGa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lieuGa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prix Ga'), ['controller' => 'PrixGas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lieuGas form large-9 medium-8 columns content">
    <?= $this->Form->create($lieuGa) ?>
    <fieldset>
        <legend><?= __('Edit Lieu Ga') ?></legend>
        <?php
            echo $this->Form->control('lieu');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
