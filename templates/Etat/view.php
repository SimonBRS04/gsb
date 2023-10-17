<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etat $etat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Etat'), ['action' => 'edit', $etat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Etat'), ['action' => 'delete', $etat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Etat'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Etat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etat view content">
            <h3><?= h($etat->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Libelle') ?></th>
                    <td><?= h($etat->libelle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($etat->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fiche') ?></h4>
                <?php if (!empty($etat->fiche)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Etat Id') ?></th>
                            <th><?= __('Moisannee') ?></th>
                            <th><?= __('Nbjustificatifs') ?></th>
                            <th><?= __('Montantvalide') ?></th>
                            <th><?= __('Datemodif') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($etat->fiche as $fiche) : ?>
                        <tr>
                            <td><?= h($fiche->id) ?></td>
                            <td><?= h($fiche->user_id) ?></td>
                            <td><?= h($fiche->etat_id) ?></td>
                            <td><?= h($fiche->moisannee) ?></td>
                            <td><?= h($fiche->nbjustificatifs) ?></td>
                            <td><?= h($fiche->montantvalide) ?></td>
                            <td><?= h($fiche->datemodif) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fiche', 'action' => 'view', $fiche->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fiche', 'action' => 'edit', $fiche->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fiche', 'action' => 'delete', $fiche->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiche->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
