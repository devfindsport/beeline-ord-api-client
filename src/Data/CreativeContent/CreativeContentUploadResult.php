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
class CreativeContentUploadResult implements \JsonSerializable
{
    protected ?string $erid;
    protected ?int $filesCount;
    protected ?int $uploadedFilesCount;

    /** @var ?array<CreativeContentUploadResultFileError> $fileErrors */
    protected ?array $fileErrors;
    /** @var ?array<int> $uploadedIds */
    protected ?array $uploadedIds = [];

    public function __construct(
        ?string $erid = null,
        ?int $filesCount = null,
        ?int $uploadedFilesCount = null,
        ?array $fileErrors = [],
        ?array $uploadedIds = []
    ) {
        $this->erid = $erid;
        $this->filesCount = $filesCount;
        $this->uploadedFilesCount = $uploadedFilesCount;
        $fileErrors && (function(CreativeContentUploadResultFileError ...$_) {})( ...$fileErrors);
        $this->fileErrors = $fileErrors;
        $uploadedIds && (function(int ...$_) {})( ...$uploadedIds);
    }

    public function getErid(): ?string
    {
        return $this->erid;
    }

    public function getFilesCount(): ?int
    {
        return $this->filesCount;
    }

    public function getUploadedFilesCount(): ?int
    {
        return $this->uploadedFilesCount;
    }

    /**
     * @return ?array<CreativeContentUploadResultFileError>
     */
    public function getFileErrors(): ?array
    {
        return $this->fileErrors;
    }

    /**
     * @return ?array<int>
     */
    public function getUploadedIds(): ?array
    {
        return $this->uploadedIds;
    }

    /**
     * @return iterable<int,\Closure>
     */
    protected static function importers(string $key): iterable
    {
        switch ($key) {
            case "erid":
                yield \Closure::fromCallable('strval');
                break;

            case "uploadedIds":
                yield fn ($array) => array_map(
                    \Closure::fromCallable('intval'),
                    (array)$array
                );
                break;

            case "filesCount":
            case "uploadedFilesCount":
                yield \Closure::fromCallable('intval');
                break;

            case "fileErrors":
                yield fn ($array) => array_map(
                    fn ($data) => call_user_func([ '\BeelineOrd\Data\CreativeContent\CreativeContentUploadResultFileError', 'create' ], $data),
                    (array)$array
                );
                break;
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
        return new static(
            $constructorParams["erid"] ?? null,
            $constructorParams["filesCount"] ?? null,
            $constructorParams["uploadedFilesCount"] ?? null,
            $constructorParams["fileErrors"] ?? null,
            $constructorParams["uploadedIds"] ?? null
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
