<template>
    <footer class="big_margin">
        <div class="cont row">
            <div class="copyright">&copy; ГК «Деловые Линии», 2001–2022</div>

            <div class="links">
                <div v-if="no_faq_page && user"><a href="/faq">FAQ</a></div>
                <div v-if="Number(support)"><a href="/support">Техническая поддержка</a></div>
            </div>
        </div>

        <img data-src="/images/footer-decor.png" alt="" class="lozad bg bg2">
    </footer>
</template>

<script>
export default {
    $sync: ['user', 'support'],
    name: "v-footer",
    props: {},
    data () {
        return {
            user: {},
            support: 1
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
