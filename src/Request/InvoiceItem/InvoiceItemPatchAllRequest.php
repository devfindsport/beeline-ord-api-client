<?php

namespace BeelineOrd\Request\InvoiceItem;

use BeelineOrd\Data\InvoiceItem\InvoiceItemCreateModel;
use BeelineOrd\Data\InvoiceItem\InvoiceItemEditModel;
use BeelineOrd\Data\InvoiceItem\InvoiceItemImportResult;
use BeelineOrd\Request\AbstractRequest;

/**
 * @extends AbstractRequest<InvoiceItemImportResult>
 */
class InvoiceItemPatchAllRequest extends AbstractRequest
{
    public function getMethod(): string
    {
        return 'PATCH /data/invoiceItem/all';
    }

    /**
     * @param array<InvoiceItemCreateModel> $create
     * @param array<InvoiceItemEditModel> $update
     */
    public function __construct(array $create = [], array $update = [])
    {
        $this->body = [];
        if ($create) {
            $this->body['create'] = array_map(fn(InvoiceItemCreateModel $m) => $m, array_values($create));
        }
        if ($update) {
            $this->body['update'] = array_map(fn(InvoiceItemEditModel $m) => $m, $update);
        }
    }

    /**
     * @param array $body
     * @return InvoiceItemImportResult
     */
    public function createResponse(array $body)
    {
        return new InvoiceItemImportResult($body);
    }

}
