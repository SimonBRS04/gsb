<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignesfraishorsforfait> $lignesfraishorsforfaits
 */
?>
<div class="lignesfraishorsforfaits index content">
    <?= $this->Html->link(__('New Lignesfraishorsforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignesfraishorsforfaits') ?></h3>
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
                <?php foreach ($lignesfraishorsforfaits as $lignesfraishorsforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignesfraishorsforfait->id) ?></td>
                    <td><?= h($lignesfraishorsforfait->date) ?></td>
                    <td><?= $this->Number->format($lignesfraishorsforfait->montant) ?></td>
                    <td><?= h($lignesfraishorsforfait->libelle) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignesfraishorsforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignesfraishorsforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignesfraishorsforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesfraishorsforfait->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('dernier') . ' >>') ?>

        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichage de {{current}} ligne(s) sur {{count}} au total')) ?></p>
    </div>
</div>
