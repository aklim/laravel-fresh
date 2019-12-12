<?php

namespace Tests\Browser;

use App\Models\Eloquent\User;
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
                ->type('#email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /**
     * @throws Throwable
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('first_name', 'Test First Name')
                ->type('last_name', 'Test Last Name')
                ->type('#email', 'test@laravel.com')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Register')
                ->assertPathIs('/home');

            // Check that created user exists in the DB
            $this->assertDatabaseHas('users', [
                'email' => 'test@laravel.com',
            ]);
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
