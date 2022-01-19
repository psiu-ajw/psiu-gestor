<?php

namespace Tests\Browser;

use App\Models\Etapa;
use App\Models\Informes;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InformeTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_list_informes_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/informes')
                    ->assertSee('Informes')
                    ;
        });
    }

    public function test_if_create_informe_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/registra_informes')
                    ->select('projeto', 1)
                    ->type('txt_informe', 'Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis. Vivamus id mollis nisl. Nullam nec egestas magna. Suspendisse faucibus, leo vitae lobortis ornare, neque arcu maximus urna, ut efficitur massa nulla vitae nisl. Nunc sollicitudin ultricies dolor. ')
                    ->press('Cadastrar')
                    ->assertPathIs('/informes')
                    ;
        });
    }

    public function test_if_edit_informe_is_working()
    {
        $this->browse(function (Browser $browser) {
            $informe = Informes::where('txt_informe', 'Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis')
            ->orWhere('txt_informe', 'like', '%' . 'Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis' . '%')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/informes/edit/'.$informe->id)
                    ->type('txt_informe', 'Edited - Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis. Vivamus id mollis nisl. Nullam nec egestas magna. Suspendisse faucibus, leo vitae lobortis ornare, neque arcu maximus urna, ut efficitur massa nulla vitae nisl. Nunc sollicitudin ultricies dolor. ')
                    ->press('Salvar')
                    ->assertPathIs('/informes');
        });

    }

    public function test_if_delete_informe_is_working()
    {
        $this->browse(function (Browser $browser) {
            $informe = Informes::where('txt_informe', 'Edited - Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis.')
            ->orWhere('txt_informe', 'like', '%' . 'Edited - Maecenas rhoncus enim sit amet elit vulputate, ac luctus est lobortis.' . '%')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/informes/destroy/'.$informe->id)
                    ->assertPathIs('/informes');
        });

    }
}