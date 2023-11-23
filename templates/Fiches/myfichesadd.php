<!-- A la creation d'une fiche -->
    <!-- Inserer aux forfaits chaque forfaits existants -->
    <!-- Les mettre à 0 en qtt -->
    <!-- permettre de modifier les champs en haut -->


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $etats
 */
?>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= $this->Html->link(__('<--- Retour'), ['action' => 'myficheslist'], ['class' => 'side-nav-item']) ?></h4>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches form content">
            <?= $this->Form->create($fich) ?>
            <fieldset>
                <legend><?= __('Ajouter la Fiche') ?></legend>
                <?php
                    echo $this->Form->control('moisannee');
                    echo $this->Form->control('montantvalide');
                    echo $this->Form->control('datemodif');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoyer')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
