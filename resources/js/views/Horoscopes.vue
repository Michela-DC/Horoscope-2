<template>
    <div class="container d-flex flex-column align-items-center">

        <form class="form-inline search-row mb-5">
            <label for="search-date" class="search-label mb-3">Insert your date of birth: </label>
            <input id="search-date" v-model="search" class="form-control mr-sm-2 border border-primary" type="date" aria-label="Search" name="date">
        </form>

        <h4 v-if="totalRows != 0 && lastPage != 1" class="row d-flex justify-content-center mb-5">Your sign is {{sign}} {{sign_icon}} </h4>

        <div class="row horoscopes-row d-flex justify-content-center">
            <HoroscopeCard v-for="horoscope in horoscopes" :key="horoscope.id" :horoscopeCard="horoscope"/>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <b-pagination
                v-if="totalRows != 0 && lastPage != 1"
                v-model="currentPage"
                :total-rows="totalRows"
                :per-page="perPage"
                aria-controls="my-table"
            />
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
                totalRows: 0,
                currentPage: 1,
                search: "",
                perPage: 0,
                lastPage: 1,
                sign: "",
                sign_icon: "",
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
                    this.totalRows = res.data.horoscopes.total;
                    this.perPage = res.data.horoscopes.per_page;
                    this.lastPage = res.data.horoscopes.last_page;
                    this.sign = res.data.sign;
                    this.sign_icon = res.data.sign_icon;
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

        }
    }
</script>

<style lang="scss" scoped>

.search-row{
    font-size: 1.3em;
}

.horoscopes-row{
        gap:3%;
}

</style>