<?php
declare(strict_types=1);

namespace BeelineOrd\Data\Invoice;

/**
 * This class is auto-generated with klkvsk/dto-generator
 * Do not modify it, any changes might be overwritten!
 *
 * @see project://src/Data/dto.schema.php
 *
 * @link https://github.com/klkvsk/dto-generator
 * @link https://packagist.org/klkvsk/dto-generator
 */
class InvoiceViewModel extends InvoiceCreateModel implements \JsonSerializable
{
    protected ?\DateTimeInterface $erirExportedOn;
    protected ?\DateTimeInterface $erirPlannedExportDate;

    public function __construct(
        \DateTimeInterface $date,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        float $amount,
        InvoiceOrganizationRole $customerRole,
        InvoiceOrganizationRole $executorRole,
        bool $isReadyForErir,
        int $contractId,
        InvoiceType $type,
        ?string $number = null,
        ?bool $isVat = null,
        ?\DateTimeInterface $erirExportedOn = null,
        ?\DateTimeInterface $erirPlannedExportDate = null
    ) {
        parent::__construct(
            $date,
            $startDate,
            $endDate,
            $amount,
            $customerRole,
            $executorRole,
            $isReadyForErir,
            $contractId,
            $type,
            $number,
            $isVat
        );
        $this->erirExportedOn = $erirExportedOn;
        $this->erirPlannedExportDate = $erirPlannedExportDate;
    }

    public function getErirExportedOn(): ?\DateTimeInterface
    {
        return $this->erirExportedOn;
    }

    public function getErirPlannedExportDate(): ?\DateTimeInterface
    {
        return $this->erirPlannedExportDate;
    }

    protected static function defaults(): array
    {
        return array_merge(
            method_exists(parent::class, "defaults") ? parent::defaults() : [],
            []
        );
    }

    protected static function required(): array
    {
        return array_merge(
            method_exists(parent::class, "required") ? parent::required() : [],
            []
        );
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        switch ($key) {
            case "erirExportedOn":
            case "erirPlannedExportDate":
                yield static fn ($d) => new \DateTimeImmutable($d);
                break;

            default:
                if (method_exists(parent::class, "importers")) {
                    yield from parent::importers($key);
                };
        };
    }

    /**
     * @return static
     */
    public static function create(array $data): self
    {
        // defaults
        $data += static::defaults();

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
        return new static(
            $constructorParams["date"],
            $constructorParams["startDate"],
            $constructorParams["endDate"],
            $constructorParams["amount"],
            $constructorParams["customerRole"],
            $constructorParams["executorRole"],
            $constructorParams["isReadyForErir"],
            $constructorParams["contractId"],
            $constructorParams["type"],
            $constructorParams["number"] ?? null,
            $constructorParams["isVat"] ?? null,
            $constructorParams["erirExportedOn"] ?? null,
            $constructorParams["erirPlannedExportDate"] ?? null
        );
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
