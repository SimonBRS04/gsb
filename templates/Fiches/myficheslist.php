<div class="fiches index content">
    <?= $this->Html->link(__('Créer une Nouvelle Fiche'), ['action' => 'myfichesadd'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mes factures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('moisannee') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('datemodif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fich): ?>
                <tr>
                    <td><?= h($fich->moisannee) ?></td>
                    <td><?= h($fich->etat->libelle)?></td>
                    <td><?= h($fich->datemodif) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'myfichesview', $fich->id]) ?>
                        <?php if($fich->etat->id == 1){ ?>
                            <?= $this->Html->link(__('Modifier'), ['action' => 'myfichesedit', $fich->id]) ?>
                            <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $fich->id],    ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id)]) ?>
                        <?php }?>
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
