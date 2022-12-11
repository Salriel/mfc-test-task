Требуется наличие Docker.


Чтобы запустить проект, нужно в находясь в корне ввести команду `docker-compose up -d`, но возможны проблемы со стартом БД, если не прописать chmod, например `sudo chmod -R 775 .` в корне проекта.

Также при первом запуске потребуется ввести команду `docker exec -it backend php artisan migrate --seed`

Чтобы выключить проек, нужно ввести команду `docker-compose down`.
---

Консольная команда для удаления старых завершенных заявок - `docker exec -it backend php artisan delete-old-requests`.
