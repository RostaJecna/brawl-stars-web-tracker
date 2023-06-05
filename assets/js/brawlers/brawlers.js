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

        displayBrawlers(brawlers);
    },
    error: function (xhr) {
        displayError(xhr);
    }
});

/**
 * * The `displayBrawlers` function takes an array of `brawlers` as input and dynamically generates HTML elements to display each brawler.
 *
 * @param {Array} brawlers - An array of brawlers to be displayed.
 * @returns {void}
 */
function displayBrawlers(brawlers) {

    const brawlersSpinner = document.querySelector('#brawlers-spinner');
    if (brawlersSpinner) {
        brawlersSpinner.remove();
    }

    const brawlersContainer = document.querySelector('#brawlers-container');

    // ? Create a document fragment to hold the generated HTML elements
    const fragment = document.createDocumentFragment();

    // Loop through the brawlers array and create HTML elements to display them
    brawlers.forEach(brawler => {
        const brawlerDiv = document.createElement('div');
        brawlerDiv.classList.add('col-xl-3', 'col-lg-4', 'col-md-6', 'mb-3', 'brawler-card');

        // Set the innerHTML of the div to display the brawler details
        brawlerDiv.innerHTML = `
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

        // * Append the brawler div to the fragment
        fragment.appendChild(brawlerDiv);
    });

    brawlersContainer.appendChild(fragment);
}

/**
 * * The `displayError` function is responsible for displaying an error message when there is a problem loading data.
 *
 * @param {XMLHttpRequest} xhr - The XMLHttpRequest object containing the error information.
 * @returns {void}
 */
function displayError(xhr) {
    const brawlersSpinner = document.querySelector('#brawlers-spinner');
    if (brawlersSpinner) {
        brawlersSpinner.remove();
    }

    const brawlersContainer = document.querySelector('#brawlers-container');
    const errorDiv = document.createElement('div');

    errorDiv.innerHTML = `
    <div class="alert alert-danger" role="alert" data-bs-theme="light">
    Apologies for the inconvenience. We're currently unable to load the data. Please try
        <span><a href="/pages/brawlers.html" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">again</a></span> in a few minutes.
        <hr>
        Status Code: ${xhr.status}.
        Message: ${xhr.statusText}.
    </div>
    `;

    brawlersContainer.appendChild(errorDiv);
}