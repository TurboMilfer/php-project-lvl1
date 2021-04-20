lint:
	composer run-script phpcs -- --standard=PSR12 src bin

install:
	composer install

brain-games:
	bin/brain-games

validate:
	composer validate

dump:
	composer dump-autoload

brain-even:
	bin/brain-even

brain-calc:
	bin/brain-calc

brain-gcd:
	bin/brain-gcd

