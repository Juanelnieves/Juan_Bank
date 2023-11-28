<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mensaje Entity
 *
 * @property int $id
 * @property int|null $remitente
 * @property int|null $destinatario
 * @property string|null $mensaje
 * @property \Cake\I18n\DateTime|null $fecha_hora
 */
class Mensaje extends Entity
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
        'remitente' => true,
        'destinatario' => true,
        'mensaje' => true,
        'fecha_hora' => true,
    ];
}
