<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class BackendMenuCreator
{

    /**
     * The user model.
     *
     * @var \App\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => url('/home'),
            'icon'  => 'md md-home',
            'title' => 'Home'
        ];
//        array_push($menu, [
//            'class' => false,
//            'route' => route('category.index'),
//            'icon'  => 'md md-open-with',
//            'title' => 'Category'
//        ]);
        /*
         * Sample for adding menu
         * array_push($menu,
            [
                'class' => {desired class},
                'route' => {desired route or url},
                'icon'  => {md or fa icon class},
                'title' => {title},
                \\Optional Sub Menu Items
                'items' => [
                    ['route' => {route or url}, 'title' => {title}],
                    ...
                ]
            ]);
         */


//            array_push($menu, [
//                'class' => false,
//                'route' => route('user.index'),
//                'icon'  => 'md md-accessibility',
//                'title' => 'Users'
//            ]);
//
//            array_push($menu, [
//                'class' => false,
//                'route' => route('post.index'),
//                'icon'  => 'md md-web',
//                'title' => 'Posts'
//            ]);
//
//            array_push($menu, [
//                'class' => false,
//                'route' => route('contact.index'),
//                'icon'  => 'md md-perm-contact-cal',
//                'title' => 'Contact'
//            ]);
//
//            array_push($menu, [
//                'class' => false,
//                'route' => route('work.index'),
//                'icon'  => 'md md-group-work',
//                'title' => 'Work'
//            ]);
//
//            ?

//            array_push($menu, [
//                'class' => false,
//                'route' => route('career.index'),
//                'icon'  => 'md md-star',
//                'title' => 'Career'
//            ]);
//
            array_push($menu, [
                'class' => false,
                'route' => route('team.index'),
                'icon'  => 'md md-face-unlock',
                'title' => 'Team'
            ]);
//        array_push($menu, [
//            'class' => false,
//            'route' => route('media.index'),
//            'icon'  => 'md md-list',
//            'title' => 'Media'
//        ]);
        array_push($menu, [
            'class' => false,
            'route' => route('notice.index'),
            'icon'  => 'md md-list',
            'title' => 'Notice Popup'
        ]);
//        array_push($menu, [
//            'class' => false,
//            'route' => route('gallery.index'),
//            'icon' => 'md md-list',
//            'title' => 'gallery'
//        ]);
//        array_push($menu, [
//            'class' => false,
//            'route' => route('saving.index'),
//            'icon' => 'md md-list',
//            'title' => 'Interest Rate'
//        ]);
        array_push($menu, [
            'class' => false,
            'route' => route('document.index'),
            'icon' => 'md md-list',
            'title' => 'Downloads'
        ]);
        array_push($menu, [
            'class' => false,
            'route' => route('album.index'),
            'icon'  => 'md md-photo-album',
            'title' => 'Album'
        ]);
//        array_push($menu, [
//            'class' => false,
//            'route' => route('loans.index'),
//            'icon'  => 'md md-open-with',
//            'title' => 'Loans'
//        ]);
            //
            $view->with('allMenu', $menu);

    }
}