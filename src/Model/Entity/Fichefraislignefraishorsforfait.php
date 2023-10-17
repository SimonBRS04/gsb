<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fichefraislignefraishorsforfait Entity
 *
 * @property int $lignefraishf_id
 * @property int $fichefrais_id
 *
 * @property \App\Model\Entity\Lignefraishorsforfait $lignefraishorsforfait
 * @property \App\Model\Entity\Fiche $fiche
 */
class Fichefraislignefraishorsforfait extends Entity
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
        'lignefraishf_id' => true,
        'fichefrais_id' => true,
        'lignefraishorsforfait' => true,
        'fiche' => true,
    ];
}
