<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<?= $this->Html->link(__('Edit Lieu Gas'), ['action' => 'edit', $lieuGa->id], ['class' => 'nav-link']) ?>
<?= $this->Form->postLink( __('Delete Lieu Gas'), ['action' => 'delete', $lieuGa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lieuGa->id), 'class' => 'nav-link'] ) ?>
<?= $this->Html->link(__('List Lieu Gass'), ['action' => 'index'], ['class' => 'nav-link']) ?> 
<?= $this->Html->link(__('New Lieu Gas'), ['action' => 'add'], ['class' => 'nav-link']) ?> 
<?= $this->Html->link(__('List Nom Gas'), ['controller' => 'NomGas', 'action' => 'index'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('New Nom Ga'), ['controller' => 'NomGas', 'action' => 'add'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('List Prix Gas'), ['controller' => 'PrixGas', 'action' => 'index'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('New Prix Gas'), ['controller' => 'PrixGas', 'action' => 'add'], ['class' => 'nav-link']) ?>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', $this->fetch('tb_actions')); ?>

<div class="krajRegions view large-9 medium-8 columns content">
    <h3><?= h($lieuGa->lieu) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            
            <tr>
                <th scope="row"><?= __('Lieu') ?></th>
                <td><?= h($lieuGa->lieu) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($lieuGa->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Nom Gas') ?></h4>
        <?php if (!empty($lieuGa->nom_gas)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Lieu Gas Id') ?></th>
                    <th scope="col"><?= __('Prix Gas Id') ?></th>
                    
                    <th scope="col"><?= __('Lieu') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($lieuGa->nom_gas as $nomGas): ?>
                <tr>
                    <td><?= h($nomGas->id) ?></td>
                    <td><?= h($nomGas->lieu_id) ?></td>
                    <td><?= h($nomGas->prix_gas) ?></td>
                    
                    <td><?= h($nomGas->lieu) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'NomGas', 'action' => 'view', $nomGas->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'NomGas', 'action' => 'edit', $nomGas->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'NomGas', 'action' => 'delete', $nomGas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomGas->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prix Gas') ?></h4>
        <?php if (!empty($lieuGa->okres_counties)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Lieu Gas Id') ?></th>
                    
                    <th scope="col"><?= __('Lieu') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($lieuGa->okres_counties as $prixGas): ?>
                <tr>
                    <td><?= h($prixGas->id) ?></td>
                    <td><?= h($prixGas->lieu_id) ?></td>
                    
                    <td><?= h($prixGas->lieu) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'PrixGas', 'action' => 'view', $prixGas->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'PrixGas', 'action' => 'edit', $prixGas->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'PrixGas', 'action' => 'delete', $prixGas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prixGas->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
