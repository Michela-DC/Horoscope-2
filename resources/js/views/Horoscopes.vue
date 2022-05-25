<template>
    <div class="container">
        <div class="searchbar">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div v-for="horoscope in horoscopes" :key="horoscope.id">
            <div class="date">
                <span>Date: </span>
                {{horoscope.date}}
            </div>

            <div class="sign">
                <span>Sign: </span>
                {{horoscope.sign}}
            </div>

            <div class="text">
                {{horoscope.text}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                horoscopes: [],
            }
        },

        methods: {
            fetchHoroscopes() { 

                axios.get('/api/horoscope')
                .then( res => {
                    // const {horoscopes} = res.data;
                    console.log(res.data);
                    this.horoscopes = res.data.horoscopes.data;
                    console.log(this.horoscopes);
                    
                })
                .catch( error => {
                    console.warn(error);
                })
            }
        },

        mounted() {
            // una volta montato il componente, verrà chiamata la funzione che fa l'axios.get
            this.fetchHoroscopes();
        }
    }
</script>

<style lang="scss" scoped>

</style>