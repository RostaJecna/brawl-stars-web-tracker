export default class Brawler {
    constructor(name, iconImageUrl, emojiImageUrl, className, brawlerRarity, description) {
        this.name = name;
        this.iconImageUrl = iconImageUrl;
        this.emojiImageUrl = emojiImageUrl;
        this.className = className;
        this.brawlerRarity = brawlerRarity;
        this.description = description;
    }

    /**
     * * Creates a filtered Brawler object from the provided brawler data.
     * @param {Object} brawler - The brawler object containing the necessary properties.
     * @returns {Brawler} - The filtered Brawler object.
     */
    static getFiltredBrawler(brawler) {
        // ? Extract the relevant properties from the brawler
        const name = brawler.name;
        const iconImageUrl = brawler.imageUrl;
        const emojiImageUrl = brawler.imageUrl3;
        const className = brawler.class.name;
        const description = brawler.description;

        // ? Extract the necessary properties for the BrawlerRarity object
        const BrawlerRarity = {
            id: brawler.rarity.id,
            name: brawler.rarity.name,
            color: brawler.rarity.color
        }

        // Create a new Brawler object with the extracted properties
        return new Brawler(name, iconImageUrl, emojiImageUrl, className, BrawlerRarity, description);
    }
}