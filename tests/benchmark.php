<?php
namespace Teto\CollectionValidator;

trait benchmark
{
    private $callable;
    private $if;
    private $typehint;
    private $data10;
    private $data1000;

    public function setupValidator($type, $data)
    {
        $this->data10   = array_fill(0, 10, $data);
        $this->data1000 = array_fill(0, 1000, $data);

        $this->callable = new EachCallable($type);
        $this->if       = new EachIf($type);
        $this->typehint = new TypeHint($type);
    }

    /**
     * @iterations 1000
     */
    public function foreach_callable_10()
    {
        $this->callable->validate($this->data10);
    }

    /**
     * @iterations 1000
     */
    public function foreach_if_10()
    {
        $this->if->validate($this->data10);
    }

    /**
     * @iterations 1000
     */
    public function typehint_10()
    {
        $this->typehint->validate($this->data10);
    }

    /**
     * @iterations 100
     */
    public function foreach_callable_1000()
    {
        $this->callable->validate($this->data1000);
    }

    /**
     * @iterations 100
     */
    public function foreach_if_1000()
    {
        $this->if->validate($this->data1000);
    }

    /**
     * @iterations 100
     */
    public function typehint_1000()
    {
        $this->typehint->validate($this->data1000);
    }
}
