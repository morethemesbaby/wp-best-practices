<?php

class AssetsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $mo_assets = new Mo_Assets(
            array(
                'admin_folder' => 'notempty',
            )
        );

        $this->assertEquals(
            false,
            $mo_assets->javascript_in_footer()
        );
    }
}