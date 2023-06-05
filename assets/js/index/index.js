import GameEvent from "./game-event.js";

$.ajax({
    url: 'https://api.brawlapi.com/v1/events',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        // ? Access the 'active' array from the JSON data
        const activeEvents = response.active;

        // * Filter the events based on the name property of the slot object
        const filteredEvents = activeEvents.filter(event => {
            // ! Check if the event has a slot, name property, and contains the word "Daily"
            return event.slot && event.slot.name && event.slot.name.includes("Daily");
        });

        // * Create an array of GameEvent objects from the filtered events
        const gameEvents = filteredEvents.map(event => GameEvent.getFiltredEvent(event));

        displayEvents(gameEvents);
    },
    error: function (xhr) {
        displayError(xhr);
    }
});

/**
 * * The `displayEvents` function takes an array of `gameEvents` as input and dynamically generates HTML elements to display each game event.
 *
 * @param {Array} gameEvents - An array of game events to be displayed.
 * @returns {void}
 */
function displayEvents(gameEvents) {

    const gameEventsSpinner = document.querySelector('#game-events-spinner');
    if (gameEventsSpinner) {
        gameEventsSpinner.remove();
    }

    const gameEventsContainer = document.querySelector('#game-events-container');

    // ? Create a document fragment to hold the generated HTML elements
    const fragment = document.createDocumentFragment();

    // Loop through the game events array and create HTML elements to display them
    gameEvents.forEach(event => {
        const eventDiv = document.createElement('div');
        eventDiv.classList.add('col-lg-6', 'col-sm-12', 'd-flex', 'flex-column', 'mb-3');

        // Set the innerHTML of the div to display the game event details
        eventDiv.innerHTML = `
        <div class="bg-black event-time-info rounded-top">
            <p class="text-end fs-5 p-1 me-1 mb-0">New Event in:
                <span>${event.getRemainingTime()}</span>
            </p>
        </div>
        <div class="d-flex p-2 event-header align-items-center" style="background-color: ${event.gameMode.bgColor};">
            <img class="user-select-none" src="${event.gameMode.iconImageUrl}" alt="icon.png" height="72">
            <div class="px-2 text-white event-shadow-text ">
                <h2 class="text-uppercase mb-0">${event.gameMode.name}</h2>
                <h4 class="text-capitalize mb-0">${event.gameMap.name}</h4>
            </div>
        </div>
        <div class="event-bg-image rounded-bottom"
            style="background-image: url(${event.gameMap.bgImageUrl});"></div>
        `;

        // * Append the event div to the fragment
        fragment.appendChild(eventDiv);
    });

    gameEventsContainer.appendChild(fragment);
}

/**
 * * The `displayError` function is responsible for displaying an error message when there is a problem loading data.
 *
 * @param {XMLHttpRequest} xhr - The XMLHttpRequest object containing the error information.
 * @returns {void}
 */
function displayError(xhr) {
    const gameEventsSpinner = document.getElementById('game-events-spinner');
    if (gameEventsSpinner) {
        gameEventsSpinner.remove();
    }

    const gameEventsContainer = document.getElementById('game-events-container');
    const errorDiv = document.createElement('div');

    errorDiv.innerHTML = `
    <div class="alert alert-danger" role="alert" data-bs-theme="light">
    Apologies for the inconvenience. We're currently unable to load the data. Please try
        <span><a href="/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">again</a></span> in a few minutes.
        <hr>
        Status Code: ${xhr.status}.
        Message: ${xhr.statusText}.
    </div>
    `;

    gameEventsContainer.appendChild(errorDiv);
}