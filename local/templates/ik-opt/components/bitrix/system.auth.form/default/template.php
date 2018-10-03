<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init();

// Редирект пользльзовается, если он авторизовон
if($arResult['FORM_TYPE'] === 'logout') {
    APP::Router()->redirect('user/profile/');
}
?>

<? if ($arResult["FORM_TYPE"] === "login"): ?>
    <div class="user__login">
        <div class="user__login__wrap">
            <div class="user__login__form is-mini">
                <div class="form-title">
                    <span>Авторизация на сайте</span>
                </div>
                <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
                    <? // Bitrix ?>
                    <? foreach ($arResult["POST"] as $key => $value): ?>
                        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                    <? endforeach ?>
                    <input type="hidden" name="AUTH_FORM" value="Y"/>
                    <input type="hidden" name="TYPE" value="AUTH"/>
                    <? // * END ?>

                    <div class="user__login__form__error" data-error="">
                        <? if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) ShowMessage($arResult['ERROR_MESSAGE']); ?>
                    </div>

                    <div class="form-group is-in-line is-offset">
                        <div class="form-group-title">
                            <span>E-mail:</span>
                        </div>
                        <div class="form-input">
                            <input class="form-input-control" type="text" name="USER_LOGIN" maxlength="50" value="" size="17" placeholder="Введите логин">
                        </div>
                    </div>
                    <div class="form-group is-in-line is-offset">
                        <div class="form-group-title">
                            <span>Пароль:</span>
                        </div>
                        <div class="form-input">
                            <input class="form-input-control" type="password" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off" placeholder="Введите пароль">
                        </div>
                    </div>

                    <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                        <div class="form-group is-in-line is-offset">
                            <div class="form-group-title"></div>
                            <div class="form-input">
                                <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"/>
                                <label for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>">
                                    <?echo GetMessage("AUTH_REMEMBER_SHORT") ?>
                                </label>
                            </div>
                        </div>
                    <?endif ?>

                    <? // Кнопки ?>
                    <div class="form-group is-in-line">
                        <div class="form-group-title"></div>
                        <div class="form-input">
                            <input class="btn btn-primary" type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
                        </div>
                    </div>
                    <? // END ?>
                </form>
                <div class="user__login__form__bg">
                    <div class="user__login__form__bg__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" version="1.1">
                            <g id="surface1">
                                <path style=" " d="M 5 4 C 4.449219 4 4 4.445313 4 5 L 4 11 C 4 11.554688 4.449219 12 5 12 C 5.550781 12 6 11.554688 6 11 L 6 6 L 11 6 C 11.550781 6 12 5.554688 12 5 C 12 4.445313 11.550781 4 11 4 Z M 53 4 C 52.449219 4 52 4.445313 52 5 C 52 5.554688 52.449219 6 53 6 L 58 6 L 58 11 C 58 11.554688 58.449219 12 59 12 C 59.550781 12 60 11.554688 60 11 L 60 5 C 60 4.445313 59.550781 4 59 4 Z M 39.238281 5.328125 C 38.691406 5.238281 38.183594 5.613281 38.09375 6.15625 L 37.777344 8.132813 C 37.691406 8.679688 38.0625 9.191406 38.609375 9.28125 C 38.660156 9.289063 38.714844 9.292969 38.765625 9.292969 C 39.25 9.292969 39.675781 8.941406 39.753906 8.453125 L 40.070313 6.476563 C 40.15625 5.929688 39.785156 5.417969 39.238281 5.328125 Z M 30.75 6.015625 C 30.203125 5.984375 29.730469 6.421875 29.707031 6.976563 C 29.6875 7.527344 30.117188 7.992188 30.667969 8.015625 C 31.671875 8.054688 32.695313 8.160156 33.710938 8.328125 C 33.765625 8.335938 33.820313 8.339844 33.875 8.339844 C 34.355469 8.339844 34.78125 7.992188 34.859375 7.503906 C 34.953125 6.957031 34.582031 6.441406 34.035156 6.351563 C 32.941406 6.171875 31.835938 6.058594 30.75 6.015625 Z M 27.246094 6.117188 C 23.820313 6.453125 20.589844 7.484375 17.648438 9.183594 C 12.21875 12.320313 8.203125 17.570313 6.335938 23.96875 C 6.183594 24.496094 6.488281 25.054688 7.015625 25.207031 C 7.109375 25.234375 7.203125 25.246094 7.296875 25.246094 C 7.730469 25.246094 8.128906 24.964844 8.257813 24.527344 C 9.976563 18.625 13.667969 13.792969 18.648438 10.917969 C 21.34375 9.359375 24.300781 8.414063 27.4375 8.105469 C 27.988281 8.050781 28.390625 7.5625 28.339844 7.011719 C 28.285156 6.460938 27.796875 6.070313 27.246094 6.117188 Z M 44.109375 6.8125 C 43.71875 6.808594 43.339844 7.027344 43.171875 7.40625 L 42.355469 9.226563 C 42.128906 9.734375 42.355469 10.324219 42.859375 10.550781 C 42.992188 10.609375 43.128906 10.640625 43.265625 10.640625 C 43.648438 10.640625 44.015625 10.417969 44.179688 10.046875 L 44.996094 8.222656 C 45.222656 7.71875 44.996094 7.125 44.492188 6.898438 C 44.367188 6.84375 44.238281 6.816406 44.109375 6.8125 Z M 48.425781 9.554688 C 48.171875 9.582031 47.929688 9.707031 47.753906 9.921875 L 46.492188 11.472656 C 46.144531 11.902344 46.210938 12.53125 46.640625 12.878906 C 46.824219 13.027344 47.046875 13.101563 47.269531 13.101563 C 47.558594 13.101563 47.847656 12.976563 48.046875 12.734375 L 49.308594 11.183594 C 49.65625 10.753906 49.589844 10.121094 49.160156 9.773438 C 48.949219 9.601563 48.683594 9.53125 48.425781 9.554688 Z M 31.25 10.460938 C 30.074219 10.417969 28.917969 10.464844 27.800781 10.59375 C 27.253906 10.65625 26.859375 11.152344 26.921875 11.703125 C 26.988281 12.25 27.476563 12.652344 28.03125 12.578125 C 36.1875 11.648438 46.679688 15.523438 50.433594 26.265625 C 50.574219 26.679688 50.960938 26.9375 51.375 26.9375 C 51.484375 26.9375 51.597656 26.921875 51.703125 26.882813 C 52.226563 26.699219 52.5 26.128906 52.316406 25.609375 C 48.71875 15.300781 39.484375 10.75 31.25 10.460938 Z M 24.769531 11.25 C 24.640625 11.238281 24.503906 11.246094 24.371094 11.285156 C 22.832031 11.734375 21.347656 12.371094 19.953125 13.175781 C 14.289063 16.445313 10.496094 22.363281 9.539063 29.410156 C 9.460938 29.957031 9.84375 30.464844 10.390625 30.535156 C 10.4375 30.542969 10.484375 30.546875 10.53125 30.546875 C 11.019531 30.546875 11.449219 30.183594 11.515625 29.683594 C 12.390625 23.25 15.832031 17.863281 20.953125 14.90625 C 22.210938 14.183594 23.546875 13.609375 24.933594 13.203125 C 25.464844 13.050781 25.769531 12.496094 25.613281 11.964844 C 25.496094 11.566406 25.15625 11.296875 24.769531 11.25 Z M 52.277344 13.359375 C 52.023438 13.316406 51.757813 13.375 51.53125 13.535156 L 49.910156 14.707031 C 49.460938 15.03125 49.363281 15.65625 49.6875 16.105469 C 49.882813 16.375 50.1875 16.515625 50.5 16.515625 C 50.699219 16.515625 50.90625 16.457031 51.082031 16.328125 L 52.703125 15.15625 C 53.152344 14.832031 53.253906 14.207031 52.929688 13.761719 C 52.769531 13.535156 52.53125 13.398438 52.277344 13.359375 Z M 30.332031 14.871094 C 27.585938 14.972656 24.835938 15.722656 22.316406 17.179688 C 15.949219 20.855469 12.664063 27.996094 13.558594 36 L 11.492188 36 C 11.386719 35.117188 11.3125 34.234375 11.300781 33.359375 C 11.292969 32.8125 10.847656 32.375 10.300781 32.375 L 10.285156 32.375 C 9.734375 32.386719 9.292969 32.839844 9.300781 33.390625 C 9.316406 34.253906 9.382813 35.128906 9.480469 36 L 1 36 C 0.585938 36 0.230469 36.253906 0.078125 36.609375 C 0.0273438 36.730469 0 36.863281 0 37 C 0 37.136719 0.0273438 37.269531 0.078125 37.390625 C 0.230469 37.746094 0.585938 38 1 38 L 63 38 C 63.414063 38 63.769531 37.746094 63.921875 37.390625 C 63.972656 37.269531 64 37.136719 64 37 C 64 36.863281 63.972656 36.730469 63.921875 36.609375 C 63.769531 36.253906 63.414063 36 63 36 L 38.988281 36 C 37.484375 34.519531 36.40625 32.722656 35.808594 30.628906 C 35.722656 30.332031 35.613281 30.039063 35.472656 29.765625 C 34.53125 27.882813 32.554688 26.773438 30.550781 27.003906 C 28.976563 27.1875 27.648438 27.988281 26.8125 29.265625 C 25.996094 30.515625 25.78125 32.046875 26.214844 33.453125 C 26.464844 34.3125 26.777344 35.160156 27.121094 36 L 24.960938 36 C 24.71875 35.34375 24.488281 34.675781 24.289063 33.992188 C 23.6875 32.042969 23.996094 29.921875 25.140625 28.171875 C 26.289063 26.414063 28.175781 25.265625 30.324219 25.015625 C 33.152344 24.699219 35.945313 26.238281 37.261719 28.867188 C 37.457031 29.261719 37.617188 29.671875 37.734375 30.089844 C 38.222656 31.792969 39.070313 33.273438 40.261719 34.484375 C 40.648438 34.875 41.28125 34.878906 41.671875 34.496094 C 42.066406 34.105469 42.074219 33.472656 41.6875 33.078125 C 40.734375 32.113281 40.050781 30.921875 39.65625 29.542969 C 39.507813 29.007813 39.304688 28.480469 39.050781 27.976563 C 37.359375 24.597656 33.761719 22.609375 30.097656 23.03125 C 27.359375 23.347656 24.941406 24.820313 23.46875 27.078125 C 22 29.328125 21.601563 32.066406 22.375 34.566406 C 22.515625 35.046875 22.667969 35.527344 22.828125 36.003906 L 20.511719 36.003906 C 19.652344 32.269531 20.105469 28.570313 21.792969 25.984375 C 22.09375 25.519531 21.964844 24.902344 21.5 24.601563 C 21.039063 24.296875 20.417969 24.429688 20.117188 24.890625 C 18.207031 27.816406 17.625 31.894531 18.464844 36 L 15.574219 36 C 14.683594 28.710938 17.597656 22.210938 23.316406 18.910156 C 30.464844 14.78125 39.703125 17.058594 44.347656 24.09375 C 44.652344 24.558594 45.273438 24.683594 45.734375 24.378906 C 46.195313 24.074219 46.320313 23.457031 46.015625 22.996094 C 42.425781 17.550781 36.382813 14.640625 30.332031 14.871094 Z M 54.632813 17.9375 C 54.503906 17.933594 54.367188 17.953125 54.238281 18.003906 L 52.371094 18.71875 C 51.855469 18.914063 51.597656 19.492188 51.796875 20.007813 C 51.945313 20.40625 52.324219 20.652344 52.730469 20.652344 C 52.847656 20.652344 52.96875 20.632813 53.082031 20.589844 L 54.953125 19.875 C 55.472656 19.675781 55.726563 19.097656 55.53125 18.582031 C 55.382813 18.195313 55.023438 17.953125 54.632813 17.9375 Z M 30.640625 18.984375 C 30.308594 18.992188 29.972656 19.019531 29.640625 19.058594 C 27.113281 19.34375 24.75 20.332031 22.804688 21.910156 C 22.375 22.257813 22.308594 22.886719 22.65625 23.316406 C 23.003906 23.746094 23.632813 23.8125 24.0625 23.464844 C 25.714844 22.125 27.722656 21.289063 29.871094 21.042969 C 34.367188 20.527344 38.773438 22.953125 40.839844 27.074219 C 41.148438 27.691406 41.394531 28.339844 41.582031 28.996094 C 42.285156 31.457031 44.195313 33.097656 47.105469 33.738281 C 47.691406 33.867188 48.351563 33.933594 49.078125 33.933594 C 49.546875 33.933594 50.046875 33.90625 50.566406 33.851563 L 54.109375 33.476563 C 54.660156 33.417969 55.058594 32.925781 55 32.375 C 54.941406 31.828125 54.457031 31.425781 53.902344 31.484375 L 50.359375 31.859375 C 49.25 31.976563 48.296875 31.957031 47.535156 31.785156 C 45.328125 31.300781 44.007813 30.210938 43.503906 28.453125 C 43.285156 27.675781 42.992188 26.914063 42.625 26.183594 C 40.339844 21.617188 35.613281 18.8125 30.640625 18.984375 Z M 46.925781 25.867188 C 46.796875 25.863281 46.664063 25.882813 46.535156 25.933594 C 46.019531 26.132813 45.765625 26.710938 45.964844 27.226563 C 46.222656 27.886719 46.4375 28.578125 46.605469 29.269531 C 46.714844 29.726563 47.125 30.03125 47.578125 30.03125 C 47.652344 30.03125 47.734375 30.023438 47.8125 30.003906 C 48.347656 29.875 48.679688 29.335938 48.546875 28.796875 C 48.359375 28.019531 48.117188 27.246094 47.828125 26.503906 C 47.679688 26.117188 47.316406 25.878906 46.925781 25.867188 Z M 31.21875 28.980469 C 32.230469 29.035156 33.1875 29.667969 33.683594 30.660156 C 33.765625 30.824219 33.832031 31 33.886719 31.179688 C 34.398438 32.972656 35.214844 34.582031 36.308594 36 L 29.296875 36 C 28.84375 34.984375 28.441406 33.945313 28.132813 32.878906 C 27.871094 32.027344 28 31.109375 28.488281 30.359375 C 28.992188 29.589844 29.804688 29.105469 30.78125 28.992188 C 30.925781 28.976563 31.070313 28.972656 31.21875 28.980469 Z M 31.425781 31.980469 C 31.304688 31.964844 31.175781 31.972656 31.050781 32.003906 C 30.488281 32.15625 30.171875 32.753906 30.359375 33.300781 C 30.5 33.707031 30.652344 34.105469 30.8125 34.496094 C 30.972656 34.882813 31.347656 35.113281 31.738281 35.113281 C 31.867188 35.113281 31.996094 35.089844 32.121094 35.035156 C 32.632813 34.824219 32.875 34.238281 32.660156 33.730469 C 32.511719 33.371094 32.375 33.003906 32.25 32.640625 C 32.121094 32.269531 31.796875 32.023438 31.425781 31.980469 Z M 42.964844 38.773438 C 42.574219 38.78125 42.210938 39.015625 42.058594 39.402344 C 41.851563 39.914063 42.097656 40.496094 42.609375 40.703125 C 43.496094 41.054688 44.429688 41.34375 45.382813 41.554688 C 46.539063 41.808594 47.785156 41.9375 49.089844 41.9375 C 49.25 41.9375 49.417969 41.9375 49.578125 41.933594 C 50.132813 41.917969 50.570313 41.460938 50.554688 40.90625 C 50.539063 40.355469 50.078125 39.929688 49.53125 39.933594 C 48.203125 39.964844 46.957031 39.851563 45.8125 39.601563 C 44.964844 39.414063 44.136719 39.160156 43.359375 38.84375 C 43.230469 38.792969 43.09375 38.769531 42.964844 38.773438 Z M 55.046875 39.410156 L 53.019531 39.625 C 52.472656 39.683594 52.074219 40.175781 52.132813 40.726563 C 52.1875 41.242188 52.621094 41.621094 53.125 41.621094 C 53.164063 41.621094 53.195313 41.621094 53.234375 41.613281 L 55.253906 41.402344 C 55.804688 41.34375 56.203125 40.851563 56.144531 40.300781 C 56.085938 39.75 55.589844 39.355469 55.046875 39.410156 Z M 15.765625 39.992188 C 15.636719 39.984375 15.503906 40 15.375 40.046875 C 14.851563 40.226563 14.574219 40.796875 14.753906 41.316406 C 15.332031 42.984375 16.554688 45.238281 18.027344 47.34375 C 18.222656 47.625 18.53125 47.777344 18.847656 47.777344 C 19.042969 47.777344 19.246094 47.714844 19.421875 47.59375 C 19.871094 47.28125 19.984375 46.65625 19.667969 46.203125 C 18.316406 44.265625 17.160156 42.144531 16.644531 40.660156 C 16.511719 40.269531 16.15625 40.019531 15.765625 39.992188 Z M 36.542969 40 C 36.289063 40.011719 36.035156 40.121094 35.851563 40.324219 C 35.480469 40.734375 35.511719 41.367188 35.921875 41.738281 C 39.664063 45.132813 44.507813 47 49.558594 47 C 50.109375 47 50.558594 46.554688 50.558594 46 C 50.558594 45.445313 50.109375 45 49.558594 45 C 45.003906 45 40.640625 43.316406 37.265625 40.253906 C 37.058594 40.070313 36.796875 39.984375 36.542969 40 Z M 11.644531 40.097656 C 11.515625 40.085938 11.378906 40.097656 11.25 40.136719 C 10.71875 40.300781 10.425781 40.859375 10.589844 41.386719 C 11.253906 43.527344 12.167969 45.609375 13.304688 47.578125 C 15.289063 51.015625 17.839844 53.953125 20.886719 56.300781 C 21.070313 56.441406 21.28125 56.507813 21.496094 56.507813 C 21.796875 56.507813 22.09375 56.375 22.289063 56.117188 C 22.625 55.679688 22.546875 55.054688 22.109375 54.71875 C 19.269531 52.527344 16.886719 49.789063 15.035156 46.578125 C 13.972656 44.738281 13.117188 42.792969 12.5 40.796875 C 12.378906 40.398438 12.03125 40.136719 11.644531 40.097656 Z M 26.144531 40.097656 C 26.019531 40.113281 25.890625 40.160156 25.769531 40.230469 C 25.296875 40.511719 25.140625 41.125 25.421875 41.597656 C 28.464844 46.734375 33.03125 50.925781 38.277344 53.410156 C 38.414063 53.476563 38.558594 53.507813 38.703125 53.507813 C 39.078125 53.507813 39.4375 53.296875 39.609375 52.9375 C 39.84375 52.4375 39.632813 51.839844 39.132813 51.605469 C 34.242188 49.289063 29.984375 45.375 27.140625 40.578125 C 26.929688 40.222656 26.53125 40.046875 26.144531 40.097656 Z M 31.25 40.105469 C 30.996094 40.066406 30.726563 40.121094 30.503906 40.285156 C 30.058594 40.613281 29.964844 41.238281 30.292969 41.683594 C 31.007813 42.65625 31.792969 43.589844 32.628906 44.453125 C 32.824219 44.65625 33.085938 44.761719 33.347656 44.761719 C 33.597656 44.761719 33.847656 44.664063 34.042969 44.480469 C 34.441406 44.09375 34.449219 43.460938 34.066406 43.0625 C 33.292969 42.261719 32.566406 41.402344 31.902344 40.5 C 31.738281 40.277344 31.5 40.140625 31.25 40.105469 Z M 21.21875 40.128906 C 21.089844 40.132813 20.957031 40.164063 20.832031 40.21875 C 20.328125 40.445313 20.101563 41.035156 20.328125 41.539063 C 24.160156 50.097656 31.058594 56.007813 40.277344 58.628906 C 40.367188 58.65625 40.460938 58.667969 40.550781 58.667969 C 40.988281 58.667969 41.390625 58.378906 41.515625 57.9375 C 41.664063 57.410156 41.355469 56.855469 40.824219 56.703125 C 32.191406 54.25 25.738281 48.726563 22.152344 40.722656 C 21.984375 40.34375 21.609375 40.121094 21.21875 40.128906 Z M 35.699219 45.003906 C 35.445313 45.035156 35.199219 45.160156 35.03125 45.375 C 34.683594 45.808594 34.757813 46.4375 35.191406 46.78125 C 39.140625 49.917969 43.707031 51.714844 48.402344 51.96875 C 48.421875 51.972656 48.4375 51.96875 48.457031 51.96875 C 48.984375 51.96875 49.425781 51.558594 49.453125 51.027344 C 49.484375 50.472656 49.0625 50 48.511719 49.972656 C 44.230469 49.738281 40.054688 48.09375 36.4375 45.21875 C 36.21875 45.046875 35.953125 44.976563 35.699219 45.003906 Z M 21.277344 48.753906 C 21.023438 48.746094 20.761719 48.835938 20.5625 49.023438 C 20.15625 49.398438 20.132813 50.035156 20.511719 50.4375 C 20.910156 50.871094 21.324219 51.28125 21.75 51.671875 C 21.945313 51.851563 22.1875 51.941406 22.433594 51.941406 C 22.699219 51.941406 22.96875 51.835938 23.164063 51.621094 C 23.539063 51.214844 23.515625 50.582031 23.109375 50.207031 C 22.71875 49.847656 22.339844 49.46875 21.972656 49.074219 C 21.785156 48.871094 21.53125 48.765625 21.277344 48.753906 Z M 5 52 C 4.449219 52 4 52.445313 4 53 L 4 59 C 4 59.554688 4.449219 60 5 60 L 11 60 C 11.550781 60 12 59.554688 12 59 C 12 58.445313 11.550781 58 11 58 L 6 58 L 6 53 C 6 52.445313 5.550781 52 5 52 Z M 59 52 C 58.449219 52 58 52.445313 58 53 L 58 58 L 53 58 C 52.449219 58 52 58.445313 52 59 C 52 59.554688 52.449219 60 53 60 L 59 60 C 59.550781 60 60 59.554688 60 59 L 60 53 C 60 52.445313 59.550781 52 59 52 Z M 25.246094 52.234375 C 24.992188 52.191406 24.722656 52.238281 24.496094 52.394531 C 24.039063 52.710938 23.925781 53.332031 24.238281 53.785156 C 25.277344 55.289063 27.421875 56.714844 27.515625 56.773438 C 27.683594 56.882813 27.875 56.9375 28.0625 56.9375 C 28.386719 56.9375 28.707031 56.777344 28.898438 56.488281 C 29.203125 56.023438 29.074219 55.40625 28.613281 55.105469 C 28.085938 54.753906 26.566406 53.636719 25.886719 52.652344 C 25.730469 52.425781 25.496094 52.28125 25.246094 52.234375 Z M 44.046875 53.429688 C 43.660156 53.5 43.339844 53.792969 43.25 54.195313 C 43.128906 54.734375 43.46875 55.269531 44.007813 55.390625 C 44.890625 55.585938 45.792969 55.734375 46.6875 55.835938 C 46.726563 55.839844 46.765625 55.84375 46.800781 55.84375 C 47.304688 55.84375 47.738281 55.464844 47.796875 54.953125 C 47.859375 54.40625 47.464844 53.910156 46.914063 53.847656 C 46.089844 53.753906 45.257813 53.617188 44.441406 53.4375 C 44.304688 53.40625 44.171875 53.40625 44.046875 53.429688 Z "></path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endif; ?>

<? /*
<div class="bx-system-auth-form">

    <? if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) ShowMessage($arResult['ERROR_MESSAGE']); ?>

    <? if ($arResult["FORM_TYPE"] == "login"): ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
            <? if ($arResult["BACKURL"] <> ''): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <?endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <? endforeach ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>
            <table width="95%">
                <tr>
                    <td colspan="2">
                        <?= GetMessage("AUTH_LOGIN") ?>:<br/>
                        <input type="text" name="USER_LOGIN" maxlength="50" value="" size="17"/>
                        <script>
                            BX.ready(function () {
                                var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                                if (loginCookie) {
                                    var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                    var loginInput = form.elements["USER_LOGIN"];
                                    loginInput.value = loginCookie;
                                }
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?= GetMessage("AUTH_PASSWORD") ?>:<br/>
                        <input type="password" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off"/>
                        <?
                        if ($arResult["SECURE_AUTH"]): ?>
                            <span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>" title="<?
                            echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                            <noscript>
				<span class="bx-auth-secure" title="<?
                echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                            </noscript>
                            <script type="text/javascript">
                                document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                            </script>
                        <?endif ?>
                    </td>
                </tr>
                <?
                if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                    <tr>
                        <td valign="top"><input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"/>
                        </td>
                        <td width="100%"><label for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><?
                                echo GetMessage("AUTH_REMEMBER_SHORT") ?></label></td>
                    </tr>
                <?endif ?>
                <?
                if ($arResult["CAPTCHA_CODE"]): ?>
                    <tr>
                        <td colspan="2">
                            <?
                            echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<?
                            echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?
                            echo $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></td>
                    </tr>
                <?endif ?>
                <tr>
                    <td colspan="2"><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
                    </td>
                </tr>
                <?
                if ($arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
                    <tr>
                        <td colspan="2">
                            <noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
                                        rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
                            <br/></td>
                    </tr>
                <?endif ?>

                <tr>
                    <td colspan="2">
                        <noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
                                    rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
                    </td>
                </tr>
                <?
                if ($arResult["AUTH_SERVICES"]): ?>
                    <tr>
                        <td colspan="2">
                            <div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
                            <?
                            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                                array(
                                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                    "SUFFIX" => "form",
                                ),
                                $component,
                                array("HIDE_ICONS" => "Y")
                            );
                            ?>
                        </td>
                    </tr>
                <?endif ?>
            </table>
        </form>

<!--        --><?//
//        if ($arResult["AUTH_SERVICES"]): ?>
<!--            --><?//
//            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
//                array(
//                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
//                    "AUTH_URL" => $arResult["AUTH_URL"],
//                    "POST" => $arResult["POST"],
//                    "POPUP" => "Y",
//                    "SUFFIX" => "form",
//                ),
//                $component,
//                array("HIDE_ICONS" => "Y")
//            );
//            ?>
<!--        --><?//endif ?>

    <?elseif ($arResult["FORM_TYPE"] == "otp"):
        ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>">
            <? if ($arResult["BACKURL"] <> ''):?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="OTP"/>
            <table width="95%">
                <tr>
                    <td colspan="2">
                        <? echo GetMessage("auth_form_comp_otp") ?><br/>
                        <input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off"/></td>
                </tr>
                <? if ($arResult["CAPTCHA_CODE"]):?>
                    <tr>
                        <td colspan="2">
                            <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                 width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></td>
                    </tr>
                <? endif ?>
                <? if ($arResult["REMEMBER_OTP"] == "Y"):?>
                    <tr>
                        <td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y"/>
                        </td>
                        <td width="100%"><label for="OTP_REMEMBER_frm"
                                                title="<? echo GetMessage("auth_form_comp_otp_remember_title") ?>"><? echo GetMessage("auth_form_comp_otp_remember") ?></label>
                        </td>
                    </tr>
                <? endif ?>
                <tr>
                    <td colspan="2"><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <noindex><a href="<?= $arResult["AUTH_LOGIN_URL"] ?>"
                                    rel="nofollow"><? echo GetMessage("auth_form_comp_auth") ?></a></noindex>
                        <br/></td>
                </tr>
            </table>
        </form>

    <? else: ?>

        <form action="<?= $arResult["AUTH_URL"] ?>">
            <table width="95%">
                <tr>
                    <td align="center">
                        <?= $arResult["USER_NAME"] ?><br/>
                        [<?= $arResult["USER_LOGIN"] ?>]<br/>
                        <a href="<?= $arResult["PROFILE_URL"] ?>"
                           title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <? foreach ($arResult["GET"] as $key => $value): ?>
                            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                        <? endforeach ?>
                        <input type="hidden" name="logout" value="yes"/>
                        <input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
                    </td>
                </tr>
            </table>
        </form>
    <? endif ?>
</div>
