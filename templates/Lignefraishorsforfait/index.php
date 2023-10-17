<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignefraishorsforfait> $lignefraishorsforfait
 */
?>
<div class="lignefraishorsforfait index content">
    <?= $this->Html->link(__('New Lignefraishorsforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignefraishorsforfait') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th><?= $this->Paginator->sort('libelle') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignefraishorsforfait as $lignefraishorsforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignefraishorsforfait->id) ?></td>
                    <td><?= h($lignefraishorsforfait->date) ?></td>
                    <td><?= $this->Number->format($lignefraishorsforfait->montant) ?></td>
                    <td><?= h($lignefraishorsforfait->libelle) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraishorsforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraishorsforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraishorsforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishorsforfait->id)]) ?>
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
