<?php

namespace Tests\Browser;

use App\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class AuthenticationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Try to login.
     *
     * @return void
     * @throws Throwable
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'test@laravel.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /**
     * Try to logout.
     * @throws Throwable
     */
    public function testLogout()
    {
        $user = factory(User::class)->create([
            'email' => 'test@laravel.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/home')
                ->click('#navbarDropdown')
                ->waitFor('div.dropdown-menu.show')
                ->click('@logout-link')
                ->assertPathIs('/');
        });
    }
}
