import ViewFeedsComponent from "../components/ViewFeedsComponent";
import ViewFeedComponent from "../components/ViewFeedComponent";
import FeedFormComponent from "../components/FeedFormComponent";
import VueRouter from "vue-router";
import NotFoundComponent from "../components/NotFoundComponent";

const routes = [
    {path:'/', component: ViewFeedsComponent},
    {path: '/rss-feeds/:feedId/view', component: ViewFeedComponent, props: true},
    {path: '/rss-feeds/create', component: FeedFormComponent, props: true},
    {path: '/rss-feeds/:feedId/edit', component: FeedFormComponent, props: true},
    {path: '*', component: NotFoundComponent},
];

export const router = new VueRouter({
    mode: 'history',
    routes
})
