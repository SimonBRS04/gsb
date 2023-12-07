<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignesfraishorsforfait $lignesfraishorsforfait
 * @var \Cake\Collection\CollectionInterface|string[] $fiches
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lignesfraishorsforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesfraishorsforfaits form content">
            <?= $this->Form->create($lignesfraishorsforfait) ?>
            <fieldset>
                <legend><?= __('Add Lignesfraishorsforfait') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('montant');
                    echo $this->Form->control('libelle');
                    echo $this->Form->control('fiches._ids', ['options' => $fiches]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
