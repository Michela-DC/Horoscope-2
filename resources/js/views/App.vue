<template>
    <div>
        <h1 class="main-title text-center mb-5">Welcome to your daily horoscope!</h1>
        <Horoscopes/>
    </div>
</template>

<script>
    import Horoscopes from './Horoscopes.vue';

    export default {
        components: {
            Horoscopes,
        }
    }
</script>

<style lang="scss" scoped>
    .main-title {
        background-image: linear-gradient(60deg, #E21143, #FFB03A);
        background-clip: text;
        color: transparent;
    }
</style>