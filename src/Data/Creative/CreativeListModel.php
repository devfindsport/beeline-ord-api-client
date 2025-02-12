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
    protected int $id;
    protected string $description;
    protected ?string $erid;
    protected ?\DateTimeInterface $erirExportedOn;
    protected ?\DateTimeInterface $erirPlannedExportDate;
    protected ?int $erirExportedStatus;
    protected ?string $exportError;
    protected ?int $selfPromotionOrganizationId;
    protected ?bool $isTelegram;

    public function __construct(
        int $id,
        string $description,
        ?string $erid = null,
        ?\DateTimeInterface $erirExportedOn = null,
        ?\DateTimeInterface $erirPlannedExportDate = null,
        ?int $erirExportedStatus = null,
        ?string $exportError = null,
        ?int $selfPromotionOrganizationId = null,
        ?bool $isTelegram = null
    ) {
        $this->id = $id;
        $this->description = $description;
        $this->erid = $erid;
        $this->erirExportedOn = $erirExportedOn;
        $this->erirPlannedExportDate = $erirPlannedExportDate;
        $this->erirExportedStatus = $erirExportedStatus;
        $this->exportError = $exportError;
        $this->selfPromotionOrganizationId = $selfPromotionOrganizationId;
        $this->isTelegram = $isTelegram;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getErid(): ?string
    {
        return $this->erid;
    }

    public function getErirExportedOn(): ?\DateTimeInterface
    {
        return $this->erirExportedOn;
    }

    public function getErirPlannedExportDate(): ?\DateTimeInterface
    {
        return $this->erirPlannedExportDate;
    }

    public function getErirExportedStatus(): ?int
    {
        return $this->erirExportedStatus;
    }

    public function getExportError(): ?string
    {
        return $this->exportError;
    }

    public function getSelfPromotionOrganizationId(): ?int
    {
        return $this->selfPromotionOrganizationId;
    }

    public function getIsTelegram(): ?bool
    {
        return $this->isTelegram;
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
        switch ($key) {
            case "id":
            case "erirExportedStatus":
            case "selfPromotionOrganizationId":
                yield \Closure::fromCallable('intval');
                break;

            case "description":
            case "erid":
            case "exportError":
                yield \Closure::fromCallable('strval');
                break;

            case "erirExportedOn":
            case "erirPlannedExportDate":
                yield static fn ($d) => new \DateTimeImmutable($d);
                break;

            case "isTelegram":
                yield \Closure::fromCallable('boolval');
                break;
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
        return new static(
            $constructorParams["id"],
            $constructorParams["description"],
            $constructorParams["erid"] ?? null,
            $constructorParams["erirExportedOn"] ?? null,
            $constructorParams["erirPlannedExportDate"] ?? null,
            $constructorParams["erirExportedStatus"] ?? null,
            $constructorParams["exportError"] ?? null,
            $constructorParams["selfPromotionOrganizationId"] ?? null,
            $constructorParams["isTelegram"] ?? null
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
