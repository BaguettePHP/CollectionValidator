<?php
namespace Teto\CollectionValidator;

interface ValidatorInterface
{
    /**
     * @param  string   $type
     * @return TypeHint
     */
    public function __construct(string $type);

    /**
     * @return bool
     */
    public function validate($collection): bool;
}
