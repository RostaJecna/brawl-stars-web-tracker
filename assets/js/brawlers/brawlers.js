import Brawler from "./brawler.js";

$.ajax({
    url: 'https://api.brawlapi.com/v1/brawlers',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        // ? Access the 'list' array from the JSON data
        const brawlersList = response.list;

        // * Create an array of Brawlers objects from the filtered brawlers
        const brawlers = brawlersList.map(brawler => Brawler.getFiltredBrawler(brawler));

        // Sort the brawlers array from higher to lower rarity ID
        brawlers.sort((a, b) => b.brawlerRarity.id - a.brawlerRarity.id);

        console.log(brawlers);
    },
    error: function (xhr) {
    }
});