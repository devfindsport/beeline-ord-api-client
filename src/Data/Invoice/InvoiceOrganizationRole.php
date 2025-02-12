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
enum InvoiceOrganizationRole: string
{
    case ADVERTISING_AGENCY = 'AdvertisingAgency';
    case ADVERTISING_DISTRIBUTOR = 'AdvertisingDistributor';
    case ADVERTISING_SYSTEM_OPERATOR = 'AdvertisingSystemOperator';
    case ADVERTISER = 'Advertiser';
}
