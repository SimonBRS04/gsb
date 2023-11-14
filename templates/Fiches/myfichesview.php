<div class="fiches index content">
    <?= $this->Html->link(__('Créer une Nouvelle Fiche'), ['action' => 'myfichesview'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ma Facture') ?></h3>
    <div class="table-responsive">
    <!-- LignesFraisForfait -->
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
    <!-- LignesFraisHF --></br> 
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('libelle') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignesfraishorsforfaits as $lignesfraishorsforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignesfraishorsforfait->id) ?></td>
                    <td><?= h($lignesfraishorsforfait->libelle) ?></td>
                    <td><?= $this->Number->format($lignesfraishorsforfait->montant) ?></td>
                    <td><?= h($lignesfraishorsforfait->date) ?></td>
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
