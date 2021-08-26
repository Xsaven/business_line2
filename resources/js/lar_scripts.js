/**
 * Here the scripts will be executed every time the
 * page is loaded and the location state changes.
 * @param $root
 * @param $methods
 */
module.exports = ($root, $methods) => {

    window.onfocus = () => {
        if (ljs.cfg('name') !== 'login') {

            jax.user.ping().then(({result}) => {
                if (!result) {
                    "doc::reload".exec();
                }
            }).catch(() => {
                "doc::reload".exec();
            });
        }
    };
};
