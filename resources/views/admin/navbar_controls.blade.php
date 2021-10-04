<li class="nav-item">
    @if($cfg['free_chat'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment_slash()->_()->text(' Модерация комментариев: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment()->_()->text(' Модерация комментариев: Вкл'); !!}
    @endif
</li>

<li class="nav-item">
    @if(!$cfg['osm'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.commentaries_control.switch_commentary')->i()->icon_gift()->_()->text(' Режим магазина: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.commentaries_control.switch_commentary')->i()->icon_gift()->_()->text(' Режим магазина: Вкл'); !!}
    @endif
</li>

<li class="nav-item">
    @if(isset($cfg['support']) && !$cfg['support'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.commentaries_control.switch_support')->i()->icon('fas fa-phone-square-alt')->_()->text(' Поддержка: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.commentaries_control.switch_support')->i()->icon('fas fa-phone-square-alt')->_()->text(' Поддержка: Вкл'); !!}
    @endif
</li>
