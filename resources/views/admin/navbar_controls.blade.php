<li class="nav-item">
    @if($cfg['free_chat'])
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
                ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment_slash()->_()->text(' Модерация комментариев: Выкл'); !!}
    @else
        {!! \Lar\Layout\Tags\A::create(['nav-link'])->setHref('javascript:void(0)')
            ->on_click('jax.commentaries_control.switch_moderation')->i()->icon_comment()->_()->text(' Модерация комментариев: Вкл'); !!}
    @endif
</li>
