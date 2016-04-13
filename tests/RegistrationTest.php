<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_registers_for_an_account()
    {
        $this->visit('/register')
            ->type('Gerhard Theunissen', 'name')
            ->type('gerhardtheunissen10@saiba.org.za', 'email')
            ->type('p@ssw0rd', 'password')
            ->type('p@ssw0rd', 'password_confirmation')
            ->press('Regsiter')
            ->seeInDatabase('users', ['email' => 'gerhardtheunissen10@saiba.org.za'])

            ->seeIsAuthenticated()
            ->click('Gerhard Theunissen')
            ->click('My Account')
            ->click('Update My Profile')
            ->type('pretoria, South Africa', 'location')
            ->click('Update')

            ->click('My Messages')
            ->see('Sorry, You have no messages')

            ->click('My Friends')
            ->see('You currently have no friends available')

            ->click('My Friend Requests')
            ->see('You have no new pending friend requests')

            ->click('Logout')
            ->see('Login')
            ->dontSeeIsAuthenticated();
    }
}
