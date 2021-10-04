<template>
    <div class="field" ref="d">
        <input type="text" v-model="q" class="input autocomplete" :placeholder="placeholder" @click="show=!show" @keyup="show=true">

        <div class="fieldset" style="display: block !important;" v-if="show">
            <template v-for="(option, index) in list">
                <div :key="`option_${index}`" @click.stop.prevent="click(option.id)">{{option.name}}</div>
            </template>
        </div>

        <div class="arrow"></div>
    </div>
</template>

<script>
    import find from 'lodash/find';
    export default {
        name: "v-select-autocomplite",
        props: {
            handle: {required: true},
            value: {},
            placeholder: {}
        },
        data () {
            return {
                q: "",
                list: [],
                show: false
            };
        },
        mounted () {
            this.load(true);
            document.addEventListener('click', this.doc_click.bind(this));
        },
        beforeDestroy() {
            document.removeEventListener('click', this.doc_click.bind(this));
        },
        computed: {
            to_jax () {
                return jax[this.handle].params({q: this.q, id: this.value ? this.value : null});
            },
            selected () {
                return !!this.list.filter((i) => i.name === this.q).length;
            }
        },
        watch: {
            q () {
                ljs.onetime(this.load.bind(this), 200);
                this.input_event();
            },
            value () {
                ljs.onetime(this.load.bind(this), 201);
            }
        },
        methods: {
            doc_click (e) {
                let target = e.target;
                let isChild = false;
                while(target = target.parentNode)
                {
                    if(target === this.$refs.d)
                        isChild = true;
                }
                if (!isChild) {
                    this.show = false;
                }
            },
            click (id) {
                this.show = false;
                this.set_value(id);
            },
            load (first) {
                this.input_event();
                this.to_jax().then(({data}) => {
                    this.list = data;
                    this.input_event();
                    if (first && this.value) {
                        this.set_value(this.value);
                    }
                });
            },
            set_value (id) {
                const q = find(this.list, ['id', id ? id : this.value])
                if (q) this.q = q.name;
                this.input_event();
            },
            input_event () {
                if (this.selected) {
                    let list = this.list.filter((i) => i.name === this.q)[0];
                    this.$emit('input', list.id);
                } else if (!this.value) {
                    this.$emit('input', null);
                }
            }
        }
    }
</script>
