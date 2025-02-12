<?php
declare(strict_types=1);

namespace BeelineOrd\Data\CreativeContent;

/**
 * This class is auto-generated with klkvsk/dto-generator
 * Do not modify it, any changes might be overwritten!
 *
 * @see project://src/Data/dto.schema.php
 *
 * @link https://github.com/klkvsk/dto-generator
 * @link https://packagist.org/klkvsk/dto-generator
 */
class CreativeContentEditModel implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $textData = null,
        public readonly ?string $hash = null
    ) {
        $this->validate([
            'hash' => [
                '#1' => function () {
                    /**
                    * @var $this \BeelineOrd\Data\CreativeContent\CreativeContentEditModel
                    * @psalm-suppress InvalidScope
                    */
                    if ($this->textData !== null && $this->hash === null) {
                        $this->hash = \hash('sha256', $this->textData);
                    }
                },
            ],
        ]);
    }

    protected function validate(array $rules): void
    {
        array_walk($rules, fn(&$vs, $f) => array_walk($vs, fn(&$v) => $v = false === call_user_func($v, $this->{$f})));
        $failedRules = array_filter(array_map(fn($r) => array_keys(array_filter($r)), $rules));
        if ($failedRules) throw new \InvalidArgumentException(json_encode($failedRules));
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        return match($key) {
            "textData", "hash" => [ strval(...) ],
            default => []
        };
    }

    /**
     * @return static
     */
    public static function create(array $data): self
    {
        // import
        $constructorParams = [];
        foreach ($data as $key => $value) {
            foreach (static::importers($key) as $importer) if ($value !== null) {
                $value = call_user_func($importer, $value);
            }
            if (property_exists(static::class, $key)) {
                $constructorParams[$key] = $value;
            }
        }

        // create
        /** @psalm-suppress PossiblyNullArgument */
        return new static(...$constructorParams);
    }

    public function toArray(): array
    {
        $array = [];
        foreach (get_object_vars($this) as $var => $value) {
            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('Y-m-d\TH:i:sP');
            }
            if (is_object($value) && method_exists($value, 'toArray')) {
                $value = $value->toArray();
            }
            if (class_exists(\UnitEnum::class) && $value instanceof \UnitEnum) {
                $value = $value->value;
            }
            if (is_object($value) && method_exists($value, "__toString")) {
                $value = (string)$value;
            }
            $array[$var] = $value;
        }
        return $array;
    }

    public function jsonSerialize(): array
    {
        $array = [];
        foreach (get_object_vars($this) as $var => $value) {
            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('Y-m-d\TH:i:sP');
            }
            if ($value instanceof \JsonSerializable) {
                $value = $value->jsonSerialize();
            }
            if (class_exists(\UnitEnum::class) && $value instanceof \UnitEnum) {
                $value = $value->value;
            }
            if (is_object($value) && method_exists($value, "__toString")) {
                $value = (string)$value;
            }
            $array[$var] = $value;
        }
        return $array;
    }
}
