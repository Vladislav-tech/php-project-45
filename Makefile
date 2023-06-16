# Install all dependencies
install:
	composer install

# Start game
brain-games:
	./bin/brain-games

# Check if composer.json file is valid
validate:
	composer validate

# Check code quality in all files of project
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin