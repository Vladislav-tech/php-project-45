# Install all dependencies
install:
	composer install

# Start game
brain-games:
	./bin/brain-games

# Start "even or not" game
is-even:
	./bin/brain-even

# Start calc game
brain-calc:
	./bin/brain-calc

# Start gcd game
brain-gcd:
	./bin/brain-gcd

# Start brain progression
brain-progression:
	./bin/brain-progression

# Start prime game
brain-prime:
	./bin/brain-prime

# Check if composer.json file is valid
validate:
	composer validate

# Check code quality in all files of project
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin