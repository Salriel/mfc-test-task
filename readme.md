Требуется наличие Docker.

Чтобы запустить проект, нужно в находясь в корне ввести команду `docker-compose up -d`.
Также при первом запуске потребуется ввести команду `docker exec -it backend php artisan migrate --seed`
Чтобы выключить проек, нужно ввести команду `docker-compose down`.
---

Консольная команда для удаления старых завершенных заявок - `php artisan delete-old-requests`.