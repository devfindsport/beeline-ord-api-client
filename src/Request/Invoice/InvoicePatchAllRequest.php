<?php

namespace BeelineOrd\Request\Invoice;

use BeelineOrd\Data\Invoice\InvoiceCreateModel;
use BeelineOrd\Data\Invoice\InvoiceEditModel;
use BeelineOrd\Data\Invoice\InvoiceImportResult;
use BeelineOrd\Request\AbstractRequest;

/**
 * @extends AbstractRequest<InvoiceImportResult>
 */
class InvoicePatchAllRequest extends AbstractRequest
{
    public function getMethod(): string
    {
        return 'PATCH /data/invoice/all';
    }

    /**
     * @param array<InvoiceCreateModel> $create
     * @param array<InvoiceEditModel> $update
     */
    public function __construct(array $create = [], array $update = [])
    {
        $this->body = [];
        if ($create) {
            $this->body['create'] = array_map(fn(InvoiceCreateModel $m) => $m, array_values($create));
        }
        if ($update) {
            $this->body['update'] = array_map(fn(InvoiceEditModel $m) => $m, $update);
        }
    }

    /**
     * @param array $body
     * @return InvoiceImportResult
     */
    public function createResponse(array $body)
    {
        return new InvoiceImportResult($body);
    }

}
