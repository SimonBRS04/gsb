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
            <?= $this->Html->link(__('List Forfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forfait view content">
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
                <h4><?= __('Related Ligneforfait') ?></h4>
                <?php if (!empty($forfait->ligneforfait)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Forfait Id') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($forfait->ligneforfait as $ligneforfait) : ?>
                        <tr>
                            <td><?= h($ligneforfait->id) ?></td>
                            <td><?= h($ligneforfait->forfait_id) ?></td>
                            <td><?= h($ligneforfait->quantite) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ligneforfait', 'action' => 'view', $ligneforfait->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ligneforfait', 'action' => 'edit', $ligneforfait->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ligneforfait', 'action' => 'delete', $ligneforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ligneforfait->id)]) ?>
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
