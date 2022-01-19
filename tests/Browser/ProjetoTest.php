<?php

namespace Tests\Browser;

use App\Models\Etapa;
use App\Models\Projeto;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjetoTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_list_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/index/list')
                    ->assertSee('Projetos Cadastrados')
                    ;
        });
    }

    public function test_if_create_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('create')
                    ->type('nome_projeto', 'Projeto Teste')
                    ->select('community_id', 1)
                    ->type('pontuacao', 100)
                    ->press('Continuar')
                    ->assertPathIs('/store/project')
                    ;
        });
    }

    public function test_if_show_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $projeto = Projeto::where('nome_projeto', 'Projeto Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/projeto/show/'.$projeto->id)
                    ->assertSee($projeto->nome_projeto);
        });

    }
    
    public function test_if_add_item_to_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $projeto = Projeto::where('nome_projeto', 'Projeto Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/itens/projeto/create/'.$projeto->id)
                    ->select('item_id', 1)
                    ->type('pontuacao', 30)
                    ->press('Continuar')
                    ->assertPathIs('/projeto/show/'.$projeto->id);
                    ;
                    
        });

    }

    public function test_if_edit_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $projeto = Projeto::where('nome_projeto', 'Projeto Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/edit/projeto/'.$projeto->id)
                    ->type('nome_projeto', 'Edited - Projeto Teste')
                    ->select('community_id', 2)
                    ->type('pontuacao', 150)
                    ->press('Salvar')
                    ->assertPathIs('/index/list');
        });

    }

    public function test_if_delete_projeto_is_working()
    {
        $this->browse(function (Browser $browser) {
            $projeto = Projeto::where('nome_projeto', 'Edited - Projeto Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/delete/projeto/'.$projeto->id)
                    ->assertPathIs('/index/list');
        });

    }
}