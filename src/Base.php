<?php
declare(strict_types=1);

namespace AnarchyService;

use AnarchyService\BotException;

/**
 * Class Base
 */
class Base
{
    private const BASE_URL = 'https://api.telegram.org';
    private const BOT_URL = '/bot';
    private const FILE_URL = '/file';

    private string $token;
    private static string $baseURL;
    private static string $baseFileURL;

    /**
     * Base constructor.
     * @throws BotException
     */
    public function __construct()
    {
        $this->token = getenv('TOKEN');
        if (!$this->token) {
            throw new BotException("Token can\'t be empty");
        }
        self::$baseURL = self::BASE_URL . self::BOT_URL . $this->token . '/';
        self::$baseFileURL = self::BASE_URL . self::FILE_URL . self::BOT_URL . $this->token . '/';
    }

    /**
     * @param string $method
     * @param array $params
     * @return object
     */
    public static function sendRequest($method, $params)
    {
        $res = file_get_contents(self::$baseURL . $method . '?' . http_build_query($params));
        if ($res) {
            return json_decode($res);
        } else {
            return $res;
        }
    }

    /**
     * Use this method to receive incoming updates using long polling.
     *
     * @link https://core.telegram.org/bots/api#getupdates
     *
     * @param int|null $offset
     * @param int|null $limit
     * @param int|null $timeout
     *
     * @return object
     */
    public function pollUpdates($offset = null, $timeout = null, $limit = null)
    {
        $params = compact('offset', 'limit', 'timeout');
        return static::sendRequest('getUpdates', $params);
    }

    /**
     * Returns webhook updates sent by Telegram.
     * Works only if you set a webhook.
     *
     * @return object
     *
     */
    public function getWebhookUpdates()
    {
        return json_decode(file_get_contents('php://input'));
    }
}
