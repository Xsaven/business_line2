<template>
    <v-layout>
        <section class="about_info">
            <div class="cont row">
                <div class="data">
                    <div class="title">{{room.title}}</div>

                    <div class="desc" v-html="room.description"></div>
                </div>


                <div class="video">
                    <div class="views" v-if="room.state === 'translation'">
                        <v-icon icon="ic_view" />
                        <span>{{o}}</span>
                    </div>

                    <a href="/" class="link">
                        <v-icon icon="ic_video_play" />

                        <div class="info" v-if="room.video_title || room.video_info">
                            <div class="name" v-if="room.video_title"><span>{{room.video_title}}</span></div>
                            <div class="type" v-if="room.video_info"><span>{{room.video_info}}</span></div>
                        </div>
                    </a>
                </div>
                <v-home-commentaries v-if="room.state === 'translation'" :commentaries="commentaries" />
            </div>
        </section>
        <section class="directions">
            <div class="cont">
                <div class="title">Направления участия</div>

                <div class="row_wrap">
                    <div class="row" v-if="directions">
                        <a :href="`/direction/${directions[0].slug}`" class="item">
                            <div class="name">{{directions[0].name}}</div>

                            <div class="desc">{{directions[0].description}}</div>

                            <img data-src="/images/bg_directions_item1.svg" alt="" class="bg lozad">
                        </a>

                        <a :href="`/direction/${directions[1].slug}`" class="item">
                            <div class="name">{{directions[1].name}}</div>

                            <div class="desc">{{directions[1].description}}</div>

                            <img data-src="/images/bg_directions_item2.svg" alt="" class="bg2 lozad">
                            <img data-src="/images/bg_directions_item3.svg" alt="" class="bg3 lozad">
                        </a>

                        <a :href="`/direction/${directions[2].slug}`" class="item">
                            <div class="name">{{directions[2].name}}</div>

                            <div class="desc">{{directions[2].description}}</div>

                            <img data-src="/images/bg_directions_item4.svg" alt="" class="bg4 lozad">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </v-layout>
</template>

<script>
    export default {
        $sync: ['user', 'directions'],
        $exec: ['setOnline'],
        name: "pages_home",
        props: {
            commentaries: {required:true},
            room: {required:true},
            online: {required:true, type:Number}
        },
        data () {
            return {
                user: {},
                directions: {},
                o: this.online,
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            setOnline (val) {
                this.o = val;
            }
        }
    }
</script>
