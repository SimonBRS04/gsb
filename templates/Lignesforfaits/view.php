<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignesforfait $lignesforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignesforfait'), ['action' => 'edit', $lignesforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignesforfait'), ['action' => 'delete', $lignesforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignesforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignesforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesforfaits view content">
            <h3><?= h($lignesforfait->forfait->type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Forfait') ?></th>
                    <td><?= $lignesforfait->has('forfait') ? $this->Html->link($lignesforfait->forfait->type, ['controller' => 'Forfaits', 'action' => 'view', $lignesforfait->forfait->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignesforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantite') ?></th>
                    <td><?= $this->Number->format($lignesforfait->quantite) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
