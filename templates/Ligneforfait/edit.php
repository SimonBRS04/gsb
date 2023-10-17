<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ligneforfait $ligneforfait
 * @var string[]|\Cake\Collection\CollectionInterface $forfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ligneforfait->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ligneforfait->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ligneforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ligneforfait form content">
            <?= $this->Form->create($ligneforfait) ?>
            <fieldset>
                <legend><?= __('Edit Ligneforfait') ?></legend>
                <?php
                    echo $this->Form->control('forfait_id', ['options' => $forfait]);
                    echo $this->Form->control('quantite');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
