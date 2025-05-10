<?php

namespace BeelineOrd\Request\CreativeStatistics;

use BeelineOrd\Data\CreativeStatistics\CreativeStatisticsCreateModel;
use BeelineOrd\Data\CreativeStatistics\CreativeStatisticsEditModel;
use BeelineOrd\Data\InvoiceItemStatistics\InvoiceItemStatisticsImportResult;
use BeelineOrd\Request\AbstractRequest;

/**
 * @extends AbstractRequest<InvoiceItemStatisticsImportResult>
 */
class CreativeStatisticsPatchAllRequest extends AbstractRequest
{
    public function getMethod(): string
    {
        return 'PATCH /data/creativeStatistics/all';
    }

    /**
     * @param array<CreativeStatisticsCreateModel> $create
     * @param array<CreativeStatisticsEditModel> $update
     */
    public function __construct(array $create = [], array $update = [])
    {
        $this->body = [];
        if ($create) {
            $this->body['create'] = array_map(fn(CreativeStatisticsCreateModel $m) => $m, array_values($create));
        }
        if ($update) {
            $this->body['update'] = array_map(fn(CreativeStatisticsEditModel $m) => $m, $update);
        }
    }

    /**
     * @param array $body
     * @return array
     */
    public function createResponse(array $body)
    {
        return $body;
    }
}
