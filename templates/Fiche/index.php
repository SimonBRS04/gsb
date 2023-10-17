<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fiche> $fiche
 */
?>
<div class="fiche index content">
    <?= $this->Html->link(__('New Fiche'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiche') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('moisannee') ?></th>
                    <th><?= $this->Paginator->sort('nbjustificatifs') ?></th>
                    <th><?= $this->Paginator->sort('montantvalide') ?></th>
                    <th><?= $this->Paginator->sort('datemodif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiche as $fiche): ?>
                <tr>
                    <td><?= $this->Number->format($fiche->id) ?></td>
                    <td><?= $fiche->has('user') ? $this->Html->link($fiche->user->id, ['controller' => 'Users', 'action' => 'view', $fiche->user->id]) : '' ?></td>
                    <td><?= $fiche->has('etat') ? $this->Html->link($fiche->etat->id, ['controller' => 'Etat', 'action' => 'view', $fiche->etat->id]) : '' ?></td>
                    <td><?= h($fiche->moisannee) ?></td>
                    <td><?= $this->Number->format($fiche->nbjustificatifs) ?></td>
                    <td><?= h($fiche->montantvalide) ?></td>
                    <td><?= h($fiche->datemodif) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fiche->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fiche->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fiche->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiche->id)]) ?>
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
