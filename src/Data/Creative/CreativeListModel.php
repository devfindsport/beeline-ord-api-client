<?php
declare(strict_types=1);

namespace BeelineOrd\Data\Creative;

/**
 * This class is auto-generated with klkvsk/dto-generator
 * Do not modify it, any changes might be overwritten!
 *
 * @see project://src/Data/dto.schema.php
 *
 * @link https://github.com/klkvsk/dto-generator
 * @link https://packagist.org/klkvsk/dto-generator
 */
class CreativeListModel implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $description,
        public readonly ?string $erid = null,
        public readonly ?\DateTimeInterface $erirExportedOn = null,
        public readonly ?\DateTimeInterface $erirPlannedExportDate = null,
        public readonly ?int $erirExportedStatus = null,
        public readonly ?string $exportError = null,
        public readonly ?int $selfPromotionOrganizationId = null,
        public readonly ?bool $isTelegram = null
    ) {
    }

    protected static function required(): array
    {
        return ['id', 'description'];
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        return match($key) {
            "id", "erirExportedStatus", "selfPromotionOrganizationId" => [ intval(...) ],
            "description", "erid", "exportError" => [ strval(...) ],
            "erirExportedOn", "erirPlannedExportDate" => [ static fn ($d) => new \DateTimeImmutable($d) ],
            "isTelegram" => [ boolval(...) ],
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
