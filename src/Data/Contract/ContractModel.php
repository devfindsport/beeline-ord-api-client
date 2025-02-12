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
 */
class ContractModel implements \JsonSerializable
{
    public function __construct(
        public readonly ContractType $type,
        public readonly bool $executorIsObligedForRegistration,
        public readonly ContractActionType $actionType,
        public readonly string $subjectType,
        public readonly string $number,
        public readonly \DateTimeInterface $date,
        public readonly ?float $amount = null,
        public readonly ?bool $isVat = null,
        public readonly ?int $parentContractId = null,
        public readonly ?int $customerId = null,
        public readonly ?int $executorId = null,
        public readonly ?bool $isInitialContract = null,
        public readonly ?string $customerInn = null,
        public readonly ?string $customerName = null,
        public readonly ?ContractOrganizationType $customerType = null,
        public readonly ?string $executorInn = null,
        public readonly ?string $executorName = null,
        public readonly ?ContractOrganizationType $executorType = null
    ) {
    }

    protected static function required(): array
    {
        return ['type', 'executorIsObligedForRegistration', 'actionType', 'subjectType', 'number', 'date'];
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        return match($key) {
            "type" => [ fn ($data) => call_user_func([ '\BeelineOrd\Data\Contract\ContractType', 'from' ], $data) ],
            "executorIsObligedForRegistration", "isVat", "isInitialContract" => [ boolval(...) ],
            "actionType" => [
                fn ($data) => call_user_func([ '\BeelineOrd\Data\Contract\ContractActionType', 'from' ], $data)
            ],
            "subjectType", "number", "customerInn", "customerName", "executorInn", "executorName" => [ strval(...) ],
            "date" => [ static fn ($d) => new \DateTimeImmutable($d) ],
            "amount" => [ floatval(...) ],
            "parentContractId", "customerId", "executorId" => [ intval(...) ],
            "customerType", "executorType" => [
                fn ($data) => call_user_func([ '\BeelineOrd\Data\Contract\ContractOrganizationType', 'from' ], $data)
            ],
            default => []
        };
    }

    /**
     * @return static
     */
    public static function create(array $data): self
    {
        // check required
        if ($diff = array_diff(static::required(), array_keys($data))) {
            throw new \InvalidArgumentException("missing keys: " . implode(", ", $diff));
        }

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
