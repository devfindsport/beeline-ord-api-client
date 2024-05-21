<?php

namespace BeelineOrd\Request\InvoiceItemStatistics;

use BeelineOrd\Data\InvoiceItemStatistics\InvoiceItemStatisticsCreateModel;
use BeelineOrd\Data\InvoiceItemStatistics\InvoiceItemStatisticsEditModel;
use BeelineOrd\Data\InvoiceItemStatistics\InvoiceItemStatisticsImportResult;
use BeelineOrd\Request\AbstractRequest;

/**
 * @extends AbstractRequest<InvoiceItemStatisticsImportResult>
 */
class InvoiceItemStatisticsPatchAllRequest extends AbstractRequest
{
    public function getMethod(): string
    {
        return 'PATCH /data/invoiceItemStatistics/all';
    }

    /**
     * @param array<InvoiceItemStatisticsCreateModel> $create
     * @param array<InvoiceItemStatisticsEditModel> $update
     */
    public function __construct(array $create = [], array $update = [])
    {
        $this->body = [];
        if ($create) {
            $this->body['create'] = array_map(fn(InvoiceItemStatisticsCreateModel $m) => $m, array_values($create));
        }
        if ($update) {
            $this->body['update'] = array_map(fn(InvoiceItemStatisticsEditModel $m) => $m, $update);
        }
    }

    /**
     * @param array $body
     * @return InvoiceItemStatisticsImportResult
     */
    public function createResponse(array $body)
    {
        return new InvoiceItemStatisticsImportResult($body);
    }

}
