<template>
    <div class="container p-5">
        <div class="searchbar d-flex justify-content-center mb-4">
            <form class="form-inline w-50 d-flex">
                <input v-model="search" class="form-control mr-sm-2 w-70" type="date" aria-label="Search" name="date">
            </form>
        </div>

        <div>
            <HoroscopeCard v-for="horoscope in horoscopes" :key="horoscope.id" :horoscopeCard="horoscope"/>
        </div>

        <div class="container w-50">
            <ul id="itemList" class="myPagination d-flex align-center">
                <li class="mx-3" style="cursor:pointer" @click="currentPage = n" v-for="n in lastPage" :key="n">{{ n }}</li>
            </ul>
        </div>

    </div>
</template>

<script>
import HoroscopeCard from '../components/HoroscopeCard.vue'

    export default {
        components: {
            HoroscopeCard,
        },

        data() {
            return {
                horoscopes: [],
                lastPage: 0,
                currentPage: 1,
                search: "",
            }
        },

        watch: {
            currentPage() {
                this.fetchHoroscopes();
            },
            search() {
                this.fetchHoroscopes();
            }
        },

        methods: {
            fetchHoroscopes() { 

                axios.get('/api/horoscope', {
                    params: { 
                        page: this.currentPage,
                        search: this.search
                    }
                }) 
                .then( res => {

                    this.horoscopes = res.data.horoscopes.data;
                    // console.log(this.horoscopes);
                    // this.currentPage = res.data.horoscopes.current_page;
                    // console.log(this.currentPage);
                    this.lastPage = res.data.horoscopes.last_page;
                    // console.log(this.lastPage);
                    
                })
                .catch( error => {
                    console.warn(error);
                })
            },

            filteredHoroscopes (sign){
                return this.horoscopes.filter((horoscope)=> {
                    return horoscope.sign.match(sign);
                })
            },

        },

        computed: {
            filterBySign: function(){
                let day = this.search.substr(0,2);
                let month = this.search.substr(3,2);
                console.log(day, month)

                if ((day>=21 && month === '03') || (day<=19 && month === '04')){
                    console.log('aries')
                    return this.filteredHoroscopes('aries');
                }

                if ((day>=20 && month === '04') || (day<=20 && month === '05')){
                    console.log('taurus')
                    return this.filteredHoroscopes('taurus');

                }

                if ((day>=21 && month === '05') || (day<=21 && month === '06')){
                    console.log('gemini')
                    return this.filteredHoroscopes('gemini');

                }

                if ((day>=22 && month === '06') || (day<=22 && month === '07')){
                    console.log('cancer')
                    return this.filteredHoroscopes('cancer');

                }

                if ((day>=23 && month === '07') || (day<=22 && month === '08')){
                    console.log('leo')
                    return this.filteredHoroscopes('leo');

                }
            },
        },

        mounted() {
            // una volta montato il componente, verrà chiamata la funzione che fa l'axios.get
            this.fetchHoroscopes();
        }
    }
</script>

<style lang="scss" scoped>

.myPagination{
    overflow-x: scroll;
}

</style>