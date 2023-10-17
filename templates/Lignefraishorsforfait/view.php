<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishorsforfait $lignefraishorsforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignefraishorsforfait'), ['action' => 'edit', $lignefraishorsforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignefraishorsforfait'), ['action' => 'delete', $lignefraishorsforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishorsforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignefraishorsforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignefraishorsforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishorsforfait view content">
            <h3><?= h($lignefraishorsforfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Libelle') ?></th>
                    <td><?= h($lignefraishorsforfait->libelle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignefraishorsforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= $this->Number->format($lignefraishorsforfait->montant) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($lignefraishorsforfait->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
