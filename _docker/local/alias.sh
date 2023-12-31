# Docker Compose
alias app='cat alias.sh'
alias app.up='docker compose up -d'
alias app.down='docker compose down'
alias app.restart='docker compose restart'
alias app.ps='docker compose ps'
alias app.logs='docker compose logs -f'
alias app.build='docker compose build'
alias app.rebuild='docker compose build --no-cache'

# Project App
alias app.zsh='docker exec -it app zsh'
alias app.exec='docker exec -it app'
alias app.php='docker exec -it app php'
alias app.composer='docker exec -it app composer'
alias app.dump='docker exec -it app composer dump'
alias app.update='docker exec -it app composer update'
alias app.install='docker exec -it app composer install'
alias app.run='docker exec -it app php src/main.php'
alias app.test='app.php vendor/bin/pest'
alias app.coverage='app.test --coverage'
alias app.coverage-type='app.test --type-coverage'
alias app.analyse='app.php vendor/bin/phpstan analyse'
alias app.lint='app.php vendor/bin/pint'
alias app.prepare='app.update && app.dump && app.lint && app.analyse src --level 0 && app.test && git add . && git status'
alias app.quality='app.dump && app.lint && app.analyse src --level 0 && app.coverage-type && app.coverage'
