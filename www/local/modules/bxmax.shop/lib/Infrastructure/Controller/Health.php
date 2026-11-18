<?php declare(strict_types=1);

namespace Bxmax\Shop\Infrastructure\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;

final class Health extends Controller
{
	protected function init()
	{
		parent::init();

		// initialize services and/or load modules
	}

	public function getAutoWiredParameters(): array
	{
		return [];
	}

	public function configureActions(): array
	{
		return [
            'check' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_GET]),
                    new ActionFilter\CloseSession(),
                ]
            ],
		];
	}

	// replace aliases with alias form settings

	/**
	 * @ajaxAction bxmax.shop.alias.Health.
	 */
	public function checkAction(): ?array
	{
        return [
            'ok' => true,
            'module' => 'bxmax.shop',
        ];
	}
}