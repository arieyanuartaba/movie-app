<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvDetailModel extends ViewModel
{

    public $tvDetail;
    public $tvCredits;

    public function __construct($tvDetail, $tvCredits)
    {
        $this->tvDetail = $tvDetail;
        $this->tvCredits = $tvCredits;
    }

    public function tvDetail()
    {
        return collect($this->tvDetail)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $this->tvDetail['poster_path'] ,
            'vote_average' => $this->tvDetail['vote_average'] * 10 . '%',
            'first_air_date' =>  Carbon::parse($this->tvDetail['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvDetail['genres'])->pluck('name')->flatten()->implode(', '),
            'images' => collect($this->tvDetail['images']['backdrops'])->take(9),
            'name_for_last_session' => $this->tvDetail['next_episode_to_air'] ? $this->tvDetail['next_episode_to_air']['name'] : null,
            'air_date_for_last_session' => $this->tvDetail['next_episode_to_air'] ? Carbon::parse($this->tvDetail['next_episode_to_air']['air_date'])->format('M d, Y') : null,
            'overview_for_last_session' =>  $this->tvDetail['next_episode_to_air'] ? $this->tvDetail['next_episode_to_air']['overview'] : null,
            'images_for_last_session' => $this->tvDetail['next_episode_to_air'] ? 'https://image.tmdb.org/t/p/w500/'.$this->tvDetail['images']['backdrops'][0]['file_path'] : null,
        ])->dump();
    }

    public function tvCredits()
    {
        $castTv = collect($this->tvCredits)->get('cast');

        return collect($castTv)->take(5)->map(function($cast) {

                return collect($cast)->merge([
                'character' => $cast['character'],
                'name' => $cast['name'],
                'profile_path' => $cast['profile_path']
                    ? 'https://image.tmdb.org/t/p/w235_and_h235_face/'. $cast['profile_path']
                    : 'https://ui-avatars.com/api/?size=128&name='.$cast['name'],
                'order' => $cast['order']
            ]);
        })->sortBy('order');
    }
}
