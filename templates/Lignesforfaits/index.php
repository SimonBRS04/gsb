<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignesforfait> $lignesforfaits
 */
?>
<div class="lignesforfaits index content">
    <?= $this->Html->link(__('New Lignesforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignesforfaits') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('forfait_id') ?></th>
                    <th><?= $this->Paginator->sort('quantite') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignesforfaits as $lignesforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignesforfait->id) ?></td>
                    <td><?= $lignesforfait->has('forfait') ? $this->Html->link($lignesforfait->forfait->type, ['controller' => 'Forfaits', 'action' => 'view', $lignesforfait->forfait->id]) : '' ?></td>
                    <td><?= $this->Number->format($lignesforfait->quantite) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignesforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignesforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignesforfait->id], ['confirm' => __('Are you sure you want to delete {0} ?', $lignesforfait->forfait->type)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
