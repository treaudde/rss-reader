export default class RssApi {

    constructor(rssApiUrl, httpClient) {
        this.rssApiUrl = rssApiUrl;
        this.httpClient = httpClient
    }

    getFeeds() {
        return this.httpClient.get(`${this.rssApiUrl}`);
    }

    getFeed(feedId, refreshFeed = false) {
        let url = `${this.rssApiUrl}/${feedId}`;

        if(refreshFeed) {
            url += '?refresh=1';
        }

        return this.httpClient.get(url);
    }

    createFeed(feedData) {
        return this.httpClient.post(`${this.rssApiUrl}`, feedData);
    }

    updateFeed(feedId, feedData) {
        return this.httpClient.put(`${this.rssApiUrl}`, feedData);
    }

    deleteFeed(feedId) {
        return this.httpClient.delete(`${this.rssApiUrl}/${feedId}`);
    }
}
