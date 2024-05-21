<?php

namespace BeelineOrd\Endpoint;

use BeelineOrd\ApiClient;
use BeelineOrd\Data\Invoice\InvoiceCreateModel;
use BeelineOrd\Data\Invoice\InvoiceImportResult;
use BeelineOrd\Data\InvoiceItem\InvoiceItemCreateModel;
use BeelineOrd\Data\InvoiceItem\InvoiceItemEditModel;
use BeelineOrd\Data\InvoiceItem\InvoiceItemImportResult;
use BeelineOrd\Data\InvoiceItemStatistics\InvoiceItemStatisticsCreateModel;
use BeelineOrd\Request\Invoice\InvoicePatchAllRequest;
use BeelineOrd\Request\InvoiceItem\InvoiceItemPatchAllRequest;
use BeelineOrd\Request\InvoiceItemStatistics\InvoiceItemStatisticsPatchAllRequest;

class InvoiceEndpoint
{
    protected ApiClient $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function create(InvoiceCreateModel $createModel): int
    {
        $result = $this->import([$createModel]);
        $ids = $result->getIds();
        if (empty($ids)) {
            throw new \UnexpectedValueException('Method did not return created ID');
        }

        return array_pop($ids);
    }

    public function createContent(InvoiceItemCreateModel $createModel): int
    {
        $result = $this->importItem([$createModel]);
        $ids = $result->getIds();
        if (empty($ids)) {
            throw new \UnexpectedValueException('Method did not return created ID');
        }

        return array_pop($ids);
    }

    public function createStatistics(InvoiceItemStatisticsCreateModel $createModel)
    {
        $result = $this->importStatistics([$createModel]);
        $ids = $result->getIds();
        if (empty($ids)) {
            throw new \UnexpectedValueException('Method did not return created ID');
        }

        return array_pop($ids);
    }

    public function import(array $create = [], array $update = []): InvoiceImportResult
    {
        return $this->client->send(new InvoicePatchAllRequest($create, $update));
    }

    /**
     * @param list<InvoiceItemCreateModel> $create
     * @param array<int, InvoiceItemEditModel> $update
     * @return InvoiceItemImportResult
     */
    public function importItem(array $create = [], array $update = [])
    {
        return $this->client->send(new InvoiceItemPatchAllRequest($create, $update));
    }

    public function importStatistics(array $create = [], array $update = [])
    {
        return $this->client->send(new InvoiceItemStatisticsPatchAllRequest($create, $update));
    }
}
