<?php
namespace Teto\CollectionValidator;

class StringFailBench extends \Athletic\AthleticEvent
{
    use benchmark;

    public function setUp()
    {
        $this->setupValidator('string', null);
    }
}
