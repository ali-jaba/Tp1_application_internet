<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrixGa $prixGa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prixGa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prixGa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prix Gas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lieu Gas'), ['controller' => 'LieuGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lieu Ga'), ['controller' => 'LieuGas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prixGas form large-9 medium-8 columns content">
    <?= $this->Form->create($prixGa) ?>
    <fieldset>
        <legend><?= __('Edit Prix Ga') ?></legend>
        <?php
            echo $this->Form->control('lieu_id', ['options' => $lieuGas]);
            echo $this->Form->control('prix');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
