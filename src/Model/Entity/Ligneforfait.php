<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ligneforfait Entity
 *
 * @property int $id
 * @property int $forfait_id
 * @property int $quantite
 *
 * @property \App\Model\Entity\Forfait $forfait
 * @property \App\Model\Entity\Fichefraisligne[] $fichefraisligne
 */
class Ligneforfait extends Entity
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
        'forfait_id' => true,
        'quantite' => true,
        'forfait' => true,
        'fichefraisligne' => true,
    ];
}
