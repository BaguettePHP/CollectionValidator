<?php
declare(strict_types=1);
namespace Teto\CollectionValidator;

class EachCallable
{
    private static $functions = [
        'int'      => 'is_int',
        'string'   => 'is_string',
        'object'   => 'is_object',
        'float'    => 'is_float',
        'double'   => 'is_float',
        'callable' => 'is_callable',
        'numeric'  => 'is_numeric',
    ];

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
        $checker = self::getValidateFunction($this->type);

        foreach ($collection as $c) {
            if (!$checker($c)) {
                return false;
            }
        }

        return true;
    }

    /**
     * return \Closure
     */
    public static function getValidateFunction($type)
    {
        if (!isset(self::$functions[$type])) {
            self::$functions[$type] = function ($v) use ($type) {
                return $v instanceof $type;
            };
        }

        return self::$functions[$type];
    }
}
