<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Forfait> $forfait
 */
?>
<div class="forfait index content">
    <?= $this->Html->link(__('New Forfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forfait') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('prix') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forfait as $forfait): ?>
                <tr>
                    <td><?= $this->Number->format($forfait->id) ?></td>
                    <td><?= h($forfait->type) ?></td>
                    <td><?= $this->Number->format($forfait->prix) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $forfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forfait->id)]) ?>
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
