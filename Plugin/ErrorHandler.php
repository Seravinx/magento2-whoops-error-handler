<?php
/**
 * Whoops plugin for Magento 2
 */

namespace Seravinx\Whoops\Plugin;

class ErrorHandler
{
	protected $appState;

	protected $request;

	protected $scopeConfig;

	public function __construct(
		\Magento\Framework\App\State $appState,
		\Magento\Framework\App\RequestInterface $request,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
		) {
		$this->appState = $appState;
		$this->request = $request;
		$this->scopeConfig = $scopeConfig;
	}

	public function beforelaunch() {
		if ($this->appState->getMode() == \Magento\Framework\App\State::MODE_DEVELOPER) {
			$run = new \Whoops\Run;
			
			if ($this->request->isXmlHttpRequest()) {
				$handler = new \Whoops\Handler\JsonResponseHandler;
			} else {
				$handler = new \Whoops\Handler\PrettyPageHandler;
				$handler->setEditor(
					$this->scopeConfig->getValue('dev/debug/default_editor')
				);
			}
			$run->pushHandler($handler);
			$run->register();
		}
	}
}