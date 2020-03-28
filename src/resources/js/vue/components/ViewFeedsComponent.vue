<template>
    <div class="container" id="view-all-feeds">
        <div class="row">
            <div class="col-12">
                <h1>View All Feeds</h1>
                <loading v-if="loading"></loading>
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li class="p-2" v-for="rssFeed in rssFeeds">
                                <h3>{{rssFeed.name}}</h3>
                                <!--<p>
                                    <strong>16 Articles</strong>
                                </p>-->
                                <p>
                                    <!--<router-link :to="`/rss-feeds/${rssFeed.id}/edit`">Edit</router-link> |-->
                                    <!--<a href="#" @click.stop.prevent="deleteRssFeed(rssFeed.id)">Delete</a> |-->
                                    <router-link :to="`/rss-feeds/${rssFeed.id}/view`">View Articles</router-link>
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
                rssFeeds:[],
                noFeeds: false,
                loading: false
            }
        },
        mounted() {
            this.getRssFeeds()
        },

        methods: {
            getRssFeeds() {
                this.loading = true;
                rssApiService
                    .getFeeds()
                    .then((response) => {
                        this.rssFeeds = response.data;
                        this.loading = false;
                    }, (error) => {
                        alert('Error loading feeds!')

                    })
            },

            deleteRssFeed(feedId) {
                alert('deleting feed')
            }
        }

    }
</script>
