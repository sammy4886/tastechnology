<?php

use Carbon\Carbon;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = '-')
{
    if (empty($value)) {
        return $dash;
    }

    return $value;
}

function user_avatar($width, $username = null)
{
    if ($username) {
        $user = \App\Models\User::whereUsername($username)->first();
    } else {
        $user = auth()->user();
    }

    if ($image = $user->image) {
        return asset($image->thumbnail($width, $width));
    } else {
        return asset('img/avatar.png');
    }
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $height = null, $entity = null)
{
    $height ?: $height = $width;

    if (!is_null($entity)) {
        if ($image = $entity->image) {
            return asset($image->thumbnail($width, $height));
        }
    }

    return asset(setting('placeholder'));
}

/**
 * @param $query
 * @return mixed
 */
function setting($query)
{
    $setting = \App\Setting::fetch($query)->first();

    return $setting ? $setting->value : null;
}

/**
 * Return array 6 latest posts
 * @return array
 */
function latestPosts($type = 'large')
{
    $latestPosts = [];

    $posts = App\Post::published()->latest()->limit(6)->get();

    if ('large' == $type) {
        foreach ($posts as $post) {
            array_push($latestPosts, [
                'title' => $post->title,
                'slug' => $post->slug,
                'd' => $post->created_at->format('d'),
                'mon' => $post->created_at->format('M'),
                'image' => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(300, 250) : '\img\post-placeholder.png',
                'image_alt' => str_slug($post->image->name),
                'tags' => $post->tags->pluck('title')->all()
            ]);
        }

        return $latestPosts;
    } else {
        foreach ($posts as $post) {
            array_push($latestPosts, [
                'title' => $post->title,
                'slug' => $post->slug,
                'date' => $post->created_at->format('F d, Y'),
                'image' => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(60, 60) : '\img\post-placeholder.png',
                'image_alt' => str_slug($post->image->name)
            ]);
        }

        return $latestPosts;
    }
}

/**
 * Return array of 6 featured posts
 * @return array
 */
function featuredPosts()
{
    $featuredPosts = [];

    foreach ($posts = App\Post::published()->featured()->latest()->limit(6)->get() as $post) {
        array_push($featuredPosts, [
            'title' => $post->title,
            'slug' => $post->slug,
            'image' => $post->image && file_exists(public_path($post->image->path)) ? $post->image->thumbnail(360, 270) : '\img\post-placeholder.png',
            'image_alt' => str_slug($post->image->name),
            'content' => str_limit(strip_tags($post->content), 182)
        ]);
    }

    return $featuredPosts;
}

function ComposerWrapper()

{
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.sharesansar.com/top-turnovers');
    foreach ($crawler as $i => $content) {
        $indexs = [
            '1' => 'S.N.',
            '2' => 'Symbol',
            '3' => 'Companies',
            '4' => 'Turn Over',
            '5' => 'LTP(Rs)',
            '6' => 'S.N.',
            '7' => 'Symbol',
            '8' => 'Companies',
            '9' => 'Turn Over',
            '0' => 'LTP(Rs)',
        ];
        $crawler = new Crawler($content);
        $str = 0;

        foreach ($crawler->filter('td') as $i => $node) {

            $number = (string)($i + (-($i - ($i + 1))));
            $count = strlen($number);
            $row = intval(substr($number, $count - 1));
            $tds [$indexs[$row]] = $node->nodeValue;
            if ($row == 5 or $row == 0) {
                $str = $str + 1;
                $rows [$str] = $tds;
                $tds = [];
            }
        }
//        dd($rows);
        return $compose2 = array_slice($rows, 0, 5);
    }


}
//
//function NoticePull()
//{
//    $client = new Client();
//    $crawler = $client->request('GET', 'http://nepalstock.com/');
//
//    $jingu = ($crawler->filter('.panel-body')->extract('_text'));
////    dd($jingu);
//}

function liveTrading()
{
    $client = new Client();
    $crawler = $client->request('GET', 'http://merolagani.com/LatestMarket.aspx');
    foreach ($crawler as $i => $content) {
        $index = [
            '1' => 'Symbol',
            '2' => 'LTP',
            '3' => 'LTV',
            '4' => 'Change',
            '5' => 'High',
            '6' => 'Low',
            '7' => 'Open',
            '8' => 'Qty',
            '9' => 'empty1',
            '0' => 'empty2',
        ];
        $crawler = new Crawler($content);
        $str = 0;

        foreach ($crawler->filter('td') as $i => $node) {
            $number = (string)($i + (-($i - ($i + 1))));
            $count = strlen($number);
            $row = intval(substr($number, $count - 1));

            $tds [$index[$row]] = $node->nodeValue;

            if ($row == 0) {
                $str = $str + 1;
                $rows [$str] = $tds;
                $tds = [];
            }
        }
        return $index2 = array_slice($rows, 0, 5);
    }
}


function stocktable()
{
    $client = new Client();
    $crawler = $client->request('GET', 'http://merolagani.com/StockQuote.aspx');
    foreach ($crawler as $i => $content) {
        $index1 = [
            '1' => '#',
            '2' => 'Symbol',
            '3' => 'LTP',
            '4' => '%Change',
            '5' => 'High',
            '6' => 'Low',
            '7' => 'Open',
            '8' => 'Qty.',
            '9' => 'Turnover',
        ];

        $crawler = new Crawler($content);
        $str = 1;
        $num = 0;

        foreach ($crawler->filter('td') as $i => $node) {
            $tds [$index1[$str]] = $node->nodeValue;

            if ($str == 9) {
                $str = 1;
                $rows [$num] = $tds;
                $tds = [];
                $num = $num + 1;
            } else {
                $str = $str + 1;
            }
        }
//        dd($rows);
    }
    return $index3 = array_slice($rows, 0, 5);


}

//function stocktable()
//{
//    $client = new Client();
//    $crawler = $client->request('GET', 'http://nepalstock.com/todaysprice');
//    foreach ($crawler as $i => $content) {
//        $index1 = [
//            '1' => 'S.N.',
//            '2' => 'Traded Companies',
//            '3' => 'No. of Transaction',
//            '4' => 'Max Price',
//            '5' => 'Min Price',
//            '6' => 'Closing Price',
//            '7' => 'Traded Shares',
//            '8' => 'Amount',
//            '9' => 'Previous Closing',
//            '0' => 'Difference Rs.'
//
//        ];
//        $crawler = new Crawler($content);
//        $str = 0;
//
//        foreach ($crawler->filter('.unique') as $i => $node) {
//            $number = (string)($i + (-($i - ($i + 1))));
//            $count = strlen($number);
//            $row = intval(substr($number, $count - 1));
//
//            $tds [$index1[$row]] = $node->nodeValue;
//
//            if ( $row == 0 ) {
//                $str = $str + 1;
//                $rows [$str] = $tds;
//                $tds = [];
//            }
//        }
//        dd($rows);
//    }
//    return $index3 = array_slice($rows, 0, 5);
//
//
//}

//function market()
//{
//    $client = new Client();
//    $rows = [];
//    $crawler = $client->request('GET', 'http://primosecurities.com.np/home.php');
//    foreach ($crawler as $i => $content) {
//        $tds = [];
//        $crawler = new Crawler($content);
//        foreach ($crawler->filter('td') as $i => $node) {
//            $tds[] = $node->nodeValue;
//        }
//        $rows[] = $tds;
//    }
//
//    $index2 = [
//        "1" => [
//            "Market Summary" => $rows[0][4],
//        ],
//        "2" => [
//            "Market Summary" => $rows[0][5],
//        ],
//        "3" => [
//            "Market Summary" => $rows[0][6],
//        ],
//        "4" => [
//            "Market Summary" => $rows[0][7],
//        ],
//    ];
//    return $index2;
//}

/**
 * Return array of tags
 * @return array
 */
function tags()
{
    return App\Tag::all();
}

function setActive($path, $request, $active = 'active')
{
    return $request->is($path) ? $active : '';
}

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        return Request::is($path) ? ' class="active"' : '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? ' class="active"' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v) return ' class="active"';
        }
        return '';
    }
}

function nepsetime(){
    $neptime = Carbon::now()->toTimeString();
    if ($neptime >'14:59:59')
    {
        $neptime = '03:00:00';
    }
    return $neptime;

}