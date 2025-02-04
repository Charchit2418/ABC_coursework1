class VideoGameParlour {
    constructor() {
        this.games = [];
    }

    // Add a new game
    addGame(name, genre, price) {
        const game = {
            id: this.games.length + 1,
            name,
            genre,
            price
        };
        this.games.push(game);
        console.log(`Added: ${name}`);
    }

    // Get all games
    getGames() {
        return this.games;
    }

    // Find a game by ID
    findGame(id) {
        return this.games.find(game => game.id === id) || null;
    }

    // Update a game
    updateGame(id, updatedInfo) {
        const game = this.findGame(id);
        if (game) {
            Object.assign(game, updatedInfo);
            console.log(`Updated: ${game.name}`);
        } else {
            console.log("Game not found");
        }
    }

    // Delete a game
    deleteGame(id) {
        const index = this.games.findIndex(game => game.id === id);
        if (index !== -1) {
            const removed = this.games.splice(index, 1);
            console.log(`Deleted: ${removed[0].name}`);
        } else {
            console.log("Game not found");
        }
    }
}

// Example usage
const parlour = new VideoGameParlour();
parlour.addGame("Cyberpunk 2077", "RPG", 59.99);
parlour.addGame("The Witcher 3", "RPG", 39.99);
parlour.updateGame(1, { price: 49.99 });
console.log(parlour.getGames());
parlour.deleteGame(2);
console.log(parlour.getGames());
