{{--<li class="nav-item">--}}
{{--    @if($cfg['free_chat'])--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--                ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment_slash()->_()->text(' Модерация комментариев: Выкл'); !!}--}}
{{--    @else--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--            ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment()->_()->text(' Модерация комментариев: Вкл'); !!}--}}
{{--    @endif--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--    @if(!$cfg['osm'])--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--                ->on_click('jax.commentaries_control.switch_commentary')->i()->icon_gift()->_()->text(' Режим магазина: Выкл'); !!}--}}
{{--    @else--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--            ->on_click('jax.commentaries_control.switch_commentary')->i()->icon_gift()->_()->text(' Режим магазина: Вкл'); !!}--}}
{{--    @endif--}}
{{--</li>--}}

<li class="nav-item">
    @if(isset($cfg['support']) && !$cfg['support'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.commentaries_control.switch_support')->i()->icon('fas fa-phone-square-alt')->_()->text(' Поддержка: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.commentaries_control.switch_support')->i()->icon('fas fa-phone-square-alt')->_()->text(' Поддержка: Вкл'); !!}
    @endif
</li>

<li class="nav-item">
    @if(isset($cfg['banner']) && !$cfg['banner'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.home_control.switch_banner')->i()->icon('far fa-image')->_()->text(' Баннер на главной: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.home_control.switch_banner')->i()->icon('fas fa-image')->_()->text(' Баннер на главной: Вкл'); !!}
    @endif
</li>

{{--<li class="nav-item">--}}
{{--    @if(isset($cfg['stickers']) && !$cfg['stickers'])--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--                ->on_click('jax.commentaries_control.switch_stickers')->i()->icon('fas fa-compact-disc')->_()->text(' Стикеры в чате: Выкл'); !!}--}}
{{--    @else--}}
{{--        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')--}}
{{--            ->on_click('jax.commentaries_control.switch_stickers')->i()->icon('fas fa-compact-disc')->_()->text(' Стикеры в чате: Вкл'); !!}--}}
{{--    @endif--}}
{{--</li>--}}
