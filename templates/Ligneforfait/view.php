<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ligneforfait $ligneforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ligneforfait'), ['action' => 'edit', $ligneforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ligneforfait'), ['action' => 'delete', $ligneforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ligneforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ligneforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ligneforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ligneforfait view content">
            <h3><?= h($ligneforfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Forfait') ?></th>
                    <td><?= $ligneforfait->has('forfait') ? $this->Html->link($ligneforfait->forfait->id, ['controller' => 'Forfait', 'action' => 'view', $ligneforfait->forfait->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ligneforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantite') ?></th>
                    <td><?= $this->Number->format($ligneforfait->quantite) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fichefraisligne') ?></h4>
                <?php if (!empty($ligneforfait->fichefraisligne)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Fiche Id') ?></th>
                            <th><?= __('Ligneforfait Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ligneforfait->fichefraisligne as $fichefraisligne) : ?>
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
