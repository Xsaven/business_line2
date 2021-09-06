<template>
    <footer class="big_margin">
        <div class="cont row">
            <div class="copyright">&copy; ГК «Деловые Линии», 2001–2021</div>

            <div class="links">
                <div v-if="no_faq_page && user"><a href="/faq">FAQ</a></div>
                <div><a href="/support">Техническая поддержка</a></div>
            </div>
        </div>

        <img data-src="/images/bg_footer2.svg" alt="" class="lozad bg bg2">
    </footer>
</template>

<script>
export default {
    $sync: ['user'],
    name: "v-footer",
    props: {},
    data () {
        return {
            user: {}
        };
    },
    mounted () {},
    computed: {
        no_faq_page () {
            return this.ljs.cfg('name') !== 'faq';
        }
    },
    watch: {},
    methods: {}
}
</script>
