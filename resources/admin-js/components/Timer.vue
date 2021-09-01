<template>
    <span v-if="!template">
        <slot :ss="seconds" :mm="minutes" :hh="hours" :dd="days"></slot>
    </span>
    <span v-else v-html="text"></span>
</template>

<script>
    export default {
        name: "timer",
        props: {
            template: {
                type: String,
                default: null
            },
            until: Number,
            cb: {
                default: () => {}
            },
            tick: {
                default: () => {}
            },
            command: String
        },
        data () {
            return {
                text: this.tpl(0,0,0,0),
                timer_id: null,
                seconds: 0,
                minutes: 0,
                hours: 0,
                days: 0
            };
        },
        mounted () {
            this.calc(false);
            this.timer_id = setInterval(() => {
                this.calc();
            }, 1000);
        },
        unmount () {
            clearInterval(this.timer_id);
        },
        methods: {
            calc (timer_click = true) {
                let now = new Date().getTime();
                let distance = (this.until * 1000) - now;
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if (seconds === 0 && minutes === 0 && hours === 0 && days === 0) {
                    this.text = this.tpl(0,0,0,0);
                    if (timer_click && this.command) {
                        String(this.command).exec();
                    }
                    if (timer_click && this.cb) {
                        this.cb();
                    }
                    if (timer_click && this.tick) {
                        this.tick(0,0,0,0,distance);
                    }
                } else if (distance > 0) {
                    this.text = this.tpl(seconds,minutes,hours,days);
                    if (this.tick) {
                        this.tick(seconds,minutes,hours,days,distance);
                    }
                }
            },
            tpl (seconds, minutes, hours, days) {

                this.seconds = seconds < 10 ? `0${seconds}` : seconds;
                this.minutes = minutes < 10 ? `0${minutes}` : minutes;
                this.hours = hours < 10 ? `0${hours}` : hours;
                this.days = days < 10 ? `0${days}` : days;

                if (!this.template) {

                    return "";
                }

                return this.template.replace('SS',this.seconds)
                    .replace('MM',this.minutes)
                    .replace('HH',this.hours)
                    .replace('DD',this.days);
            }
        }
    }
</script>