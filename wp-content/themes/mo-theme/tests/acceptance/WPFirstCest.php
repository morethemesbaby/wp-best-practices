<?php


class WPFirstCest {
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeInCurrentUrl('/');
        $I->seeElement('#header-menu-hamburger');
        $I->dontSee('This is the header menu.');
    }
}
