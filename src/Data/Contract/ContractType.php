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
enum ContractType: string
{
    case INTERMEDIARY = 'Intermediary';
    case ORIGINAL = 'Original';
    case ADDITIONAL = 'Additional';
    case SELF_PROMOTION = 'SelfPromotion';
}
