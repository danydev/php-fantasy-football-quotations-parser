<?php

use \FFQP\Model\Quotation as Quotation;

/**
 * @codeCoverageIgnore
 */
class QuotationTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          [
            [
              'code' => '101',
              'player' => 'name',
              'team' => 'fidelis',
              'role' => 'C',
              'secondaryRole' => 'T',
              'active' => true,
              'quotation' => '12',
              'magicPoints' => 0,
              'vote' => null,
              'goals' => 0,
              'yellowCards' => 0,
              'redCards' => 0,
              'penalties' => 0,
              'autoGoals' => 0,
              'assists' => 0,
            ],
            [
              'getCode' => '101',
              'getPlayer' => 'name',
              'getTeam' => 'fidelis',
              'getRole' => 'C',
              'getSecondaryRole' => 'T',
              'isActive' => true,
              'getQuotation' => 12,
              'getMagicPoints' => 0.0,
              'getVote' => null,
              'getGoals' => 0,
              'isCautioned' => false,
              'isSentOff' => false,
              'getPenalties' => 0,
              'getAutoGoals' => 0,
              'getAssists' => 0,
            ]
          ],
          [
            [
              'code' => '101',
              'player' => 'name',
              'team' => 'fidelis',
              'role' => 'C',
              'secondaryRole' => 'T',
              'active' => true,
              'quotation' => '12',
              'magicPoints' => '5.5',
              'vote' => '6',
              'goals' => '3',
              'yellowCards' => 1,
              'redCards' => 1,
              'penalties' => '3',
              'autoGoals' => '-2',
              'assists' => '2',
            ],
            [
              'getCode' => '101',
              'getPlayer' => 'name',
              'getTeam' => 'fidelis',
              'getRole' => 'C',
              'getSecondaryRole' => 'T',
              'isActive' => true,
              'getQuotation' => 12,
              'getMagicPoints' => 5.5,
              'getVote' => 6.0,
              'getGoals' => 3,
              'isCautioned' => true,
              'isSentOff' => true,
              'getPenalties' => 3,
              'getAutoGoals' => -2,
              'getAssists' => 2,
            ]
          ]
        ];
    }

    private function _getDataInstance($config)
    {
        $data = $this->getMockBuilder('\FFQP\Row\Data\Data')->getMock();
        foreach ($config as $name => $value) {
            $data->$name = $value;
        }
        return $data;
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetCode($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('string', $quotation->getCode());
        $this->assertSame($result['getCode'], $quotation->getCode());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetPlayer($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('string', $quotation->getPlayer());
        $this->assertSame($result['getPlayer'], $quotation->getPlayer());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetTeam($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('string', $quotation->getTeam());
        $this->assertSame($result['getTeam'], $quotation->getTeam());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetRole($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('string', $quotation->getRole());
        $this->assertSame($result['getRole'], $quotation->getRole());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetSecondaryRole($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('string', $quotation->getSecondaryRole());
        $this->assertSame($result['getSecondaryRole'], $quotation->getSecondaryRole());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsActive($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('boolean', $quotation->isActive());
        $this->assertSame($result['isActive'], $quotation->isActive());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetQuotation($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('integer', $quotation->getQuotation());
        $this->assertSame($result['getQuotation'], $quotation->getQuotation());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetMagicPoints($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        if (is_null($quotation->getMagicPoints())) {
            $this->assertInternalType('null', $quotation->getMagicPoints());
        } else {
            $this->assertInternalType('float', $quotation->getMagicPoints());
        }
        $this->assertSame($result['getMagicPoints'], $quotation->getMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetVote($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        if (is_null($quotation->getVote())) {
            $this->assertInternalType('null', $quotation->getVote());
        } else {
            $this->assertInternalType('float', $quotation->getVote());
        }
        $this->assertSame($result['getVote'], $quotation->getVote());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsWithoutVote($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('bool', $quotation->isWithoutVote());
        $this->assertSame(is_null($result['getVote']), $quotation->isWithoutVote());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetGoals($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('integer', $quotation->getGoals());
        $this->assertSame($result['getGoals'], $quotation->getGoals());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsCautioned($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('boolean', $quotation->isCautioned());
        $this->assertSame($result['isCautioned'], $quotation->isCautioned());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsSentOff($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('boolean', $quotation->isSentOff());
        $this->assertSame($result['isSentOff'], $quotation->isSentOff());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetPenalties($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('integer', $quotation->getPenalties());
        $this->assertSame($result['getPenalties'], $quotation->getPenalties());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAutoGoals($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('integer', $quotation->getAutoGoals());
        $this->assertSame($result['getAutoGoals'], $quotation->getAutoGoals());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAssists($config, $result)
    {
        $quotation = new Quotation($this->_getDataInstance($config));
        $this->assertInternalType('integer', $quotation->getAssists());
        $this->assertSame($result['getAssists'], $quotation->getAssists());
    }
}
