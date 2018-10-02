<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// * SEO - - -
$APPLICATION->SetTitle("О магазине");
// * END ?>

<div class="container">
	<div class="container-main">
		<div class="container-main-aside">
			<div class="user__aside" data-js-resize="user__aside__menu" data-size="md">
                <?if(CUser::IsAuthorized()):?>
                    <i>&mdash; Здраствуйте</i><br/>
                    <?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?><br/>
                    <img src="/путь_к_баннеру.png"/>
                <?else:?>
                    <div class="user__aside__menu">
                        <a href="/user/registration/"><span>Регистрация</span></a>
                        <a href="/user/login/"><span>Логин</span></a>
                        <a href="/user/backlogin/"><span>Забыли пароль</span></a>
                    </div>
                <?endif;?>
			</div>
		</div>
		<div class="container-main-content">
            <div class="user__login__form">
                <div class="form-title">
                    <span>Ваш профиль</span>
                </div>
                <form class="form" action="" method="post" enctype="multipart/form-data" data-js-form-valid="user.loginValid">
                    <div class="user__login__form__error" data-error=""></div>

                    <div class="form-group is-in-line is-in-line-2 is-offset">
                        <div class="form-group-title">Контакты:</div>
                        <div class="form-input">
                            <input type="text" name="PASSWORD" class="form-input-control" placeholder="Имя">
                        </div>
                        <div class="form-input">
                            <input type="text" name="PASSWORD" class="form-input-control" placeholder="Телефон">
                        </div>
                    </div>
                    <div class="form-group is-in-line is-error is-offset">
                        <div class="form-group-title">Почтовый индекс:</div>
                        <div class="form-input">
                            <input type="text" name="PASSWORD" class="form-input-control" placeholder="...">
                            <div class="form-input-error"><span>sds</span></div>
                        </div>
                    </div>
                    <div class="form-group is-in-line is-offset">
                        <div class="form-group-title">Адрес доставки:</div>
                        <div class="form-input">
                            <input type="text" name="PASSWORD" class="form-input-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group is-in-line is-offset">
                        <div class="form-group-title"></div>
                        <div class="form-input">
                            <div class="form-group-text-mini">
                                <svg role="img" class="icon-svg" style="width: 10px; top: -1px;">
                                    <use xlink:href="#icon-lock"></use>
                                </svg>
                                Регистрируясь, вы принимаете условия публичной оферты и даете согласие на обработку своих персональных данных</div>
                        </div>
                    </div>
                    <div class="form-group is-in-line is-in-line-2">
                        <div class="form-group-title"></div>
                        <div class="form-input">
                            <button type="submit" class="btn btn-primary" data-btn="">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
		<div class="col-1 col-md-24">
			<div data-js-resize-after="user__aside__menu"></div>
		</div>
	</div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
