<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fiche $fiche
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fiche'), ['action' => 'edit', $fiche->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fiche'), ['action' => 'delete', $fiche->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiche->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fiche'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fiche'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiche view content">
            <h3><?= h($fiche->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $fiche->has('user') ? $this->Html->link($fiche->user->id, ['controller' => 'Users', 'action' => 'view', $fiche->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= $fiche->has('etat') ? $this->Html->link($fiche->etat->id, ['controller' => 'Etat', 'action' => 'view', $fiche->etat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Moisannee') ?></th>
                    <td><?= h($fiche->moisannee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fiche->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nbjustificatifs') ?></th>
                    <td><?= $this->Number->format($fiche->nbjustificatifs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datemodif') ?></th>
                    <td><?= h($fiche->datemodif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montantvalide') ?></th>
                    <td><?= $fiche->montantvalide ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fichefraisligne') ?></h4>
                <?php if (!empty($fiche->fichefraisligne)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Fiche Id') ?></th>
                            <th><?= __('Ligneforfait Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fiche->fichefraisligne as $fichefraisligne) : ?>
                        <tr>
                            <td><?= h($fichefraisligne->fiche_id) ?></td>
                            <td><?= h($fichefraisligne->ligneforfait_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fichefraisligne', 'action' => 'view', $fichefraisligne->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fichefraisligne', 'action' => 'edit', $fichefraisligne->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fichefraisligne', 'action' => 'delete', $fichefraisligne->], ['confirm' => __('Are you sure you want to delete # {0}?', $fichefraisligne->)]) ?>
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
