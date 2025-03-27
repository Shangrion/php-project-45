#Устанавливает зависимости из composer.lock в vendor. 
#Используется для развёртвывания в новой среде.
#Если composer.lock отстуствует, то создаст его на основе composer.json
install:
	composer install

#запускает файл с приветствием
brain-games:
	./bin/brain-games

#проверяет синтаксис и зависимости в composer.json и composer.lock
#другие файлы проверяются на существование если они указанны в файлах выше.
validate:
	composer validate

#проверяет код в файлах src/ и bin/ снифером на стандарт PSR12 
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

#запускает игру "чётное ли число"
brain-even:
	./bin/brain-even

#запускает игру "калькулятор"
brain-calc:
	./bin/brain-calc

#запускает игру "НОД"
brain-gcd:
	./bin/brain-gcd

#запускает игру "Арифметическая прогрессия"
brain-progression:
	./bin/brain-progression

#запускает игру "Простое ли число"
brain-prime:
	./bin/brain-prime
