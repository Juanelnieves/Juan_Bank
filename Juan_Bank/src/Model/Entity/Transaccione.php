<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaccione Entity
 *
 * @property int $id
 * @property int|null $id_usuario
 * @property string|null $cantidad
 * @property string|null $tipo
 * @property \Cake\I18n\DateTime|null $fecha_hora
 */
class Transaccione extends Entity
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
    protected array $_accessible = [
        'id_usuario' => true,
        'cantidad' => true,
        'tipo' => true,
        'fecha_hora' => true,
    ];
}
