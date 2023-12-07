<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 */
?>
<br/>
<h4>Nom : <?= h($fich->user->last_name)?> </h4>
<h4>Prénom : <?= h($fich->user->first_name) ?> </h4>
<h4>Dernière modification : <?= h($fich->datemodif) ?></h4>
<h4>Fiche du : <?= h($fich->moisannee) ?></h4>

<br/>

<table>
    <h3>Dépense comprise dans le forfait :</h3>    
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('forfait') ?></th>
            <th><?= $this->Paginator->sort('quantite') ?></th>
            <th><?= $this->Paginator->sort('prix') ?></th>
            <th><?= $this->Paginator->sort('total') ?></th>
        </tr>
    </thead>
    <tbody>
        
        <?= $this->Form->create(null) ?>

        <?php $total_f = 0;
        foreach ($fich->lignesforfaits as $lignesforfait): ?>
            <tr>
                <td>
                    <?= h($lignesforfait->forfait->id) ?>
                </td>
                <td>
                    <?= h($lignesforfait->forfait->type) ?>
                </td>
                <td>
                <?php echo $this->Form->input('l_'.$lignesforfait->id, [
                    'defaultValue' => 'Valeur par défaut',
                    'value' => $lignesforfait->quantite, 
                ]); ?>
                </td>
                <td>
                    <?= $this->Number->format($lignesforfait->forfait->prix) ?>
                </td>
                <td>
                    <?= ($lignesforfait->forfait->prix * $lignesforfait->quantite) ?>
                </td>
            </tr>
            <?php $total_f = $total_f + ($lignesforfait->forfait->prix * $lignesforfait->quantite) ?>

        <?php endforeach; ?>
        
    </tbody>
</table>

<br/><?= $this->Form->button(__('Sauvegarder')) ?>
<?= $this->Form->end() ?>
<br/><?= "Total F : ", $total_f?><br/>

<br/>

<table>
    <h3>Autres dépenses :</h3>
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('libelle') ?></th>
            <th><?= $this->Paginator->sort('montant') ?></th>
            <th><?= $this->Paginator->sort('actions') ?></th>
            <th><?= $this->Html->link(__('+'), ['action' => 'myfichesaddhf', $fich->id], ['class' => 'button float-right']) ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_hf = 0;
        foreach ($fich->lignesfraishorsforfaits as $lignesfraishorsforfait): ?>
        <tr>
            <td><?= h($lignesfraishorsforfait->libelle) ?></td>
            <td><?= $this->Number->format($lignesfraishorsforfait->montant) ?></td>
            <th><?= $this->Html->link(__('Edit'), ['action' => 'edithf', $id, $lignesfraishorsforfait->id]) ?>
            <?= $this->Form->postLink(__('Supprimer'), ['action' => 'deletehf', $id, $lignesfraishorsforfait->id], ['confirm' => __("Voulez-vous vraiment supprimer {0}?", $lignesfraishorsforfait->libelle)]) ?></th>
        </tr>
        <?php $total_hf = $total_hf + ($lignesfraishorsforfait->montant) ?>
        <?php endforeach; ?>
    </tbody>
</table>

<br/><?= "Total HF : ", $total_hf?><br/>
<br/><?= "Total Final : ", ($total_hf + $total_f)?><br/>





<!-- DEBUGS -->

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>