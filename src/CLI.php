<?php
namespace DQNEO\FizzBuzzEnterpriseEdition;

use DQNEO\FizzBuzzEnterpriseEdition\FizzBuzzApplication;
use DQNEO\FizzBuzzEnterpriseEdition\Writer\StdoutWriter;
use DQNEO\FizzBuzzEnterpriseEdition\RangeIteratorFactory;
use DQNEO\FizzBuzzEnterpriseEdition\DataType\Integer;

class CLI
{
    /**
     * CLI entry point
     *
     * @param integer $argc num of arguments
     * @param array   $argv list of arguments
     * @return integer exit_status
     */
    public static function main($argc, $argv)
    {
        $writer = new StdoutWriter;
        $fizzbuzz = new FizzBuzzApplication(new Integer(3), new Integer(5), $writer);

        if ($argc <= 1) {
            echo("invalid argument\n");
            return 1;
        }

        $range = RangeIteratorFactory::factory(1, $argv[1]);
        $fizzbuzz->run($range);

        return 0;
    }
}
