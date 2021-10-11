let resources = require('./lar_resources.json');
let map = require('lodash/map');

const load = () => {

    //ljs.routeCollection(require('./route.json'))

    window.setHeight = (className) => {
        let maxheight = 0

        className.each(function () {
            const elHeight = $(this).outerWidth()

            if (elHeight > maxheight) maxheight = elHeight
        })

        className.outerWidth(maxheight)
    }

    $(window).resize(() => {

        $('.task_info .performance .quiz .step .height').height('auto')

        setHeight($('.task_info .performance .quiz .step .height'));
    })

    let state_watchers = 'state_watchers' in resources ? resources.state_watchers : [];
    let executors = 'executors' in resources ? resources.executors : [];
    let vue_components = 'vue_components' in resources ? resources.vue_components : {};

    map(state_watchers, (watcher) => {
        ljs.stateWatcher(require(`./watchers/${watcher}`));
    });
    map(executors, (executor) => {
        ljs.regExec(require(`./executors/${executor}`));
    });
    if (ljs.vue !== undefined) {
        map(vue_components, (vue, name) => {
            ljs.vue.component(name, require(`./components/${vue}`).default);
        });
    }
    if (process.env.NODE_ENV === 'development') {
        ljs.vue.config.productionTip = false
        ljs.vue.config.devtools = true
    }
    ljs.vue.directive('input-mask', {
        bind: function(el) {
            // new Inputmask({
            //     mask: '+7 (999) 999-99-99',
            // }).mask(el);
            //return el;
        },
    });
    require('./components/Components')(ljs.vue);
};

const methods = require('./lar_methods.js');

const applyScripts = ($root = $(document)) => {

    require('./lar_scripts.js')($root, methods);
};

document.addEventListener('ljs:nav:complete', (details) => {

    applyScripts($(ljs.config('pjax-container')));
});

let ins = require('./lar_instance.js');
if (window.ljs === undefined) { document.addEventListener("ljs:load", () => {ljs.method=methods; load(); ins(methods);applyScripts();}); }
else {ljs.method=methods; load(); ins(methods);applyScripts(); }
