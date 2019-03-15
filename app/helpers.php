<?php

use Illuminate\Support\Facades\Cache;


function get_db_config()
{
    if (getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));

        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url["host"],
            'database'  => substr($url["path"], 1),
            'username'  => $url["user"],
            'password'  => $url["pass"],
        ];
    } else {
        return $db_config = [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
        ];
    }
}

function make_avatar($gen_str, $size = 100)
{
    $hash = md5(strtolower(trim(($gen_str ? $gen_str : Str::random()).time())));
    
    $faker = app(Faker\Generator::class);
    $host = '';
    $subfix = '';

    $from = rand(1, 2);
    switch ($from) {
        case '1':
            $host = "https://robohash.org/";
            $set = $faker->randomElement(['set1', 'set2', 'set3', 'set4']);
            $subfix = "$hash.png?set=$set&size={$size}x{$size}";
            break;
        case '2':
        default :
            $host = "https://avatars.dicebear.com/v2/";
            $sprites = $faker->randomElement(['male', 'female', 'identicon', 'gridy', 'avataaars', 'jdenticon']);
            $mood = $faker->randomElement(['happy', 'sad', 'surprised', '']);
            $subfix = "$sprites/$hash.svg" . ( $mood ? "?options[mood][]=$mood" : '' );
    }

    return $host . $subfix;
}
function parse_markdown($markdown)
{
    $cache = md5($markdown);
    if (Cache::has($cache)) {
        return Cache::get($cache);
    }

    $file = base_path('resources/views/markdows/'. $markdown . '.md');
    
    if (!file_exists($file)) {
        return '';
    }
    $paser = app(Parsedown::class);

    $content = $paser->text(file_get_contents($file));

    Cache::store('file')->add($cache, $content, 30);

    return Cache::get($cache);
}