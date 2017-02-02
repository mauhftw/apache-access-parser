# Apache-access-parser

A simple php script for getting request's statistics. Basically the scripts show information about

- Number of entries
- Number of success requests (HTTP CODES 2xx)
- Number of failed requests (HTTP CODES 4xx)

- Top Clients (Top 3 clients who made most request)
- Top Resources (Top 3 resources queried)

## Requirements

- `PHP 5.x or superior`
- `php-cli`

## Usage

Run the following commands

- `git clone https://github.com/mauhftw/apache-access-parser`
- `php parer.php -f /path/to/apache_access_log`

## Example

- `php parser.php -f access_log`


