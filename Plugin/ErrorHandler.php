<?php
/**
 * Whoops plugin for Magento 2
 */

namespace Seravinx\Whoops\Plugin;

class ErrorHandler
{
    private $appState;

    private $request;

    private $scopeConfig;

    private $run;

    public function __construct(
        \Magento\Framework\App\State $appState,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Whoops\Run $run
        ) {
        $this->appState = $appState;
        $this->request = $request;
        $this->scopeConfig = $scopeConfig;
        $this->run = $run;
    }

    public function beforelaunch() {
        if ($this->appState->getMode() == \Magento\Framework\App\State::MODE_DEVELOPER) {
            if ($this->request->isXmlHttpRequest()) {
                $handler = new \Whoops\Handler\JsonResponseHandler;
            } else {
                $handler = new \Whoops\Handler\PrettyPageHandler;
                $editor = $this->scopeConfig->getValue('dev/debug/default_editor');
                if ($editor) {
                    $handler->setEditor($editor);
                }
            }
            $this->run->pushHandler($handler);
            $this->run->register();
        }
    }

    public function beforeCatchException(
        \Magento\Framework\App\Http $subject,
        \Magento\Framework\App\Bootstrap $bootstrap,
        \Exception $exception
        ) {
        if ($this->appState->getMode() == \Magento\Framework\App\State::MODE_DEVELOPER) {
            $this->run->handleException($exception);
        }
    }
}
