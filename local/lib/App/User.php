<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 03.10.2018
 * Time: 9:32
 */
namespace APP;

class User {
    //    CUser::GetGroups()
    //    /bitrix/modules/main/classes/general/user.php:143

    // Проверка авторизован ли пользователь
    public function is_authorized ()
    {
        return \CUser::IsAuthorized();
    }

    // Выход
    public function logout()
    {
        return \CUser::Logout();
    }

    // Получить
    public function get_login ()
    {
       return \CUser::GetFirstName()?\CUser::GetFirstName():\CUser::GetLogin();
    }
    public function get_user ()
    {

    }
    public function get_group ()
    {

        $arGroup = \CUser::GetUserGroupArray();
        foreach ($arGroup as $key => $item){
            $arGroup[$item] = \CGroup::GetByID($item, "Y")->Fetch();
        }
        unset($arGroup[0]);
        return $arGroup;
    }
}