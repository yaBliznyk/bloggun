# bloggun

### What is this repository for? ###

Фрэймворк для создания блога

### How do I get set up? ###

/docker создаем файл .env полностью скопировав env-example  
В папке /docker вполняем команды:  
sudo ./start.sh (требуется наличие docker-compose)  
sudo ./console.sh

В контейнере выполняем:  
composer install

Заходим в http://localhost и теоретически должен появиться сайт.

Тестово работают главная страница, http://localhost/posts/4 (просмотр поста, но просто выдает id) и страница ошибки роута.
