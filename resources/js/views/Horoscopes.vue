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

        <!-- <div class="container w-50">
            <ul id="itemList" class="myPagination d-flex align-center">
                <li class="mx-3" style="cursor:pointer" @click="currentPage = n" v-for="n in lastPage" :key="n">{{ n }}</li>
            </ul>
        </div> -->

        <b-pagination
            v-if="totalRows != 0 && lastPage != 1"
            v-model="currentPage"
            :total-rows="totalRows"
            :per-page="perPage"
            aria-controls="my-table"
        />

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
                lastPage: 1
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

.myPagination{
    overflow-x: scroll;
}

</style>