<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forfait $forfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Forfait'), ['action' => 'edit', $forfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Forfait'), ['action' => 'delete', $forfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Forfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forfaits view content">
            <h3><?= h($forfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($forfait->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($forfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix') ?></th>
                    <td><?= $this->Number->format($forfait->prix) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lignesforfaits') ?></h4>
                <?php if (!empty($forfait->lignesforfaits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Forfait Id') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($forfait->lignesforfaits as $lignesforfaits) : ?>
                        <tr>
                            <td><?= h($lignesforfaits->id) ?></td>
                            <td><?= h($lignesforfaits->forfait_id) ?></td>
                            <td><?= h($lignesforfaits->quantite) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lignesforfaits', 'action' => 'view', $lignesforfaits->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignesforfaits', 'action' => 'edit', $lignesforfaits->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignesforfaits', 'action' => 'delete', $lignesforfaits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesforfaits->id)]) ?>
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
