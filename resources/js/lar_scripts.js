/**
 * Here the scripts will be executed every time the
 * page is loaded and the location state changes.
 * @param $root
 * @param $methods
 */
module.exports = ($root, $methods) => {

    // $root.find('select').niceSelect();
    // console.log($root);

    window.onfocus = () => {
        if (ljs.cfg('name') !== 'login' && ljs.cfg('name') !== 'password.reset') {

            jax.user.ping(1).then(({result}) => {
                if (!result) {
                    //"doc::reload".exec();
                }
            }).catch(() => {
                //"doc::reload".exec();
            });
        }
    };

    const observer = lozad('#dirty_content .lozad', {
        rootMargin: '200px 0px',
        threshold: 0,
        loaded: (el) => el.classList.add('loaded')
    });
    observer.observe();
};
