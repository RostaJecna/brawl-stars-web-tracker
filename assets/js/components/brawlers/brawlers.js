import Brawler from "./brawler.js";
import { displayArray, displayError } from "../../utils/display-manager.js";

const brawlersSpinner = $('#brawlers-spinner');
const brawlersContainer = $('#brawlers-container');
const divCardsClasses = ['col-xl-3', 'col-lg-4', 'col-md-6', 'mb-3', 'brawler-card'];

// Hide the element inside brawlers container, toggle the 'd-none' class, and then show it.
brawlersSpinner.hide().toggleClass('d-none').show(350);

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

        displayArray(brawlersContainer, brawlers, divCardsClasses, generateHtmlBrawler);
    },
    error: function (xhr) {
        displayError(brawlersContainer, xhr);
    }
});

function generateHtmlBrawler(brawler) {
    return `
    <div class="text-center brawler-border brawler-card-inner rounded-4 bg-dark">
        <div class="brawler-card-front">
            <div class="py-5 rounded-top-2" style="background-color: ${brawler.brawlerRarity.color};"><img
                    class="shadow-lg rounded" src="${brawler.iconImageUrl}" alt="brawlerIcon.png" height="152px">
            </div>
            <div class="p-3">
                <h1 class="m-0 font-nougat" style="color: ${brawler.brawlerRarity.color};">
                    ${brawler.name}
                </h1>
                <h3 class="text-muted m-0">
                    ${brawler.className}
                </h3>
            </div>
        </div>
        <div class="brawler-card-back d-flex flex-column justify-content-between py-2">
            <h1 class="m-0" style="color: ${brawler.brawlerRarity.color};">${brawler.brawlerRarity.name}</h1>
            <p class="text-muted px-2 m-0">${brawler.description}</p>
            <img class="mx-auto" src="${brawler.emojiImageUrl}" height="48px" alt="emoji.svg">
        </div>
    </div>
    `;
}