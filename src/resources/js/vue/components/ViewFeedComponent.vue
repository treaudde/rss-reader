<template>
    <div class="container" id="view-all-feeds">
        <div class="row">
            <div class="col-12">
                <h1>View Feed</h1>
                <loading v-if="loading"></loading>
                <p>
                    <router-link to="/">&lt; View Feeds</router-link> |
                    <a href="#" @click.stop.prevent="getRssFeed(feedId, true)">Refresh Feed</a>
                </p>

                <div class="row">
                    <div class="col-12">
                        <article v-for="article in feedArticles" class="article-preview p-2">

                            <h2>{{article.title}}</h2>
                            <!--<img src="https://picsum.photos/150" class="img-rounded float-left img-responsive p-2">-->
                            <p v-html="article.description"></p>
                            <p><a :href="article.link" target="_blank">Read full article...</a></p>
                            <div style="clear:both"></div>
                            <hr />
                        </article>
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
        props: ['feedId'],
        data() {
            return {
                feed: {},
                feedArticles: [],
                noFeedArticles: false,
                loading: false
            }
        },
        mounted() {
            this.getRssFeed(this.feedId);
        },

        methods: {
            getRssFeed(feedId, refresh = false) {
                this.loading = true
                rssApiService.getFeed(feedId, refresh)
                    .then((response) => {
                        this.feed = response.data.feed;
                        this.feedArticles = response.data.articles;

                        this.loading = false;
                    }, (error) => {
                        console.log(error);
                        alert('Error loading feed!');
                        this.loading = false;
                    })
            },
        }
    }
</script>
