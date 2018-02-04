# magento2 whoops error handler

This is magento 2 module that adds Whoops error handling.

    composer require --dev seravinx/magento2-whoops-error-handling

    ./bin/magento module:enable Seravinx_Whoops
    ./bin/magento setup:upgrade

You can set default editor to open file with error from Whoops error page.
    Magento admin page -> Stores -> Configuration -> Advanced -> Developer -> Debug -> Default editor for whoops

You need to configurate your system for editor url handling. Example fore Sublime text:
    https://github.com/algorich/sublime-url-handler