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
            <?= $this->Html->link(__('List Lignefraishorsforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishorsforfait form content">
            <?= $this->Form->create($lignefraishorsforfait) ?>
            <fieldset>
                <legend><?= __('Add Lignefraishorsforfait') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('montant');
                    echo $this->Form->control('libelle');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
