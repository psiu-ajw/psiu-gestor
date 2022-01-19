<?php

namespace Tests\Browser;

use App\Models\Community;
use App\Models\Itens;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ComunidadeTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_list_comunidade_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/communities')
                    ->assertSee('Comunidade');
        });
    }

    public function test_if_create_comunidade_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/community/create')
                    ->type('name', 'Comunidade Teste')
                    ->type('description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis.')
                    ->press('Cadastrar')
                    ->assertPathIs('/communities');
        });
    }

    public function test_if_edit_community_is_working()
    {
        $this->browse(function (Browser $browser) {
            $comunidade = Community::where('name', 'Comunidade Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/community/edit/'.$comunidade->id)
                    ->type('name', 'Edited - Comunidade Teste')
                    ->type('description', 'Edited - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis.')
                    ->press('Salvar')
                    ->assertPathIs('/communities');
        });

    }

    public function test_if_delete_comunidade_is_working()
    {
        $this->browse(function (Browser $browser) {
            $comunidade = Community::where('name', 'Edited - Comunidade Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/community/destroy/'.$comunidade->id)
                    ->assertPathIs('/communities');
        });

    }
}
