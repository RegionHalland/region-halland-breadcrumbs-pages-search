# Skapa en breadcrums med hjälp av id + title

## Hur man använder Region Hallands plugin "region_halland_breadcrumbs_pages_search"

Nedan följer instruktioner hur du kan använda pluginet "region_halland_breadcrumbs_pages_search".


## Användningsområde

Denna plugin skapar en array() med "breadcrumbs" som man kan visa på en "söksida"


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-breadcrumbs-pages-search/blob/master/LICENSE)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-breadcrumbs-pages-search.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-breadcrumbs-pages-search.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-breadcrumbs-pages-search": "1.0.0"
},
```


## Visa "breadcrumbs" på en söksida via "Blade"

- OBS! Notera att både id + title måste anges
- Du kan också ange hemnamn, dvs "start" i detta exempel. Lämnas detta tomt hämtas sitens namn

```sh
@if(function_exists('get_region_halland_breadcrumbs_pages_search'))
  @php($myBreadcrumbs = get_region_halland_breadcrumbs_pages_search(114,'min sida','Start')) 
  @if(isset($myBreadcrumbs))
    @foreach ($myBreadcrumbs as $myBreadcrumb)
      @if ($myBreadcrumb['url'])
        <a href="{{ $myBreadcrumb['url'] }}">{!! $myBreadcrumb['name'] !!}</a>
      @else
        <span>{!! $myBreadcrumb['name'] !!}</span>
      @endif
    @endforeach 
  @endif
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=3)
  0 => 
    array (size=2)
      'name' => string 'Exempel' (length=7)
      'url' => string 'http://exempel.se' (length=17)
  1 => 
    array (size=2)
      'name' => string 'Lorem ipsum' (length=11)
      'url' => string 'http://exempel.se/lorem-ipsum/' (length=30)
  2 => 
    array (size=2)
      'name' => string 'Aldu integer' (length=12)
      'url' => boolean false
```

## Hämta id från json-filen

```sh
@php($myID = get_region_halland_breadcrumbs_pages_search_id($data['_id']))
```

## Versionhistorik

### 1.2.0
- Uppdaterat med information om licensmodell
- Bifogat fil med licensmodell

### 1.1.0
- Lagt till så man kan få ut ID från json-filen

### 1.0.0
- Första version
