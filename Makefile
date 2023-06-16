# Install all dependencies
install:
	composer install

# Start game
brain-games:
	./bin/brain-games

# Check if composer.json file is valid
validate:
	composer validate