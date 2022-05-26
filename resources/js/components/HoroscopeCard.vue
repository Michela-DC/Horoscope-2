<template>
    <div class="horoscope-card col-3 mb-5 rounded">
        <div class="date-wrapper pt-3 px-4">
            <span class="info-name">Publication date: </span>
            <span class="info-content">{{formatDate(horoscopeCard.date)}}</span>
        </div>

        <div class="sign-wrapper px-4 pb-3">
            <span class="info-name">Sign: </span>
            <span class="info-content sign">{{horoscopeCard.sign.sign}} {{horoscopeCard.sign.sign_icon}}</span>
        </div>

        <div class="text-wrapper px-4 py-3">
            <div class="info-content">{{horoscopeCard.text}}</div>
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

.horoscope-card{
    background-color: white;
    border: 3px solid #ffd199;
    // box-shadow: 0px 0px 4px #e69500;
    padding: 0;

    .date-wrapper, .sign-wrapper{
        background-color: #ffd199;

        .info-name{
            color: crimson;
        }
    }

    .text-wrapper{
        background-color: white;
    }
}

@media screen and (min-width: 769px) and (max-width: 992px) {
    .horoscope-card{
        width: 48%;
    }
}

@media screen and (max-width: 768px) {
    .horoscope-card{
        width: 90%;
    }
}

</style>