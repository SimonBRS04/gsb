<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignesforfait $lignesforfait
 * @var \Cake\Collection\CollectionInterface|string[] $forfaits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lignesforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesforfaits form content">
            <?= $this->Form->create($lignesforfait) ?>
            <fieldset>
                <legend><?= __('Add Lignesforfait') ?></legend>
                <?php
                    echo $this->Form->control('forfait_id', ['options' => $forfaits]);
                    echo $this->Form->control('quantite');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
