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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $forfait->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $forfait->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Forfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forfaits form content">
            <?= $this->Form->create($forfait) ?>
            <fieldset>
                <legend><?= __('Edit Forfait') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('prix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
