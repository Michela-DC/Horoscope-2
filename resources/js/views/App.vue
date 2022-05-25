<template>
    <div>
        <Header/>
        <Horoscopes/>
    </div>
</template>

<script>
    import Horoscopes from './Horoscopes.vue';
    import Header from '../components/Header.vue'

    export default {
        components: {
            Header,
            Horoscopes,
        }
    }
</script>

<style lang="scss" scoped>

</style>