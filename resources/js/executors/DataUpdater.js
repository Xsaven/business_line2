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

    static __name () {

        return "update";
    }
}

module.exports = DataUpdater;
