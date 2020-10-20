<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType[]|\Cake\Collection\CollectionInterface $refFuelTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refFuelTypes index large-9 medium-8 columns content">
    <h3><?= __('Ref Fuel Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fuel_Type_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Unit_Buying_Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Unit_Sales_Price') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refFuelTypes as $refFuelType): ?>
                <tr>

                    <td><?= $refFuelType->has('user') ? $this->Html->link($refFuelType->user->email, ['controller' => 'Users', 'action' => 'view', $refFuelType->user->id]) : '' ?></td>
                    <td><?= h($refFuelType->Fuel_Type_Name) ?></td>
                    <td><?= h($refFuelType->slug) ?></td>
                    <td><?= $this->Number->format($refFuelType->Unit_Buying_Price) ?></td>
                    <td><?= $this->Number->format($refFuelType->Unit_Sales_Price) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $refFuelType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refFuelType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refFuelType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelType->id)]) ?>
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

    <h1>Upload File</h1>
    <div class="content">
        <?= $this->Flash->render() ?>
        <div class="upload-frm">
            <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
            <?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Upload File'), ['type' => 'submit', 'class' => 'form-controlbtn btn-default']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    <h1>Uploaded Files</h1>
    <div class="content">
        <!-- Table -->
        <table class="table">
            <tr>
                <th width="5%">#</th>
                <th width="20%">File</th>
                <th width="12%">Upload Date</th>
            </tr>
            <?php if ($filesRowNum > 0):$count = 0;
                foreach ($files as $file): $count++; ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td>
                            <?php
                            echo $this->Html->image($file->path . $file->name, [
                                "alt" => $file->name,
                                "width" => "220px",
                                "height" => "150px",
                                'url' => ['controller' => 'Home', 'action' => 'view', $file->id]
                            ]);
                            ?>
                        </td>
                        <td><?php echo $file->created; ?></td>
                    </tr>
                    <?php endforeach;
                else: ?>
                <tr><td colspan="3">No file(s) found......</td>
<?php endif; ?>
        </table>
    </div>
</div>
