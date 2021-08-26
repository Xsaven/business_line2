let resources = require('./lar_resources.json');
let map = require('lodash/map');

const load = () => {

    //ljs.routeCollection(require('./route.json'))

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
    require('./components/Components')(ljs.vue);

    setTimeout(() => {
        let channel = new window.EchoWrapper({namespace: 'app.events.ws'});

        // let connection = ljs.echo.private(`App.Models.Admin.${window.state.admin.id}`)
        //     .notification((notify) => {
        //
        //         let status = 'status' in notify ? notify.status : 'info';
        //         let text = 'text' in notify ? notify.text : '';
        //         let title = 'title' in notify ? notify.title : '';
        //
        //         return `toast:${status}`.exec(text, title);
        //     });

        channel.private(`exec`)
            .listen('all_admin_exec',({exec}) => {
                ljs.exec(exec);
            });

        channel.private(`App.Models.Admin.${window.state.admin.id}`)
            .listen('admin_exec', ({exec}) => {
                ljs.exec(exec);
            });
    }, 500);
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
