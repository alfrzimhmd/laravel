``
all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan make:migration create_siswa_ekskul_table

   INFO  Migration [database/migrations/2026_05_07_120014_create_siswa_ekskul_table.php] created successfully.  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan make:model SiswaEkskul

   INFO  Model [app/Models/SiswaEkskul.php] created successfully.  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan make:factory SiswaEkskulFactory --model=SiswaEkskul

   INFO  Factory [database/factories/SiswaEkskulFactory.php] created successfully.  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan make:seeder SiswaEkskulSeeder

   INFO  Seeder [database/seeders/SiswaEkskulSeeder.php] created successfully.  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan migrate 

   INFO  Preparing database.  

  Creating migration table ............................................................................................................ 46.10ms DONE

   INFO  Running migrations.  

  0001_01_01_000000_create_users_table ............................................................................................... 157.15ms DONE
  0001_01_01_000001_create_cache_table ............................................................................................... 109.26ms DONE
  0001_01_01_000002_create_jobs_table ................................................................................................ 135.06ms DONE
  2026_05_07_120014_create_siswa_ekskul_table ......................................................................................... 31.47ms DONE

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan db:seed

   INFO  Seeding database.  

  Database\Seeders\SiswaEkskulSeeder ....................................................................................................... RUNNING  
  Database\Seeders\SiswaEkskulSeeder ................................................................................................... 144 ms DONE  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan make:controller SiswaEkskulController

   INFO  Controller [app/Http/Controllers/SiswaEkskulController.php] created successfully.  

all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ mkdir -p resources/views/layouts
all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ mkdir -p resources/views/siswa_ekskul
all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ nano resources/views/layouts/app.blade.php
all@ubuntu-system:~/pemrograman/laravel/sistem_ekskul$ php artisan serve
```