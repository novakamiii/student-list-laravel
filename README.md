# Laravel Student List

## COMP 016 - WEB DEVELOPMENT

Submitted by: <b>Paulo Neil A. Sevilla BSIT 3-1</b>  

<hr>

### Prerequisites
- Laravel 12+
- Node.js + npm
- Any IDE of choice

<hr>

## Instructions

**(Skip to Step 2 if Laravel is installed.)**

1. Follow this instruction in the Laravel Documentation of how to install Laravel to your machine:
```
// All in One Laravel install: PHP + Laravel Framework

https://laravel.com/docs/12.x/installation
```

2. Clone this repository to your preferred location.
```
git clone https://github.com/novakamiii/student-list-laravel.git
```

3. Change your directory to the cloned repository.
```
cd {cloned-repository-name}
```

4. Edit your .env file for your database credentials:

```
// Example:

    DB_CONNECTION=mariadb //Change which database connection you are using (Ex: sqlite, mysql, etc.)
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=studentlist
    DB_USERNAME=root
    DB_PASSWORD=paulo
```

5. Run this commands first.
```
npm i
npm run build
```

```
php artisan tinker
```

then in tinker shell:
```
use App\Models\Student
```

```
Student::factory()->count(75)->create()
```

exit the tinker shell and then:

```
composer run dev
```

6. A log will show on where's the website link, it would show up like this:
```
[server]    INFO  Server running on [http://127.0.0.1:8000]. <--- ctrl + mouse1.
```

<hr>
