<?php
/**
 * Если вам необходимо поддерживать в приложении несколько типов Одиночек, вы
 * можете определить основные функции Одиночки в базовом классе, тогда как
 * фактическую бизнес-логику (например, ведение журнала) перенести в подклассы.
 */
class Singleton
{
    /**
     * Реальный экземпляр одиночки почти всегда находится внутри статического
     * поля. В этом случае статическое поле является массивом, где каждый
     * подкласс Одиночки хранит свой собственный экземпляр.
     */
    private static array $instances = [];

    /**
     * Конструктор Одиночки не должен быть публичным. Однако он не может быть
     * приватным, если мы хотим разрешить создание подклассов.
     */
    protected function __construct() { }

    /**
     * Клонирование и десериализация не разрешены для одиночек.
     */
    protected function __clone() { }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    /**
     * Метод, используемый для получения экземпляра Одиночки.
     */
    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            // Обратите внимание, что здесь мы используем ключевое слово
            // "static" вместо фактического имени класса. В этом контексте
            // ключевое слово "static" означает «имя текущего класса». Эта
            // особенность важна, потому что, когда метод вызывается в
            // подклассе, мы хотим, чтобы экземпляр этого подкласса был создан
            // здесь.
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}

/**
 * Класс ведения журнала является наиболее известным и похвальным использованием
 * паттерна Одиночка.
 */
class Logger extends Singleton
{
    /**
     * Ресурс указателя файла файла журнала.
     */
    private $fileHandle;

    /**
     * Поскольку конструктор Одиночки вызывается только один раз, постоянно
     * открыт всего лишь один файловый ресурс.
     *
     * Обратите внимание, что для простоты мы открываем здесь консольный поток
     * вместо фактического файла.
     */
    protected function __construct()
    {
        $this->fileHandle = fopen('log.txt', 'w');
    }

    /**
     * Пишем запись в журнале в открытый файловый ресурс.
     */
    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
//        echo "$date: $message<br>";
    }

    /**
     * Просто удобный ярлык для уменьшения объёма кода, необходимого для
     * регистрации сообщений из клиентского кода.
     */
    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}

/**
 * Применение паттерна Одиночка в хранилище настроек – тоже обычная практика.
 * Часто требуется получить доступ к настройкам приложений из самых разных мест
 * программы. Одиночка предоставляет это удобство.
 */
class Config extends Singleton
{
    private array $hashmap = [];

    public function getValue(string $key): string
    {
        return $this->hashmap[$key];
    }

    public function setValue(string $key, string $value): void
    {
        $this->hashmap[$key] = $value;
    }
}
