<?php
declare(strict_types=1);
namespace Teto\CollectionValidator;

class TypeHint
{
    private static $functions = [];

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
        try {
            $is_valid = self::getValidateFunction($this->type)(...$collection);
        } catch (\TypeError $e) {
            $is_valid = false;
        }

        return $is_valid;
    }

    /**
     * @return \Closure
     */
    public static function getValidateFunction($type)
    {
        if (!isset(self::$functions[$type])) {
            self::$functions[$type] = create_function($type . ' ...$args', 'return true;');
        }

        return self::$functions[$type];
    }
}
