<?php
declare(strict_types=1);

namespace AnarchyService\SendRequest;

use AnarchyService\Base;

/**
 * Class Send
 * @package AnarchyService
 */
class Send
{
    /**
     * @param int|string $chat_id
     * @param string $text
     * @param string|null $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = false, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'text', 'parse_mode', 'disable_web_page_preview', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendMessage', $params);
    }

    /**
     * @param int|string $chat_id
     * @param int $from_chat_id
     * @param bool $disable_notification
     * @param int $message_id
     * @return object
     */
    public static function forwardMessage($chat_id, $from_chat_id, $disable_notification = false, $message_id)
    {
        $params = compact('chat_id', 'from_chat_id', 'disable_notification', 'message_id');

        return Base::sendRequest('forwardMessage', $params);
    }

    /**
     * @param int|string $chat_id
     * @param string $photo
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'photo', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup');
        return Base::sendRequest('sendPhoto', $data);
    }

    /**
     * @param int|string $chat_id
     * @param string $audio
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param int|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param string|null $thumb
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $performer = null, $title = null, $thumb = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'audio', 'caption', 'parse_mode', 'duration', 'performer', 'title', 'thumb', 'disable_notification', 'reply_to_message_id', 'reply_markup');
        return Base::sendRequest('sendAudio', $data);
    }

    /**
     * @param int|string $chat_id
     * @param string $document
     * @param string|null $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'document', 'thumb', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendDocument', $data);
    }

    /**
     * @param int|string $chat_id
     * @param string $video
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param string|null $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool $supports_streaming
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendVideo($chat_id, $video, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $supports_streaming = false, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'video', 'duration', 'width', 'height', 'thumb', 'caption', 'parse_mode', 'supports_streaming', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendVideo', $data);
    }

    /**
     * @param int|string $chat_id
     * @param string $animation
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param string|null $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool $supports_streaming
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendAnimation($chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $supports_streaming = false, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'animation', 'duration', 'width', 'height', 'thumb', 'caption', 'parse_mode', 'supports_streaming', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendAnimation', $data);
    }

    public static function sendVoice($chat_id, $voice, $duration = null, $caption = null, $parse_mode = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'voice', 'duration', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendVoice', $data);
    }

    /**
     * @param int|string $chat_id
     * @param string $video_note
     * @param int|null $duration
     * @param int|null $length
     * @param string|null $thumb
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendVideoNote($chat_id, $video_note, $duration = null, $length = null, $thumb = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'video_note', 'duration', 'length', 'thumb', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendVideoNote', $data);
    }

    #////////////////sendMediaGroup/////////////////////

    /**
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param int|null $live_period
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendLocation($chat_id, $latitude, $longitude, $live_period = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'latitude', 'longitude', 'live_period', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendLocation', $params);
    }

    #////////////////////sendPoll && sendDice/////////////////

    /**
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquare_id
     * @param string|null $foursquare_type
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendVenue($chat_id, $latitude, $longitude, $title, $address, $foursquare_id = null, $foursquare_type = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'latitude', 'longitude', 'title', 'address', 'foursquare_id', 'foursquare_type	', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendVenue', $params);
    }

    /**
     * @param int|string $chat_id
     * @param string $phone_number
     * @param string $first_name
     * @param string|null $last_name
     * @param string|null $vcard
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendContact($chat_id, $phone_number, $first_name, $last_name = null, $vcard = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $params = compact('chat_id', 'phone_number', 'first_name', 'last_name', 'vcard', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendContact', $params);
    }

    /**
     * @param int|string $chat_id
     * @param string $action
     * @return object
     */
    public static function sendChatAction($chat_id, $action)
    {
        $actions = [
            'typing',
            'upload_photo',
            'record_video',
            'upload_video',
            'record_audio',
            'upload_audio',
            'upload_document',
            'find_location',
            'record_video_note',
            'upload_video_note'
        ];
        if (isset($action) && in_array($action, $actions)) {
            $params = compact('chat_id', 'action');
            return Base::sendRequest('sendChatAction', $params);
        }
        throw new BotException('Invalid Action! Accepted value: ' . implode(', ', $actions));
    }

    /**
     * @param int|string $chat_id
     * @param string $sticker
     * @param bool $disable_notification
     * @param int|null $reply_to_message_id
     * @param array|null $reply_markup
     * @return object
     */
    public static function sendSticker($chat_id, $sticker, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null)
    {
        $data = compact('chat_id', 'sticker', 'disable_notification', 'reply_to_message_id', 'reply_markup');

        return Base::sendRequest('sendSticker', $data);
    }

    // region Keyboard

    /**
     * @param array $inline_keyboard
     * @return false|string
     */
    public static function InlineKeyboardMarkup($inline_keyboard)
    {
        return json_encode(compact('inline_keyboard'));
    }

    /**
     * @param array $keyboard
     * @param bool $resize_keyboard
     * @param bool $one_time_keyboard
     * @param bool $selective
     * @return false|string
     */
    public static function replyKeyboardMarkup($keyboard, $resize_keyboard = false, $one_time_keyboard = false, $selective = false)
    {
        return json_encode(compact('keyboard', 'resize_keyboard', 'one_time_keyboard', 'selective'));
    }

    /**
     * @param bool $selective
     * @return false|string
     */
    public static function ReplyKeyboardRemove($selective = false)
    {
        $remove_keyboard = true;
        return json_encode(compact('remove_keyboard', 'selective'));
    }

    /**
     * @param bool $selective
     * @return false|string
     */
    public static function forceReply($selective = false)
    {
        $force_reply = true;
        return json_encode(compact('force_reply', 'selective'));
    }

    // endregion Keyboard
}