class Control extends Executor {

    save_limit (modal_id) {
        let limit = $('#input_limit').val();
        if (Number(limit) < 10) {
            return "toast:error".exec("Лимит не может быть меньше 10!");
        }
        let btn = $(this.target);
        btn.attr('disabled', true);
        jax.control.set_online_limit(limit).then(() => {
            "modal:hide".exec(modal_id);
        }).catch(() => {
            btn.removeAttr('disabled');
        });
    }

    make_vote (modal_id) {
        let city_id = $('#input_city_id').val();
        if (Number(city_id) < 1) {
            return "toast:error".exec("Для начала необходимо выбрать город!");
        }
        let btn = $(this.target);
        btn.attr('disabled', true);
        jax.control.make_vote(city_id).then(() => {
            "modal:hide".exec(modal_id);
        }).catch(() => {
            btn.removeAttr('disabled');
        });
    }

    reload_dashboard () {
        if (ljs.help.string_is('*/dashboard', location.pathname)) {
            "doc::reload".exec();
        }
    }

    set_counts (users, online, online_peck, idea, vocals, visual, total, votes, max_online) {
        $('.total_user_count').html(` ${users} `);
        $('.total_online_count').html(` ${online} `);
        $('.total_online_peck_count').html(` ${online_peck} `);

        $('.idented_badge_idea').html(` ${idea} `);
        $('.idented_badge_vocals').html(` ${vocals} `);
        $('.idented_badge_visual').html(` ${visual} `);
        $('.idented_badge_total_calc').html(` ${total} `);
        $('.idented_badge_vote_count').html(` ${votes} `);

        if (Number(online) >= Number(max_online)) {
            $('.limit_over').removeAttr('style');
        } else {
            $('.limit_over').hide();
        }
    }

    static __name () {

        return "control";
    }
}

module.exports = Control;
