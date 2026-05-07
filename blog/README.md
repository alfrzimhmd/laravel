blog_saya/
│
├── database/migrations/
│   └── 2026_xx_xx_create_artikels_table.php
│
├── app/Models/
│   └── Artikel.php
│
├── app/Http/Controllers/
│   └── ArtikelController.php
│
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php (sudah ada)
│   ├── home.blade.php (sudah ada)
│   ├── about.blade.php (sudah ada)
│   ├── blog/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   └── admin/
│       └── artikel/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
└── public/storage/ (akan dibuat otomatis)