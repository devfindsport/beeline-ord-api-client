<?php

namespace BeelineOrd\Request\CreativeStatistics;

use BeelineOrd\Data\CreativeStatistics\CreativeStatisticsEditModel;
use BeelineOrd\Request\AbstractRequest;

/**
 * @extends AbstractRequest<mixed>
 */
class CreativeStatisticsPatchRequest extends AbstractRequest
{
    protected int $id;
    protected CreativeStatisticsEditModel $model;

    public function __construct(int $statisticsId, CreativeStatisticsEditModel $contentEditModel)
    {
        $this->id = $statisticsId;
        $this->model = $contentEditModel;
    }

    public function getMethod(): string
    {
        return 'PATCH /data/creativeStatistics/' . $this->id;
    }

    public function getBody()
    {
        return $this->model;
    }

    public function createResponse(array $body): array
    {
        return $body;
    }
}
