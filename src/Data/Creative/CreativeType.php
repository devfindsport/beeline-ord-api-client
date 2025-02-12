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
enum CreativeType: string
{
    case OTHER = 'Other';
    case PAY_FOR_VIEWS = 'PayForViews';
    case PAY_FOR_CLICKS = 'PayForClicks';
    case PAY_FOR_ACTIONS = 'PayForActions';
}
