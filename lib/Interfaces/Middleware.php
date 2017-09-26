<?php

namespace Lib\Interfaces;

/**
 * Промежуточный фильтр для запроса пользователя
 * Все запросы поочередно проходят каждый middleware и изменяются в них
 */

interface Middleware
{
    /**
     * Инициализация предполагает проверку на наличие нужных параметров в запросе
     * Запрос не должен изменяться в данном методе!
     *
     * @param \Lib\Base\Connection $conn
     * @return bool Подходит ли данный middleware для работы с запросом;
     */
    public function init($conn);

    /**
     * Сам процесс работы с соединением
     *
     * @return void
     */
    public function call();
}