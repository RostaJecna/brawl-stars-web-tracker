import GameEvent from "./game-event.js";
import { displayArray, displayError } from "../display-manager.js";

const gameEventsSpinner = $('#game-events-spinner');
const gameEventsContainer = $('#game-events-container');
const divEventsClasses = ['col-lg-6', 'col-sm-12', 'd-flex', 'flex-column', 'mb-3'];

// Hide the element inside events container, toggle the 'd-none' class, and then show it.
gameEventsSpinner.hide().toggleClass('d-none').show(350);

$.ajax({
    url: 'https://api.brawlapi.com/v1/events',
    method: 'GET',
    dataType: 'json',
    success: (response) => {
        // ? Access the 'active' array from the JSON data
        const activeEvents = response.active;

        // * Filter the events based on the name property of the slot object
        const filteredEvents = activeEvents.filter(event => {
            // ! Check if the event has a slot, name property, and contains the word "Daily"
            return event.slot && event.slot.name && event.slot.name.includes("Daily");
        });

        // * Create an array of GameEvent objects from the filtered events
        const gameEventsArray = filteredEvents.map(event => GameEvent.getFiltredEvent(event));

        displayArray(gameEventsContainer, gameEventsArray, divEventsClasses, generateHtmlEvent);
    },
    error: (xhr) => {
        displayError(gameEventsContainer, xhr);
    }
});

function generateHtmlEvent(event) {
    return `
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
}