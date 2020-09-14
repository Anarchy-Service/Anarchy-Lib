<?php
declare(strict_types=1);

namespace AnarchyService\SendRequest;

use AnarchyService\Base;

/**
 * Class Edit
 * @package AnarchyService
 */
class Edit
{
    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @param int|null $inline_message_id
     * @param string $text
     * @param string|null $parse_mode
     * @param bool $disable_web_page_preview
     * @param array|null $reply_markup
     * @return object
     */
    public static function editMessageText($chat_id, $message_id = null, $inline_message_id = null, $text, $parse_mode = null, $disable_web_page_preview = false, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'text', 'parse_mode', 'disable_web_page_preview', 'reply_markup');

        return Base::sendRequest('editMessageText', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @param int|null $inline_message_id
     * @param string $caption
     * @param string|null $parse_mode
     * @param array|null $reply_markup
     * @return object
     */
    public static function editMessageCaption($chat_id, $message_id = null, $inline_message_id = null, $caption, $parse_mode = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'caption', 'parse_mode', 'reply_markup');

        return Base::sendRequest('editMessageCaption', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @param int|null $inline_message_id
     * @param array $media
     * @param array|null $reply_markup
     * @return object
     */
    public static function editMessageMedia($chat_id, $message_id = null, $inline_message_id = null, $media, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'media', 'reply_markup');

        return Base::sendRequest('editMessageMedia', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @param int|null $inline_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function editMessageReplyMarkup($chat_id, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'reply_markup');

        return Base::sendRequest('editMessageReplyMarkup', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function stopPoll($chat_id, $message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'reply_markup');

        return Base::sendRequest('stopPoll', $params);
    }

    /**
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param float $latitude
     * @param float $longitude
     * @param array|null $reply_markup
     * @return object
     */
    public static function editMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $latitude, $longitude, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'latitude', 'longitude', 'reply_markup');

        return Base::sendRequest('editMessageLiveLocation', $params);
    }

    /**
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param int|null $inline_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function stopMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'message_id', 'inline_message_id', 'reply_markup');

        return Base::sendRequest('stopMessageLiveLocation', $params);
    }
}
