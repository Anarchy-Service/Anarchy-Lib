<?php
declare(strict_types=1);


namespace AnarchyService;

use AnarchyService\Base;

/**
 * Class Get
 * @package AnarchyService
 */
class Get
{
    public static $message_id;
    //
    public static $from_id;
    public static bool $from_is_bot;
    public static $from_first_name;
    public static $from_last_name;
    public static $from_username;
    public static $language_code;
    //
    public static $chat_id;
    public static $chat_type;
    public static $chat_title;
    public static $chat_username;
    //
    public static $date;
    public static $text;
    public static $caption;
    public static $entities;
    //
    public static $new_chat_member_id;
    public static bool $new_chat_member_is_bot;
    public static $new_chat_member_first_name;
    public static $new_chat_member_last_name;
    public static $new_chat_member_username;
    public static $new_chat_member_language_code;
    public static $left_chat_member_id;
    //
    public static $forward_from_chat_id;
    public static $forward_from_chat_type;
    public static $forward_from_chat_title;
    public static $forward_from_chat_username;
    //
    public static $new_chat_photo_file_id;
    public static $new_chat_title;
    //
    public static $callback_query_data;
    //
    public static $reply_to_from_id;
    public static bool $reply_to_from_is_bot;
    public static $reply_to_from_first_name;
    public static $reply_to_from_last_name;
    public static $reply_to_from_username;
    public static $reply_to_from_language_code;
    public static $reply_to_text;
    public static $reply_to_caption;


    /**
     * @param $input
     */
    public static function set($input)
    {
        if (isset($input->message) || isset($input->edited_message)) {
            if (isset($input->message)) $type = 'message';
            else $type = 'edited_message';
            //
            self::$message_id = $input->$type->message_id;
            //
            self::$from_id = $input->$type->from->id;
            self::$from_is_bot = $input->$type->from->is_bot;
            self::$from_first_name = $input->$type->from->first_name ?? null;
            self::$from_last_name = $input->$type->from->last_name ?? null;
            self::$from_username = $input->$type->from->username ?? null;
            self::$language_code = $input->$type->from->language_code ?? null;
            //
            self::$chat_id = $input->$type->chat->id;
            self::$chat_type = $input->$type->chat->type ?? null;
            self::$chat_title = $input->$type->chat->title;
            self::$chat_username = $input->$type->chat->username ?? null;
            //
            self::$text = $input->$type->text ?? null;
            self::$caption = $input->$type->caption ?? null;
            self::$entities = $input->$type->entities ?? $input->$type->caption_entities ?? null;
            //
            self::$left_chat_member_id = $input->$type->left_chat_member->id ?? null;
            if (isset($input->$type->reply_to_message)) {
                self::$reply_to_from_id = $input->$type->reply_to_message->from->id;
                self::$reply_to_from_is_bot = $input->$type->reply_to_message->from->is_bot;
                self::$reply_to_from_first_name = $input->$type->reply_to_message->from->first_name ?? null;
                self::$reply_to_from_last_name = $input->$type->reply_to_message->from->last_name ?? null;
                self::$reply_to_from_username = $input->$type->reply_to_message->from->username ?? null;
                self::$reply_to_from_language_code = $input->$type->reply_to_message->from->language_code ?? null;
                self::$reply_to_text = $input->$type->reply_to_message->text ?? null;
                self::$reply_to_caption = $input->$type->reply_to_message->caption ?? null;
            } elseif(isset($input->message->new_chat_member)){
                self::$new_chat_member_id = $input->message->new_chat_member->id;
                self::$new_chat_member_is_bot = $input->message->new_chat_member->is_bot;
                self::$new_chat_member_first_name = $input->message->new_chat_member->first_name ?? null;
                self::$new_chat_member_last_name = $input->message->new_chat_member->last_name ?? null;
                self::$new_chat_member_username = $input->message->new_chat_member->username ?? null;
                self::$new_chat_member_language_code = $input->message->new_chat_member->language_code ?? null;
            } elseif(isset($input->message->forward_from_chat)){
                self::$forward_from_chat_id = $input->message->forward_from_chat->id;
                self::$forward_from_chat_type = $input->message->forward_from_chat->type;
                self::$forward_from_chat_title = $input->message->forward_from_chat->title;
                self::$forward_from_chat_username = $input->message->forward_from_chat->username ?? null;
            } elseif(isset($input->message->new_chat_photo)){
                self::$new_chat_photo_file_id = $input->message->new_chat_photo->file_id;
            } elseif(isset($input->message->new_chat_title)){
                self::$new_chat_title = $input->message->new_chat_title;
            }
        } elseif (isset($input->callback_query)) {
            self::$message_id = $input->callback_query->message->message_id;
            self::$from_id = $input->callback_query->from->id;
            self::$from_is_bot = $input->callback_query->from->is_bot;
            self::$from_first_name = $input->callback_query->from->first_name ?? null;
            self::$from_last_name = $input->callback_query->from->last_name ?? null;
            self::$from_username = $input->callback_query->from->username ?? null;
            self::$language_code = $input->callback_query->from->language_code ?? null;
            self::$chat_id = $input->callback_query->message->chat->id;
            self::$chat_type = $input->callback_query->message->chat->type ?? null;
            self::$chat_title = $input->callback_query->message->chat->title;
            self::$chat_username = $input->callback_query->message->chat->username ?? null;
            self::$text = $input->callback_query->message->text ?? null;
            self::$date = $input->callback_query->message->date ?? null;
            self::$callback_query_data = $input->callback_query->data ?? null;
        }
    }

    /**
     * @param string $file_id
     * @return object
     */
    public function getFile($file_id)
    {
        return Base::sendRequest('getFile', compact('file_id'));
    }

    /**
     * @param string $file_id
     * @param string $file_path
     * @return object|false
     */
    /*public function getFileData($file_id, $file_path)
    {
        return file_get_contents(Base::$baseFileURL . $file_path . '?' . http_build_query(compact('file_id')));
    }*/

    /**
     * @param int $user_id
     * @param int $offset
     * @param int $limit
     * @return object
     */
    public static function getUserProfilePhotos($user_id, $offset = null, $limit = null)
    {
        $params = compact('user_id', 'offset', 'limit');
        return Base::sendRequest('getUserProfilePhotos', $params);
    }
}
