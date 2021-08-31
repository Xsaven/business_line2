<template>
    <div class="add_message">
        <form action="">
            <textarea name="" placeholder="Написать комментарий"></textarea>

            <button type="submit" class="submit_btn">
                <v-icon icon="ic_send" />
            </button>

            <v-home-smiles-commentary />

            <v-home-field-set-commentary />
        </form>
    </div>
</template>

<script>
    export default {
        name: "v-home-make-commentary",
        props: {},
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
