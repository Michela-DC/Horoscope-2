<template>
    <div class="horoscope-card mb-4 ">
        <div class="date-wrapper">
            <span class="info-name text-secondary">Publication date: </span>
            <span class="info-content">{{formatDate(horoscopeCard.date)}}</span>
        </div>

        <div class="sign-wrapper">
            <span class="info-name text-secondary">Sign: </span>
            <span class="info-content text-danger">{{horoscopeCard.sign.sign}}</span>
        </div>

        <div class="text-wrapper">
            <span class="info-name text-secondary">Today horoscope says: </span>
            <span class="info-content">{{horoscopeCard.text}}</span>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

    export default {
        props: {
            horoscopeCard: {
                type: Object,
                required: false,
            }
        },

        methods: {
            formatDate(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
        }
    }
</script>

<style lang="scss" scoped>

.sign{
    color: red;
}

</style>