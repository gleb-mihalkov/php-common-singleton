# Типаж "Синглтон"

Типаж, реализующий паттерн *[синглтон](https://ru.wikipedia.org/wiki/%D0%9E%D0%B4%D0%B8%D0%BD%D0%BE%D1%87%D0%BA%D0%B0_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F))*.

Библиотека является частью пакета [php-common](#).

* [Страница проекта](https://github.com/gleb-mihalkov/php-common-singleton)

* [Документация](https://gleb-mihalkov.github.io/php-common-singleton)

## Использование

Если конструктор вашего класса не имеет параметров, то можно просто подключить типаж `TSingleton`:

```php
require 'vendor/autoload.php';
use Common\TSingleton;

class EmptyContructor
{
    use TSingleton;
}

$a = EmptyContructor::getInstance();
$b = EmptyContructor::getInstance();
var_dump($a === $b);

// Выведет:
// bool(true)
```

Если же параметры у конструктора есть, можно переопределить статический метод `createInstance`, который однократно создает единственный экземпляр класса:

```php
require 'vendor/autoload.php';
use Common\TSingleton;

class ConstructorWithArgs
{
    use TSingleton;

    public $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }
    
    // Переопределяем метод типажа.
    protected static function createInstance()
    {
        return new static('Hello, world!');
    }
}

$a = ConstructorWithArgs::getInstance();
echo $a->value;

// Выведет:
// Hello, world!
```

**Внимание!** Типаж не запрещает клонирование или создание объектов оператором `new`. Такие вещи остаются на ваше усмотрение.