
# GoGoAnime API (Unofficial)

This is an unofficial GogoAnime API. It just scrapes GogoAnime and fetch the data from GoggoAnime and presents as JSON format.

## Usage:

### Get recent anime
> Params: `int: type` and `int: page`
> `type=1` (Language japanes) | `type=2` (English dubbed) | `type=3` (Language Chinese)

Example: `https://api.example.com/recent.php?type=1&page=2`

```JSON

[
    {
        "episodeId": "peerless-martial-spirit-episode-406",
        "animeId": "peerless-martial-spirit",
        "animeTitle": "Peerless Martial Spirit",
        "animeImg": "https://gogocdn.net/cover/peerless-martial-spirit.png",
        "episodeNum": "406",
        "subOrDub": "sub"
    },
    {
        "episodeId": "wu-shen-zhu-zai-episode-468",
        "animeId": "wu-shen-zhu-zai",
        "animeTitle": "Wu Shen Zhu Zai",
        "animeImg": "https://gogocdn.net/cover/wu-shen-zhu-zai.png",
        "episodeNum": "468",
        "subOrDub": "sub"
    }
]
```


### Get popular anime
> Params: `int: page`

Example: `https://api.example.com/popular.php?page=21`

```JSON

[
    {
        "animeId": "bloody-escape-jigoku-no-tousou-geki",
        "animeTitle": "Bloody Escape: Jigoku no Tousou Geki",
        "animeImg": "https://gogocdn.net/cover/bloody-escape-jigoku-no-tousou-geki.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "doraemon-movie-43-nobita-no-chikyuu-koukyougaku",
        "animeTitle": "Doraemon Movie 43: Nobita no Chikyuu Koukyougaku",
        "animeImg": "https://gogocdn.net/cover/doraemon-movie-43-nobita-no-chikyuu-koukyougaku.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "kidou-senshi-gundam-seed-freedom",
        "animeTitle": "Kidou Senshi Gundam SEED Freedom",
        "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
        "releasedDate": "2024"
    }
]
```


### Get movies
> Params: `int: page`

Example: `https://api.example.com/movies.php?page=21`

```JSON

[
    {
        "animeId": "bloody-escape-jigoku-no-tousou-geki",
        "animeTitle": "Bloody Escape: Jigoku no Tousou Geki",
        "animeImg": "https://gogocdn.net/cover/bloody-escape-jigoku-no-tousou-geki.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "doraemon-movie-43-nobita-no-chikyuu-koukyougaku",
        "animeTitle": "Doraemon Movie 43: Nobita no Chikyuu Koukyougaku",
        "animeImg": "https://gogocdn.net/cover/doraemon-movie-43-nobita-no-chikyuu-koukyougaku.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "kidou-senshi-gundam-seed-freedom",
        "animeTitle": "Kidou Senshi Gundam SEED Freedom",
        "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
        "releasedDate": "2024"
    }
]
```


### Get new season anime
> Params: `int: page`

Example: `https://api.example.com/new-season.php?page=21`

```JSON

[
    {
        "animeId": "bloody-escape-jigoku-no-tousou-geki",
        "animeTitle": "Bloody Escape: Jigoku no Tousou Geki",
        "animeImg": "https://gogocdn.net/cover/bloody-escape-jigoku-no-tousou-geki.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "doraemon-movie-43-nobita-no-chikyuu-koukyougaku",
        "animeTitle": "Doraemon Movie 43: Nobita no Chikyuu Koukyougaku",
        "animeImg": "https://gogocdn.net/cover/doraemon-movie-43-nobita-no-chikyuu-koukyougaku.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "kidou-senshi-gundam-seed-freedom",
        "animeTitle": "Kidou Senshi Gundam SEED Freedom",
        "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
        "releasedDate": "2024"
    }
]
```


### Search anime
> Params: `int: page` and `string: q`

Example: `https://api.example.com/search.php?page=1&q=naruto`

```json

[
    {
        "animeId": "bloody-escape-jigoku-no-tousou-geki",
        "animeTitle": "Bloody Escape: Jigoku no Tousou Geki",
        "animeImg": "https://gogocdn.net/cover/bloody-escape-jigoku-no-tousou-geki.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "doraemon-movie-43-nobita-no-chikyuu-koukyougaku",
        "animeTitle": "Doraemon Movie 43: Nobita no Chikyuu Koukyougaku",
        "animeImg": "https://gogocdn.net/cover/doraemon-movie-43-nobita-no-chikyuu-koukyougaku.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "kidou-senshi-gundam-seed-freedom",
        "animeTitle": "Kidou Senshi Gundam SEED Freedom",
        "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
        "releasedDate": "2024"
    }
]
```



### Get anime by genre
> Params: `int: page` and `string: genre`

Example: `https://api.example.com/genre.php?page=1&genre=action`

```JSON

[
    {
        "animeId": "bloody-escape-jigoku-no-tousou-geki",
        "animeTitle": "Bloody Escape: Jigoku no Tousou Geki",
        "animeImg": "https://gogocdn.net/cover/bloody-escape-jigoku-no-tousou-geki.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "doraemon-movie-43-nobita-no-chikyuu-koukyougaku",
        "animeTitle": "Doraemon Movie 43: Nobita no Chikyuu Koukyougaku",
        "animeImg": "https://gogocdn.net/cover/doraemon-movie-43-nobita-no-chikyuu-koukyougaku.png",
        "releasedDate": "2024"
    },
    {
        "animeId": "kidou-senshi-gundam-seed-freedom",
        "animeTitle": "Kidou Senshi Gundam SEED Freedom",
        "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
        "releasedDate": "2024"
    }
]
```



### Get anime details
> Params: `string: id`

Example: `https://api.example.com/anime-details.php?id=kidou-senshi-gundam-seed-freedom`

```JSON

{
    "animeTitle": "Kidou Senshi Gundam SEED Freedom",
    "animeImg": "https://gogocdn.net/cover/kidou-senshi-gundam-seed-freedom-1718073134.png",
    "type": "Movie",
    "releasedDate": "2024",
    "status": "Completed",
    "genres": "action, drama, mecha, military, sci-fi, space",
    "synopsis": "In C.E.75, the fighting still continues.\r\n\r\nThere are independence movements, and aggression by Blue Cosmos... In order to calm the situation, a global peace monitoring agency called COMPASS is established, with Lacus as its first president. As members of COMPASS, Kira and his comrades intervene into various regional battles. Then a newly established nation called Foundation proposes a joint operation against a Blue Cosmos stronghold.",
    "otherNames": "機動戦士ガンダムSEED FREEDOM \n                           きどうせんしガンダムシード フリーダム \n                           机动战士GUNDAM SEED FREEDOM \n                           機動戰士GUNDAM SEED FREEDOM \n                           Kidō Senshi Gundamu Shīdo Furiidamu \n                           Mobile Suit Gundam SEED Freedom",
    "totalEpisodes": 1,
    "episodesList": [
        {
            "episodeId": "kidou-senshi-gundam-seed-freedom-episode-1",
            "episodeNum": "1"
        }
    ]
}
```



### Get streaming link
> Params: `string: id`

Example: `https://api.example.com/generate-link.php?id=naruto-episode-200`

```JSON
{
    "source": [
        {
            "file": "https://www110.anzeat.pro/streamhls/027e9529af2b06fe7b4f47e507a787eb/ep.200.1709248990.m3u8",
            "label": "hls P",
            "type": "hls"
        }
    ],
    "source_bk": [
        {
            "file": "https://www110.anicdnstream.info/videos/hls/vCrDBHjjXKOfRWrDrlkbfA/1725209715/25581/027e9529af2b06fe7b4f47e507a787eb/ep.200.1709248990.m3u8",
            "label": "hls P",
            "type": "hls"
        }
    ],
    "track": [],
    "advertising": [],
    "linkiframe": "https://awish.pro/e/vacaad1pcg10"
}
```

