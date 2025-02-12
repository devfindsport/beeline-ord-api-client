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
 *
 * ---
 *
 * Readonly properties:
 * @property-read string $name
 * @property-read string $value
 *
 * Cases:
 * @method static CreativeForm TEXT_GRAPHIC_BLOCK()
 * @method static CreativeForm TEXT_BLOCK()
 * @method static CreativeForm VIDEO()
 * @method static CreativeForm LIVE_VIDEO()
 * @method static CreativeForm LIVE_AUDIO()
 * @method static CreativeForm BANNER()
 * @method static CreativeForm AUDIO_RECORD()
 * @method static CreativeForm TEXT_VIDEO_BLOCK()
 * @method static CreativeForm TEXT_GRAPHIC_VIDEO_BLOCK()
 * @method static CreativeForm TEXT_AUDIO_BLOCK()
 * @method static CreativeForm TEXT_GRAPHIC_AUDIO_BLOCK()
 * @method static CreativeForm TEXT_AUDIO_VIDEO_BLOCK()
 * @method static CreativeForm TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK()
 * @method static CreativeForm BANNER_HTML5()
 */
final class CreativeForm implements \JsonSerializable
{
    private static array $instances = [];

    private static array $cases = [
        'TEXT_GRAPHIC_BLOCK' => 'TextGraphicBlock',
        'TEXT_BLOCK' => 'TextBlock',
        'VIDEO' => 'Video',
        'LIVE_VIDEO' => 'LiveVideo',
        'LIVE_AUDIO' => 'LiveAudio',
        'BANNER' => 'Banner',
        'AUDIO_RECORD' => 'AudioRecord',
        'TEXT_VIDEO_BLOCK' => 'TextVideoBlock',
        'TEXT_GRAPHIC_VIDEO_BLOCK' => 'TextGraphicVideoBlock',
        'TEXT_AUDIO_BLOCK' => 'TextAudioBlock',
        'TEXT_GRAPHIC_AUDIO_BLOCK' => 'TextGraphicAudioBlock',
        'TEXT_AUDIO_VIDEO_BLOCK' => 'TextAudioVideoBlock',
        'TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK' => 'TextGraphicAudioVideoBlock',
        'BANNER_HTML5' => 'BannerHtml5',
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
        return [
            self::TEXT_GRAPHIC_BLOCK(),
            self::TEXT_BLOCK(),
            self::VIDEO(),
            self::LIVE_VIDEO(),
            self::LIVE_AUDIO(),
            self::BANNER(),
            self::AUDIO_RECORD(),
            self::TEXT_VIDEO_BLOCK(),
            self::TEXT_GRAPHIC_VIDEO_BLOCK(),
            self::TEXT_AUDIO_BLOCK(),
            self::TEXT_GRAPHIC_AUDIO_BLOCK(),
            self::TEXT_AUDIO_VIDEO_BLOCK(),
            self::TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK(),
            self::BANNER_HTML5(),
        ];
    }

    public function __get($name)
    {
        switch ($name) {
            case "name":
                return $this->name;
            case "value":
                return $this->value;
            default:
                trigger_error("Undefined property: CreativeForm::$name", E_USER_WARNING);
                return null;
        }
    }

    public static function __callStatic($name, $args)
    {
        $instance = self::$instances[$name] ?? null;
        if ($instance === null) {
            if (!array_key_exists($name, self::$cases)) {
                throw new \ValueError("unknown case 'CreativeForm::$name'");
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
