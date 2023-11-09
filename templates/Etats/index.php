<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Etat> $etats
 */
?>
<div class="etats index content">
    <?= $this->Html->link(__('Créer un nouvel Etat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Etats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('libelle') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etats as $etat): ?>
                <tr>
                    <td><?= $this->Number->format($etat->id) ?></td>
                    <td><?= h($etat->libelle) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $etat->id]) ?>
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $etat->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $etat->id], ['confirm' => __('Voulez-vous vraiment supprimer la fiche # {0}?', $etat->id)]) ?>
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
