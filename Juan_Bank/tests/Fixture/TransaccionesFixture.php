<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransaccionesFixture
 */
class TransaccionesFixture extends TestFixture
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
                'id_usuario' => 1,
                'cantidad' => 1.5,
                'tipo' => 'Lorem ipsum dolor sit amet',
                'fecha_hora' => '2023-11-28 07:47:52',
            ],
        ];
        parent::init();
    }
}
