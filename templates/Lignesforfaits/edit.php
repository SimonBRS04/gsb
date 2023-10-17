<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignesforfait $lignesforfait
 * @var string[]|\Cake\Collection\CollectionInterface $forfaits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lignesforfait->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lignesforfait->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lignesforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesforfaits form content">
            <?= $this->Form->create($lignesforfait) ?>
            <fieldset>
                <legend><?= __('Edit Lignesforfait') ?></legend>
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
