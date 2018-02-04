<?php

namespace Seravinx\Whoops\Model\Config\Source;

class Editors implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['label' => 'Select default editor', 'value' => ''],
            ['label' => 'sublime', 'value' => 'sublime'],
            ['label' => 'textmate', 'value' => 'textmate'],
            ['label' => 'emacs', 'value' => 'emacs'],
            ['label' => 'macvim', 'value' => 'macvim'],
            ['label' => 'phpstorm', 'value' => 'phpstorm'],
            ['label' => 'idea', 'value' => 'idea'],
            ['label' => 'vscode', 'value' => 'vscode'],
        ];
    }
}