<?php
declare(strict_types=1);

namespace AnarchyService\SendRequest;

use AnarchyService\Base;

/**
 * Class Chat
 * @package AnarchyService
 */
class Chat
{
    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @param int $until_date
     * @return object
     */
    public static function kickChatMember($chat_id, $user_id, $until_date = null)
    {
        $params = compact('chat_id', 'user_id', 'until_date');
        return Base::sendRequest('kickChatMember', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @return object
     */
    public static function unbanChatMember($chat_id, $user_id)
    {
        $params = compact('chat_id', 'user_id');
        return Base::sendRequest('unbanChatMember', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @param array $permissions
     * @param int $until_date
     * @return object
     */
    public static function restrictChatMember($chat_id, $user_id, $permissions, $until_date = null)
    {
        $params = compact('chat_id', 'user_id', 'permissions', 'until_date');
        return Base::sendRequest('restrictChatMember', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @param bool $can_change_info
     * @param bool $can_post_messages
     * @param bool $can_edit_messages
     * @param bool $can_delete_messages
     * @param bool $can_invite_users
     * @param bool $can_restrict_members
     * @param bool $can_pin_messages
     * @param bool $can_promote_members
     * @return object
     */
    public static function promoteChatMember($chat_id, $user_id, $can_change_info = false, $can_post_messages = false, $can_edit_messages = false, $can_delete_messages = false, $can_invite_users = false, $can_restrict_members = false, $can_pin_messages = false, $can_promote_members = false)
    {
        $params = compact('chat_id', 'user_id', 'can_change_info', 'can_post_messages', 'can_edit_messages', 'can_delete_messages', 'can_invite_users', 'can_restrict_members', 'can_pin_messages', 'can_promote_members');
        return Base::sendRequest('promoteChatMember', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @param string $custom_title
     * @return object
     */
    public static function setChatAdministratorCustomTitle($chat_id, $user_id, $custom_title)
    {
        $params = compact('chat_id', 'user_id', 'custom_title');
        return Base::sendRequest('setChatAdministratorCustomTitle', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @param array $permissions
     * @return object
     */
    public static function setChatPermissions($chat_id, $permissions)
    {
        $params = compact('chat_id', 'permissions');
        return Base::sendRequest('setChatPermissions', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function exportChatInviteLink($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('exportChatInviteLink', $params);
    }

    /**
     * @param string|int $chat_id
     * @param string $photo
     * @return object
     */
    public static function setChatPhoto($chat_id, $photo)
    {
        $params = compact('chat_id', 'photo');
        return Base::sendRequest('setChatPhoto', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function deleteChatPhoto($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('deleteChatPhoto', $params);
    }

    /**
     * @param string|int $chat_id
     * @param string $title
     * @return object
     */
    public static function setChatTitle($chat_id, $title)
    {
        $params = compact('chat_id', 'title');
        return Base::sendRequest('setChatTitle', $params);
    }

    /**
     * @param string|int $chat_id
     * @param string|null $description
     * @return object
     */
    public static function setChatDescription($chat_id, $description = null)
    {
        $params = compact('chat_id', 'description');
        return Base::sendRequest('setChatDescription', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $message_id
     * @param bool $disable_notification
     * @return object
     */
    public static function pinChatMessage($chat_id, $message_id, $disable_notification = false)
    {
        $params = compact('chat_id', 'message_id', 'disable_notification');
        return Base::sendRequest('pinChatMessage', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function unpinChatMessage($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('unpinChatMessage', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function leaveChat($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('leaveChat', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function getChat($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('getChat', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function getChatAdministrators($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('getChatAdministrators', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function getChatMembersCount($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('getChatMembersCount', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int $user_id
     * @return object
     */
    public static function getChatMember($chat_id, $user_id)
    {
        $params = compact('chat_id', 'user_id');
        return Base::sendRequest('getChatMember', $params);
    }

    /**
     * @param string|int $chat_id
     * @param string $sticker_set_name
     * @return object
     */
    public static function setChatStickerSet($chat_id, $sticker_set_name)
    {
        $params = compact('chat_id', 'sticker_set_name');
        return Base::sendRequest('setChatStickerSet', $params);
    }

    /**
     * @param string|int $chat_id
     * @return object
     */
    public static function deleteChatStickerSet($chat_id)
    {
        $params = compact('chat_id');
        return Base::sendRequest('deleteChatStickerSet', $params);
    }

    /**
     * @param string|int $chat_id
     * @param int|null $message_id
     * @return object
     */
    public static function deleteMessage($chat_id, $message_id = null)
    {
        $params = compact('chat_id', 'message_id');

        return Base::sendRequest('deleteMessage', $params);
    }
}
