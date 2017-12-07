Steps
1) Create database 'roman_codes' in PostgreSQL
2) php artisan migrate
3) get all roman codes: GET - http://api_roman.dev/api/roman_codes/
4) get the top 10 converted integers: GET - http://api_roman.dev/api/roman_codes/top_ten
5) convert an integer to roman code: POST - http://api_roman.dev/api/roman_codes/  with parameter number  