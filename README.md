# Apache-access-parser

A simple php script for getting request's statistics. Basically the script shows information about:

- Total number of entries
- Total number of success requests (HTTP CODES 2xx)
- Total number of failed requests (HTTP CODES 4xx)
- Top clients (Top 3 clients who made most request)
- Top resources (Top 3 resources queried)

## Requirements

- `PHP 5.x or superior`
- `php-cli`

## Usage

Run the following commands

- `git clone https://github.com/mauhftw/apache-access-parser`
- `php parer.php -f /path/to/apache_access_log`

## Example

- `php parser.php -f access_log`


