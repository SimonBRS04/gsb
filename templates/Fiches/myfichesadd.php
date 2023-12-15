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
                    echo $this->Form->control('moisannee', ['placeholder' => 'exemple : 012023']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoyer')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>