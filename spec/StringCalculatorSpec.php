<?php namespace spec;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_translates_an_empty_string_into_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    function it_finds_the_sum_of_one_number()
    {
        $this->add('6')->shouldEqual(6);
    }

    function it_finds_the_sum_of_two_numbers()
    {
        $this->add('1,2')->shouldEqual(3);
    }

    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $this->add('1,2,3,4,5')->shouldEqual(15);
    }
    
    function it_disallows_negative_numbers()
    {
        $this->shouldThrow(new InvalidArgumentException('Invalid number provided: -2'))->duringAdd('3,-2');
    }

    function it_ignores_any_numbers_greater_than_one_thousand()
    {
        $this->add('1,2000,3000,4')->shouldEqual(5);
    }

    function it_allows_for_new_line_delimiters()
    {
        $this->add('2,2\n2')->shouldEqual(6);
    }
}
