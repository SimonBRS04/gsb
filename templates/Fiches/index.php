<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fich> $fiches
 */
?>
<div class="fiches index content">
    <?= $this->Html->link(__('Nouvelle Fiche Vide'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('moisannee') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('datemodif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fich): ?>
                <tr>
                    <td><?= $this->Number->format($fich->id) ?></td>
                    <td><?= $fich->has('user') ? $this->Html->link($fich->user->username, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                    <td><?= h($fich->moisannee) ?></td>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->libelle, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                    <td><?= h($fich->datemodif) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fich->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fich->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id)]) ?>
                        <br/>
                        <?= $this->Html->link(__('mfView'), ['action' => 'myfichesview', $fich->id]) ?>
                        <?= $this->Html->link(__('mfEdit'), ['action' => 'myfichesedit', $fich->id]) ?>
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
