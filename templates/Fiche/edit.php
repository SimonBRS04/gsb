<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fiche $fiche
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $etat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fiche->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fiche->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fiche'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiche form content">
            <?= $this->Form->create($fiche) ?>
            <fieldset>
                <legend><?= __('Edit Fiche') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('etat_id', ['options' => $etat]);
                    echo $this->Form->control('moisannee');
                    echo $this->Form->control('nbjustificatifs');
                    echo $this->Form->control('montantvalide');
                    echo $this->Form->control('datemodif');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
