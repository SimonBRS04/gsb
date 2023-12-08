<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignesfraishorsforfait $lignesfraishorsforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignesfraishorsforfait'), ['action' => 'edit', $lignesfraishorsforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignesfraishorsforfait'), ['action' => 'delete', $lignesfraishorsforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesfraishorsforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignesfraishorsforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignesfraishorsforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesfraishorsforfaits view content">
            <h3><?= h($lignesfraishorsforfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Libelle') ?></th>
                    <td><?= h($lignesfraishorsforfait->libelle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignesfraishorsforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= $this->Number->format($lignesfraishorsforfait->montant) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($lignesfraishorsforfait->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fiches') ?></h4>
                <?php if (!empty($lignesfraishorsforfait->fiches)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Etat Id') ?></th>
                            <th><?= __('Moisannee') ?></th>
                            <th><?= __('Datemodif') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($lignesfraishorsforfait->fiches as $fiches) : ?>
                        <tr>
                            <td><?= h($fiches->id) ?></td>
                            <td><?= h($fiches->user_id) ?></td>
                            <td><?= h($fiches->etat_id) ?></td>
                            <td><?= h($fiches->moisannee) ?></td>
                            <td><?= h($fiches->datemodif) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fiches', 'action' => 'view', $fiches->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fiches', 'action' => 'edit', $fiches->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fiches', 'action' => 'delete', $fiches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiches->id)]) ?>
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
