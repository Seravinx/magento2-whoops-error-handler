<?php
/**
 * Whoops plugin for Magento 2
 */

namespace Seravinx\Whoops\Plugin;

class ErrorHandler
{
	protected $appState;

	public function __construct(\Magento\Framework\App\State $appState) {
		$this->appState = $appState;
	}

	public function beforelaunch() {
		if ($this->appState->getMode() == \Magento\Framework\App\State::MODE_DEVELOPER) {
			$run = new \Whoops\Run;
			$handler = new \Whoops\Handler\PrettyPageHandler;
			$handler->setEditor('sublime');
			$run->pushHandler($handler);
			$run->register();
		}
	}
}