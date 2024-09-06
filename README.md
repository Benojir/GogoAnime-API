
# GoGoAnime API (Unofficial)

This is an unofficial GogoAnime API. It just scrapes GogoAnime and fetch the data from GoggoAnime and presents as JSON format.

<a href="?tab=readme-ov-file#installation">Installation</a>
<a href="?tab=readme-ov-file#usage">Usage</a>
- <a href="?tab=readme-ov-file#get-recent-anime">Get Recent Anime</a>

## Installation:
- Just clone this repository in your server's public_html directory.

## Usage:

### Get recent anime
> Params: `int: type` and `int: page`
> `type=1` (Language japanes) | `type=2` (English dubbed) | `type=3` (Language Chinese)

Example: `https://api.example.com/recent.php?type=1&page=2`

```JSON

[
    {
        "episodeId": "string",
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "episodeNum": "string",
        "subOrDub": "string"
    },
    {
        "episodeId": "string",
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "episodeNum": "string",
        "subOrDub": "string"
    }
]
```


### Get popular anime
> Params: `int: page`

Example: `https://api.example.com/popular.php?page=21`

```JSON

[
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    }
]
```


### Get movies
> Params: `int: page`

Example: `https://api.example.com/movies.php?page=21`

```JSON

[
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    }
]
```


### Get new season anime
> Params: `int: page`

Example: `https://api.example.com/new-season.php?page=21`

```JSON

[
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    }
]
```


### Search anime
> Params: `int: page` and `string: q`

Example: `https://api.example.com/search.php?page=1&q=naruto`

```json

[
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    }
]
```



### Get anime by genre
> Params: `int: page` and `string: genre`

Example: `https://api.example.com/genre.php?page=1&genre=action`

```JSON

[
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    },
    {
        "animeId": "string",
        "animeTitle": "string",
        "animeImg": "string",
        "releasedDate": "string"
    }
]
```



### Get anime details
> Params: `string: id`

Example: `https://api.example.com/anime-details.php?id=string`

```JSON

{
    "animeTitle": "string",
    "animeImg": "string",
    "type": "string",
    "releasedDate": "string",
    "status": "string",
    "genres": "string",
    "synopsis": "string",
    "otherNames": "string",
    "totalEpisodes": "integer",
    "episodesList": [
        {
            "episodeId": "string",
            "episodeNum": "string"
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
            "file": "string",
            "label": "string",
            "type": "string"
        }
    ],
    "source_bk": [
        {
            "file": "string",
            "label": "string",
            "type": "string"
        }
    ],
    "track": [],
    "advertising": [],
    "linkiframe": "string"
}
```

