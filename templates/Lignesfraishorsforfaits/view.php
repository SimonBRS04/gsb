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
        </div>
    </div>
</div>
