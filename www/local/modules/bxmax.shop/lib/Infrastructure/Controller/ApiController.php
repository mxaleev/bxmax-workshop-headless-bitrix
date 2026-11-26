<?php declare(strict_types=1);

namespace Bxmax\Shop\Infrastructure\Controller;

use Bitrix\Main\Context;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Result;
use Bxmax\Shop\Public\Enum\ErrorCode;

/**
 * Общая часть контроллеров /api/v1: без фильтров по умолчанию, ответ из Result сервиса.
 */
abstract class ApiController extends Controller
{
    protected function getDefaultPreFilters(): array
    {
        return [];
    }

    /**
     * Успех — данные результата. Ошибка — ошибки в конверт и HTTP-статус по коду первой ошибки.
     */
    protected function respond(Result $result): ?array
    {
        if ($result->isSuccess()) {
            return $result->getData();
        }

        $this->addErrors($result->getErrors());

        $code = ErrorCode::tryFrom((string)$result->getErrors()[0]->getCode());
        if ($code !== null) {
            Context::getCurrent()->getResponse()->setStatus($code->httpStatus());
        }

        return [];
    }
}
