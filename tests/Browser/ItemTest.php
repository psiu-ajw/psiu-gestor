<?php

namespace Tests\Browser;

use App\Models\Itens;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ItemTest extends DuskTestCase
{
    /**
     * @test
     */
    public function test_if_list_item_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/index/item')
                    ->assertSee('Itens Cadastrados');
        });
    }

    public function test_if_create_item_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/create/item')
                    ->type('item_nome', 'Item Teste')
                    ->type('description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis. Donec interdum malesuada felis quis pharetra. Donec mollis orci magna, eu pulvinar odio hendrerit et. Proin efficitur turpis et turpis lobortis, vel ornare purus convallis. Ut id nisl tempus, luctus orci ac, semper arcu. Integer ac dignissim nisl, et placerat augue. Mauris vitae urna quis elit maximus commodo vitae vitae dolor. Sed eget libero eget ipsum ultricies iaculis sit amet tempor tortor. ')
                    ->attach('file', storage_path('app/public/testing/icon_test.png'))
                    ->press('Cadastrar')
                    ->assertPathIs('/index/item');
        });
    }

    public function test_if_edit_item_is_working()
    {
        $this->browse(function (Browser $browser) {
            $item = Itens::where('item_nome', 'Item Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/edit/item/'.$item->id)
                    ->type('item_nome', 'Edited - Item Teste')
                    ->type('description', 'Edited - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut ante eget justo fermentum mollis. Donec interdum malesuada felis quis pharetra. Donec mollis orci magna, eu pulvinar odio hendrerit et. Proin efficitur turpis et turpis lobortis, vel ornare purus convallis. Ut id nisl tempus, luctus orci ac, semper arcu. Integer ac dignissim nisl, et placerat augue. Mauris vitae urna quis elit maximus commodo vitae vitae dolor. Sed eget libero eget ipsum ultricies iaculis sit amet tempor tortor. ')
                    ->press('Editar')
                    ->assertPathIs('/index/item');
        });

    }

    public function test_if_delete_item_is_working()
    {
        $this->browse(function (Browser $browser) {
            $item = Itens::where('item_nome', 'Edited - Item Teste')->first();
            $browser->loginAs(User::find(1))
                    ->visit('/delete/item/'.$item->id)
                    ->assertPathIs('/index/item');
        });

    }
}
