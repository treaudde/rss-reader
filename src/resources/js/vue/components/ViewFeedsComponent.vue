<template>
    <div class="container" id="view-all-feeds">
        <div class="row">
            <div class="col-12">
                <h1>View All Feeds</h1>
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li class="p-2" v-for="rssFeed in rssFeeds">
                                <h3>{{rssFeed.name}}</h3>
                                <!--<p>
                                    <strong>16 Articles</strong>
                                </p>-->
                                <p>
                                    <a :href="`/rss-feeds/${rssFeed.id}/edit`">Edit</a> |
                                    <a :href="`/rss-feeds/${rssFeed.id}/delete`">Delete</a>
                                </p>
                            </li>
                        </ul>
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
               rssFeeds:[]
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
            }
        }

    }
</script>
