<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 */
?>
<!-- DEBUT ATTRIBUTION DES DROITS -->
<?php 
    $identity = $this->getRequest()->getAttribute('identity');
    $identity = $identity ?? [];
    $role = $identity["role"];
    if ($role == "comptable"){ 
        echo($this->Html->link(__('<--- Retour'), ['action' => 'ficheslist'], ['class' => 'side-nav-item']));
    }
    if ($role == "user"){ 
        echo($this->Html->link(__('<--- Retour'), ['action' => 'myficheslist'], ['class' => 'side-nav-item']));
    }
    if ($role == "superuser" ){ 
        echo($this->Html->link(__('<--- Retour'), ['action' => 'index'], ['class' => 'side-nav-item']));
    }
?>
<!-- FIN ATTRIBUTION DES DROITS -->

<br/>
<div style="display:flex; flex-direction:row; gap:100px;">
    <h4>Nom : <?= h($fich->user->last_name)?> </h4>
    <h4>Prénom : <?= h($fich->user->first_name) ?> </h4>
</div>
<h4>Fiche du : <?= h($fich->moisannee) ?></h4>
<h4>Etat actuel de la fiche : <?= h($fich->etat->libelle);?></h4>

<!-- DEBUT ATTRIBUTION DES DROITS POUR LE COMPTABLE UNIQUEMENT -->

<?php 
  if ($role == "comptable" || $role == "superuser" ){ 
    echo $this->Html->Link('Valider la fiche', ['action'=>'modifetats', $fich->id, 3], ['class' => 'button']); 
    echo $this->Html->Link('Cloturer la fiche', ['action'=>'modifetats', $fich->id, 2], ['class' => 'button']); 
    /*?><br/><?php
    echo $this->Html->Link('Mettre la fiche en payement', ['action'=>'modifetats', $fich->id, 4], ['class' => 'button']); 
    echo $this->Html->Link('Rembourser la fiche', ['action'=>'modifetats', $fich->id, 5], ['class' => 'button']);*/
  }
?>
<!-- FIN ATTRIBUTION DES DROITS POUR LE COMPTABLE UNIQUEMENT -->

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
                    <?= h($lignesforfait->quantite) ?>
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
<br/><?= "Total F : ", $total_f?>€<br/><br/>
<table>
    <h3>Autres dépenses :</h3>
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('libelle') ?></th>
            <th><?= $this->Paginator->sort('montant') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_hf = 0;
        foreach ($fich->lignesfraishorsforfaits as $lignesfraishorsforfait): ?>
        <tr>
            <td><?= h($lignesfraishorsforfait->libelle) ?></td>
            <td><?= $this->Number->format($lignesfraishorsforfait->montant) ?></td>
        </tr>
        <?php $total_hf = $total_hf + ($lignesfraishorsforfait->montant) ?>
        <?php endforeach; ?>
    </tbody>
</table>
<br/><?= "Total HF : ", $total_hf?>€<br/>
<br/><h4><?= "Total Final : ", ($total_hf + $total_f)?> €</h4>

<br/>Dernière modification le <?= h($fich->datemodif) ?><br/>
