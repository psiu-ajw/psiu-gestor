<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Entrar');
        });
    }

    public function test_if_login_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'teste@teste')
                    ->type('password', 'teste123')
                    ->press('Entrar')
                    ->assertPathIs('/home');
        });
    }

    public function test_if_list_users_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
                    ->assertSee('Usuário');
        });
    }

    public function test_if_register_user_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/register')
                    ->type('name', 'teste')
                    ->type('email', 'teste5@teste')
                    ->type('password', 'teste123')
                    ->type('password_confirmation', 'teste123')
                    ->press('Cadastrar')
                    ->assertPathIs('/users');
        });
    }

    public function test_if_edit_user_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/user/edit/'.User::where('name', 'teste')->first()->id)
                    ->type('name', 'Edited - teste')
                    ->press('Salvar')
                    ->assertPathIs('/users');
        });

    }

    public function test_if_delete_user_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/user/destroy/'.User::where('name', 'Edited - teste')->first()->id)
                    ->assertPathIs('/users');
        });

    }
}
