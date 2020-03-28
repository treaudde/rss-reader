<template>
    <div class="container" id="view-all-feeds">
        <div class="row">
            <div class="col-12">
                <h1>Page Not Found</h1>
                <div class="row">
                    <div class="col-12">
                        <p>
                            <router-link to="/">Go back to Feeds</router-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    export default {
        data() {
            return {
                rssFeeds:[],
                noFeeds: false
            }
        },
        mounted() {
            this.getRssFeeds()
        },

        methods: {
            getRssFeeds() {
                rssApiService
                    .getFeeds()
                    .then((response) => {
                        this.rssFeeds = response.data;
                    }, (error) => {
                        console.log(error)
                    })
            },

            deleteRssFeed(feedId) {
                alert('deleting feed')
            }
        }

    }
</script>
