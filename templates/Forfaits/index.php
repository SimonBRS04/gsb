<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Forfait> $forfaits
 */
?>
<div class="forfaits index content">
    <?= $this->Html->link(__('Ajouter un Nouveau Forfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forfaits') ?></h3>
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
                <?php foreach ($forfaits as $forfait): ?>
                <tr>
                    <td><?= $this->Number->format($forfait->id) ?></td>
                    <td><?= h($forfait->type) ?></td>
                    <td><?= $this->Number->format($forfait->prix) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $forfait->id]) ?>
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $forfait->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $forfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forfait->id)]) ?>
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
