<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'apellido' => 'Lorem ipsum dolor sit amet',
                'dni' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'fecha_nacimiento' => '2023-11-28',
                'foto' => 'Lorem ipsum dolor sit amet',
                'direccion' => 'Lorem ipsum dolor sit amet',
                'codigo_postal' => 'Lorem ip',
                'ciudad' => 'Lorem ipsum dolor sit amet',
                'provincia' => 'Lorem ipsum dolor sit amet',
                'pais' => 'Lorem ipsum dolor sit amet',
                'iban' => 'Lorem ipsum dolor sit amet',
                'es_admin' => 1,
                'saldo' => 1.5,
                'moneda_preferida' => 'Lorem ipsum dolor sit amet',
                'saldo_hexadecimal' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
