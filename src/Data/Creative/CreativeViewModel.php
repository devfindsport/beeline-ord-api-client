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
class CreativeViewModel extends CreativeListModel implements \JsonSerializable
{
    /**
     * @param array<CreativeUrl> $urls
     * @param array<KktuCode> $kktuCode
     */
    public function __construct(
        int $id,
        public readonly string $description,
        public readonly CreativeType $type,
        public readonly CreativeForm $form,
        public readonly bool $isSocial,
        public readonly bool $isNative,
        public readonly int $initialContractId,
        ?string $erid = null,
        ?\DateTimeInterface $erirExportedOn = null,
        ?\DateTimeInterface $erirPlannedExportDate = null,
        ?int $erirExportedStatus = null,
        ?string $exportError = null,
        ?int $selfPromotionOrganizationId = null,
        ?bool $isTelegram = null,
        public readonly array $urls = [],
        public readonly array $kktuCode = [],
        public readonly ?string $targetAudienceDescription = null,
        public readonly ?int $organizationId = null
    ) {
        parent::__construct(
            $id,
            $description,
            $erid,
            $erirExportedOn,
            $erirPlannedExportDate,
            $erirExportedStatus,
            $exportError,
            $selfPromotionOrganizationId,
            $isTelegram
        );
        $urls && (function(CreativeUrl ...$_) {})( ...$urls);
        $kktuCode && (function(KktuCode ...$_) {})( ...$kktuCode);
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
            ['type', 'form', 'description', 'isSocial', 'isNative', 'urls', 'kktuCode', 'initialContractId']
        );
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        return match($key) {
            "type" => [ fn ($data) => call_user_func([ '\BeelineOrd\Data\Creative\CreativeType', 'from' ], $data) ],
            "form" => [ fn ($data) => call_user_func([ '\BeelineOrd\Data\Creative\CreativeForm', 'from' ], $data) ],
            "description", "targetAudienceDescription" => [ strval(...) ],
            "isSocial", "isNative" => [ boolval(...) ],
            "urls" => [
                fn ($array) => array_map(
                    fn ($data) => call_user_func([ '\BeelineOrd\Data\Creative\CreativeUrl', 'create' ], $data),
                    (array)$array
                )
            ],
            "kktuCode" => [
                fn ($array) => array_map(
                    fn ($data) => call_user_func([ '\BeelineOrd\Data\Creative\KktuCode', 'create' ], $data),
                    (array)$array
                )
            ],
            "initialContractId", "organizationId" => [ intval(...) ],
            default => method_exists(parent::class, "importers") ? parent::importers($key) : []
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
