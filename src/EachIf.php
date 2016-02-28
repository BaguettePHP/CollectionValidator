<?php
declare(strict_types=1);
namespace Teto\CollectionValidator;

class EachIf
{
    private $type;

    /**
     * @param  string   $type
     * @return TypeHint
     */
    public function __construct($type)
    {
        $this->type = ltrim($type, '\\');
    }

    /**
     * @return bool
     */
    public function validate($collection): bool
    {
        foreach ($collection as $v) {
            if ($this->type === 'int') {
                if (!is_int($v)) {
                    return false;
                }
            } elseif ($this->type === 'string') {
                if (!is_string($v)) {
                    return false;
                }
            } elseif ($this->type === 'object') {
                if (!is_object($v)) {
                    return false;
                }
            } elseif ($this->type === 'float' || $this->type === 'double') {
                if (!is_float($v)) {
                    return false;
                }
            } elseif ($this->type === 'callable') {
                if (!is_callable($v)) {
                    return false;
                }
            } elseif ($this->type === 'object') {
                if (!is_object($v)) {
                    return false;
                }
            } elseif ($this->type === 'resource') {
                if (!is_resource($v)) {
                    return false;
                }
            } elseif ($this->type === 'numeric') {
                if (!is_numeric($v)) {
                    return false;
                }
            } else {
                if ($v instanceof $this->type) {
                    return false;
                }
            }
        }

        return true;
    }
}
