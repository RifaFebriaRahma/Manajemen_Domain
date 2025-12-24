<?php
/**
 * Params Configuration for Production
 */
if(file_exists(__DIR__.'/params-local.php')){
    return require(__DIR__ . '/params-local.php');
}
return [
    'bsDependencyEnabled' => true,
    'bsVersion' => '5.x',

    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
];
