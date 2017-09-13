<?php
namespace Common
{
    /**
     * Синглтон.
     *
     * @package Common
     */
    trait TSingleton
    {
        /**
         * Коллекция экземпляров этого и дочерних классов, сгруппированная по именам их классов.
         * 
         * @var array
         */
        private static $instances = [];

        /**
         * Создает экземпляр класса. Вызывается однократно.
         * Метод можно переопределить в дочернем классе.
         * 
         * @return TSingleton Экземпляр класса.
         */
        protected static function createInstance()
        {
            return new static();
        }

        /**
         * Получает единственный экземпляр синглтона.
         *
         * @return TSingleton Экземпляр синглтона.
         */
        public static function getInstance()
        {
            return !isset(self::$instances[static::class])
                ? (self::$instances[static::class] = static::createInstance())
                : (self::$instances[static::class]);
        }
    }
}