$ErrorActionPreference = 'Stop'
Set-Location $PSScriptRoot
function Run-Step([string]$Program, [string[]]$Arguments) {
    & $Program @Arguments
    if ($LASTEXITCODE -ne 0) { throw "$Program failed. Fix the error above before continuing." }
}
if (!(Test-Path '.env')) { Copy-Item '.env.example' '.env' }
Run-Step 'composer' @('install')
Run-Step 'composer' @('require','laravel/breeze:^2.3','--dev','--no-interaction')
Run-Step 'php' @('artisan','breeze:install','blade','--no-interaction')
# Breeze creates its default web routes; activate this assessment's public and protected routes.
Copy-Item 'routes/tasks-web.php' 'routes/web.php' -Force
Run-Step 'php' @('artisan','key:generate')
Run-Step 'npm' @('install')
Run-Step 'npm' @('run','build')
Run-Step 'php' @('artisan','config:clear')
Run-Step 'php' @('artisan','migrate','--seed')
Run-Step 'php' @('artisan','test','--filter=TaskWorkflowTest')
Write-Host 'Setup complete. Run php artisan serve, then register an account.'
