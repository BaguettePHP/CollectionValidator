<?php
namespace Teto\CollectionValidator;

class StringBench extends \Athletic\AthleticEvent
{
    use benchmark;

    public function setUp()
    {
        $this->setupValidator('string', 'VAL');
    }
}
