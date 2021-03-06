<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \unreal4u\TelegramAPI\HttpClientRequestHandler;
use \unreal4u\TelegramAPI\TgLog;
use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use TelegramOSINT\Client\InfoObtainingClient\Models\GroupId;
use TelegramOSINT\Client\InfoObtainingClient\Models\MessageModel;
use TelegramOSINT\Logger\Logger;
use TelegramOSINT\Scenario\GroupResolverScenario;
use TelegramOSINT\Scenario\LinkParseScenario;
use TelegramOSINT\Scenario\Models\GroupRequest;
use TelegramOSINT\Scenario\Models\OptionalDateRange;
use TelegramOSINT\Scenario\ReusableClientGenerator;
class TelegramController extends Controller
{
    public function index(){
//        $loop = \React\EventLoop\Factory::create();
//        $handler = new HttpClientRequestHandler($loop);
//
//        $tgLog = new TgLog(BOT_TOKEN, $handler);
//
//        $sendMessage = new SendMessage();
//        $sendMessage->chat_id = A_USER_CHAT_ID;
//        $sendMessage->text = 'Hello world!';
//
//        $tgLog->performApiRequest($sendMessage);
//        $loop->run();

//        $argsOrFalse = getopt('g:l:f:t:h', ['group-id:', 'https://t.me/vityapelevin', 'timestamp-from:', 'timestamp-to:', 'help']);
//
//        $hasGroupId = array_key_exists('g', $argsOrFalse) || array_key_exists('group-id', $argsOrFalse);
//        $hasLink = array_key_exists('l', $argsOrFalse) || array_key_exists('deep-link', $argsOrFalse);
//        if ($argsOrFalse === false
//            || (array_key_exists('h', $argsOrFalse) || array_key_exists('help', $argsOrFalse))
//            || (!$hasGroupId && !$hasLink)
//        ) {
//            echo <<<'EOT'
//Usage:
//    php parseChannelLinks.php -g groupID | -l link [-f timestampFrom] [-t timestampTo]
//    php parseChannelLinks.php --group-id groupID | --deep-link link
//                              [--timestamp-from timestampFrom] [--timestamp-to timestampTo]
//
//    Note: Group ID and Deep Link are mutually exclusive. Please specify only one of them.
//
//   -g, --group-id               Group identifier.
//   -l, --deep-link              Deep link (e.g. https://t.me/vityapelevin).
//   -f, --timestamp-from         Optional start timestamp.
//   -t, --timestamp-to           Optional end timestamp.
//   -h, --help                   Display this help message.
//
//EOT;
//            exit(1);
//        }
//
//        if ($hasGroupId && $hasLink) {
//            echo 'Group ID and Deep Link are mutually exclusive. Please specify only one of them.'.PHP_EOL;
//
//            exit(1);
//        }
//
//        $groupId = $argsOrFalse['g'] ?? $argsOrFalse['group-id'] ?? null;
//        $deepLink = $argsOrFalse['l'] ?? $argsOrFalse['deep-link'] ?? '';
//        $timestampStart = $argsOrFalse['f'] ?? $argsOrFalse['timestamp-from'] ?? null;
//        $timestampEnd = $argsOrFalse['t'] ?? $argsOrFalse['timestamp-to'] ?? null;
//
//        $timestampStart = $timestampStart === null ? null : (int) $timestampStart;
//        $timestampEnd = $timestampEnd === null ? null : (int) $timestampEnd;
//
//        $generator = new ReusableClientGenerator();
//        $request = $groupId !== null
//            ? GroupRequest::ofGroupId((int) $groupId)
//            : GroupRequest::ofUserName($deepLink);
//
//        $result = [];
//        $parseLinks = static function (
//            /** @noinspection PhpUnusedParameterInspection */
//            ?MessageModel $messageModel = null,
//            ?array $messageRaw = null,
//            int $endFlag = -1
//        ) use (&$result) {
//            if ($endFlag === -1) {
//                arsort($result, SORT_NUMERIC);
//
//                echo "\tSite\t|\tLinks count\t\n";
//                foreach ($result as $site => $count) {
//                    echo $site."\t|\t".$count."\n";
//                }
//            } elseif (!empty($messageRaw['message']) && preg_match('/http[s]?:\/\/([\w.\-_]*)/', $messageRaw['message'], $matches) && !empty($matches[1])) {
//                $domain = $matches[1];
//                $result[$domain] = !empty($result[$domain]) ? $result[$domain] + 1 : 1;
//            }
//        };
//
//        $onGroupReady = static function (
//            ?int $groupId = null,
//            ?int $accessHash = null
//        ) use ($timestampStart, $timestampEnd, $generator, $parseLinks) {
//            if (!$groupId) {
//                Logger::log('parseChannelLinks', 'Group not found');
//
//                return;
//            }
//
//            $client = new LinkParseScenario(
//                new GroupId($groupId, $accessHash),
//                $generator,
//                new OptionalDateRange(
//                    $timestampStart,
//                    $timestampEnd
//                ),
//                $parseLinks
//            );
//            $client->startActions();
//        };
//
//        /** @noinspection PhpUnhandledExceptionInspection */
//        $resolver = new GroupResolverScenario($request, $generator, $onGroupReady);
//        /** @noinspection PhpUnhandledExceptionInspection */
//        $resolver->startActions();
//



        $tlg=new TlgScrapper();
        $tlg->load('a-telegram-channel-username');
    }

}
