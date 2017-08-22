# Laravel and VueJS Real Time Chat used Pusher Events Listeners Broadcast and Laravel Echo

#### [Link to test site](https://f-todo-list.herokuapp.com/)
[user: test, password: pass]

### Run this app in local
  - cd /your_work_path
  - git clone https://github.com/OlegMarko/lar-chat.git
  - cd lar-chat
  - make .env file for .env.example set config db and Pusher keys
  - run composer command: composer install
  - run npm command: npm run watch
  - run artisan command: php artisan migrate
  - set to /resource/assets/js/bootstrap.js Pusher keys
  - set to .env file 
  - run artisan command: php artisan serve
  - open in your brouser http://127.0.0.1:8000/
  - link to route http://127.0.0.1:8000/chat