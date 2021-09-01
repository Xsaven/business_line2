class DataUpdater extends Executor {

    __invoke () {

        jax.user.update().then(({data}) => {
            state.user = data
        });
    }

    new_notifications () {

        jax.user.new_notifications().then(({data}) => {
            state.new_notifications = data
        });
    }

    home_notifications () {

        state.update_home_notifications ?
            state.update_home_notifications() : null;
    }

    commentary_id (id) {

        let key = `comment_update_${id}`;
        if (state.has(key)) {
            state[key]();
        }
    }

    add_commentary_child_id (id, child_id) {

        let key = `comment_add_child_${id}`;
        if (state.has(key)) {
            state[key](child_id);
        }
    }

    drop_commentary_child_id (id, child_id) {

        let key = `comment_drop_child_${id}`;
        if (state.has(key)) {
            state[key](child_id);
        }
    }

    drop_commentary_home_id (id) {

        state.drop_child(id);
    }

    add_comment_to_home (id) {
        state.add_to_child(id);
    }

    static __name () {

        return "update";
    }
}

module.exports = DataUpdater;
