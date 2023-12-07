<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lignesfraishorsforfait Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $montant
 * @property string $libelle
 *
 * @property \App\Model\Entity\Fich[] $fiches
 */
class Lignesfraishorsforfait extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'date' => true,
        'montant' => true,
        'libelle' => true,
        'fiches' => true,
    ];
}
