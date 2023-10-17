<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ligneforfait> $ligneforfait
 */
?>
<div class="ligneforfait index content">
    <?= $this->Html->link(__('New Ligneforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ligneforfait') ?></h3>
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
                <?php foreach ($ligneforfait as $ligneforfait): ?>
                <tr>
                    <td><?= $this->Number->format($ligneforfait->id) ?></td>
                    <td><?= $ligneforfait->has('forfait') ? $this->Html->link($ligneforfait->forfait->id, ['controller' => 'Forfait', 'action' => 'view', $ligneforfait->forfait->id]) : '' ?></td>
                    <td><?= $this->Number->format($ligneforfait->quantite) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ligneforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ligneforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ligneforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ligneforfait->id)]) ?>
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
