<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fich'), ['action' => 'edit', $fich->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fich'), ['action' => 'delete', $fich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fich'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches view content">
            <h3><?= h($fich->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $fich->has('user') ? $this->Html->link($fich->user->id, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->id, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Moisannee') ?></th>
                    <td><?= h($fich->moisannee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fich->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nbjustificatifs') ?></th>
                    <td><?= $this->Number->format($fich->nbjustificatifs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datemodif') ?></th>
                    <td><?= h($fich->datemodif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montantvalide') ?></th>
                    <td><?= $fich->montantvalide ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
