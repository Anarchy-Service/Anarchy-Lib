<?php
declare(strict_types=1);

use AnarchyService\Base;
use AnarchyService\DB\DB;
use AnarchyService\Get;
use AnarchyService\SendRequest\Send;

require_once 'vendor/autoload.php';

$tg = new Base();
$DB = DB::Database();
if ($argv[1]) {
    $argument = trim($argv[1]);
    if ($argument != '') {
        Get::set(json_decode(file_get_contents($argument)));
        unlink($argument);
    }
} else {
    Get::set($tg->getWebhookUpdates());
}

if (Get::$text == 'hi') {
    Send::sendMessage(Get::$chat_id, 'Hello!');
}
$admins=explode(',', getenv('ADMINS'));
foreach ($admins as $admin) {
    Send::sendMessage($admin, 'bot is run');
}
