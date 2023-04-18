<?php
declare(strict_types=1);

namespace BeelineOrd\Data\Contract;

/**
 * This class is auto-generated with klkvsk/dto-generator
 * Do not modify it, any changes might be overwritten!
 *
 * @see project://src/Data/dto.schema.php
 *
 * @link https://github.com/klkvsk/dto-generator
 * @link https://packagist.org/klkvsk/dto-generator
 *
 * ---
 *
 * Readonly properties:
 * @property-read string $name
 * @property-read string $value
 *
 * Cases:
 * @method static ContractActionType OTHER()
 * @method static ContractActionType DISTRIBUTION()
 * @method static ContractActionType CONCLUDE()
 * @method static ContractActionType COMMERCIAL()
 * @method static ContractActionType NONE()
 */
final class ContractActionType implements \JsonSerializable
{
    private static array $instances = [];

    private static array $cases = [
        'OTHER' => 'Other',
        'DISTRIBUTION' => 'Distribution',
        'CONCLUDE' => 'Conclude',
        'COMMERCIAL' => 'Commercial',
        'NONE' => 'None',
    ];

    private string $name;
    private string $value;

    private function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return static[]
     */
    public static function cases(): array
    {
        return [self::OTHER(), self::DISTRIBUTION(), self::CONCLUDE(), self::COMMERCIAL(), self::NONE()];
    }

    public function __get($name)
    {
        switch ($name) {
            case "name":
                return $this->name;
            case "value":
                return $this->value;
            default:
                trigger_error("Undefined property: ContractActionType::$name", E_USER_WARNING);
                return null;
        }
    }

    public static function __callStatic($name, $args)
    {
        $instance = self::$instances[$name] ?? null;
        if ($instance === null) {
            if (!array_key_exists($name, self::$cases)) {
                throw new \ValueError("unknown case 'ContractActionType::$name'");
            }
            self::$instances[$name] = $instance = new self($name, self::$cases[$name]);
        }
        return $instance;
    }

    public static function tryFrom(string $value): ?self
    {
        $case = array_search($value, self::$cases, true);
        return $case ? self::$case() : null;
    }

    public static function from(string $value): self
    {
        $case = self::tryFrom($value);
        if (!$case) {
            throw new \ValueError(sprintf(
                "%s is not a valid backing value for enum %s",
                var_export($value, true), self::class
            ));
        }
        return $case;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
