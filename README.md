# Laravel WAF Testing Demo

This Laravel project serves as a demonstration for testing a Web Application Firewall (WAF). The project includes a custom middleware `WebApplicationFirewall` that showcases some basic security checks commonly found in a WAF.

## WAF Code Overview

The WAF middleware (`App\Http\Middleware\WebApplicationFirewall`) includes the following security checks:

### Blocked IPs
- It restricts access for IPs listed in the configuration file `config('app.blocked_ips')`.

### Rate Limiting
- Implements rate limiting using Laravel's `RateLimiter` to prevent too many requests within a specific timeframe (`$perMinute = 60`).

### User Agent Validation
- Checks if the incoming request has an empty user agent and blocks access if it's empty.

Feel free to explore the code in the `WebApplicationFirewall` middleware to understand how these security measures are implemented.

## How to Use

1. Clone or download the repository.
2. Run `composer install` & `npm install` to install the project dependencies.
3. Configure the `.env` file.
4. Configure the `blocked_ips` in the `config/app.php` file to simulate blocked IPs for testing purposes.
5. Explore the middleware in `app/Http/Middleware/WebApplicationFirewall.php` to see the implemented security checks.
6. Run `php artisan serve` to start the Laravel application.
7. Test different scenarios by sending requests to the Laravel application and observing the behavior based on the WAF checks.

