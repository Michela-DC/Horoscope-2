<template>
    <div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                lastPage: 0,
                currentPage: 0,
            }
        },

        methods: {
            fetchPosts(page = 1) { 
                axios.get('/api/horoscope',{
                    params: { //gli passo il parametro page
                        page
                    }
                }) 
                .then( res => {
                    const {posts} = res.data;
                    const {data, last_page, current_page} = posts;
                    // console.log(res.data.posts.current_page);
                    this.posts = data;
                    this.currentPage = current_page;
                    this.lastPage = last_page;
                })
                .catch( error => {
                    console.warn(error);
                })
            }
        },

        mounted() {
            // una volta montato il componente, verrà chiamata la funzione che fa l'axios.get
            this.fetchPosts();
        }
    }
</script>

<style lang="scss" scoped>

</style>