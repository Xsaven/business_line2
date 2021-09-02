/**
 * Here scripts will be executed every time the page is loaded.
 * @param $methods
 */
module.exports = ($methods) => {

    //credit to @Bill Criswell for this filter
    ljs.vue.filter('truncate', function (text, stop, clamp) {
        return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
    })
};
