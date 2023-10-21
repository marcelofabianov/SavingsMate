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
alias app.run='docker exec -it app php src/main.php'