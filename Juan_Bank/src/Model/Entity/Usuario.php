<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $dni
 * @property string $email
 * @property \Cake\I18n\Date|null $fecha_nacimiento
 * @property string|null $foto
 * @property string|null $direccion
 * @property string|null $codigo_postal
 * @property string|null $ciudad
 * @property string|null $provincia
 * @property string $pais
 * @property string $iban
 * @property bool|null $es_admin
 * @property string|null $saldo
 * @property string|null $moneda_preferida
 * @property string|null $saldo_hexadecimal
 */
class Usuario extends Entity
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
        'nombre' => true,
        'apellido' => true,
        'dni' => true,
        'email' => true,
        'fecha_nacimiento' => true,
        'foto' => true,
        'direccion' => true,
        'codigo_postal' => true,
        'ciudad' => true,
        'provincia' => true,
        'pais' => true,
        'iban' => true,
        'es_admin' => true,
        'saldo' => true,
        'moneda_preferida' => true,
        'saldo_hexadecimal' => true,
    ];
}
