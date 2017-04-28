<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit(route('admin.login.get'))
            ->type('qq@ya.ru', 'email')
            ->type('111111', 'password')
            ->press('login')
            ->see('Admin Dashboard')
            ->onPage('/admin/dashboard');
    }
}