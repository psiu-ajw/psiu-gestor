<?php

namespace Tests\Browser;

use App\Models\Etapa;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EtapaTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_list_etapa_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/etapas')
                    ->assertSee('Andamento')
                    ;
        });
    }

    public function test_if_create_etapa_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('etapa/create')
                    ->select('id_projeto', 1)
                    ->type('titulo', 'Etapa Teste')
                    ->type('descricao', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis.')
                    ->press('Cadastrar')
                    ->assertPathIs('/etapas')
                    ;
        });
    }

    public function test_if_edit_etapa_is_working()
    {
        $this->browse(function (Browser $browser) {
            $etapa = Etapa::where('titulo', 'Etapa Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/etapa/edit/'.$etapa->id)
                    ->type('titulo', 'Edited - Etapa Teste')
                    ->type('descricao', 'Edited - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis.')
                    ->type('andamento', 50)
                    ->press('Salvar')
                    ->assertPathIs('/etapas');
        });

    }

    public function test_if_delete_etapa_is_working()
    {
        $this->browse(function (Browser $browser) {
            $etapa = Etapa::where('titulo', 'Edited - Etapa Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/etapa/destroy/'.$etapa->id)
                    ->assertPathIs('/etapas');
        });

    }
}