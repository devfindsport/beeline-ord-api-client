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
enum CreativeForm: string
{
    case TEXT_GRAPHIC_BLOCK = 'TextGraphicBlock';
    case TEXT_BLOCK = 'TextBlock';
    case VIDEO = 'Video';
    case LIVE_VIDEO = 'LiveVideo';
    case LIVE_AUDIO = 'LiveAudio';
    case BANNER = 'Banner';
    case AUDIO_RECORD = 'AudioRecord';
    case TEXT_VIDEO_BLOCK = 'TextVideoBlock';
    case TEXT_GRAPHIC_VIDEO_BLOCK = 'TextGraphicVideoBlock';
    case TEXT_AUDIO_BLOCK = 'TextAudioBlock';
    case TEXT_GRAPHIC_AUDIO_BLOCK = 'TextGraphicAudioBlock';
    case TEXT_AUDIO_VIDEO_BLOCK = 'TextAudioVideoBlock';
    case TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK = 'TextGraphicAudioVideoBlock';
    case BANNER_HTML5 = 'BannerHtml5';
}
