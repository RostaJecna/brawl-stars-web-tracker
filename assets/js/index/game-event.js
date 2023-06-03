export default class GameEvent {
    constructor(endTime, gameMap, gameMode) {
        this.endTime = endTime;
        this.gameMap = gameMap;
        this.gameMode = gameMode;
    }

    /**
     * * Calculate the remaining time until the end of the game event.
     * ? Returns the remaining time in the format "Xh Ymin".
     */
    getRemainingTime() {
        const end = new Date(this.endTime);
        const now = new Date(); // Current local time

        // Calculate the remaining time by subtracting the current time from the end time
        const remainingTime = end - now;

        // Calculate the number of hours by dividing the remaining time by the number of milliseconds in an hour
        const hours = Math.floor(remainingTime / (1000 * 60 * 60));

        // Calculate the number of minutes by taking the remainder after dividing the remaining time by the number of milliseconds in an hour,
        // and then dividing that by the number of milliseconds in a minute
        const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));

        return `${hours}h ${minutes}min`;
    }

    /**
     * * Creates a filtered GameEvent object from the provided event data.
     * @param {Object} event - The event object containing the necessary properties.
     * @returns {GameEvent} - The filtered GameEvent object.
     */
    static getFiltredEvent(event) {
        // ? Extract the relevant propertie from the event
        const endTime = event.endTime;

        // ? Extract the necessary properties for the GameMap object
        const GameMap = {
            name: event.map.name,
            bgImageUrl: event.map.environment.imageUrl
        }

        // ? Extract the necessary properties for the GameMode object
        const GameMode = {
            name: event.map.gameMode.name,
            bgColor: event.map.gameMode.bgColor,
            iconImageUrl: event.map.gameMode.imageUrl
        }

        // Create a new GameEvent object with the extracted properties
        return new GameEvent(endTime, GameMap, GameMode);
    }
}