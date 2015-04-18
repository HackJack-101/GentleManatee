# GentleManatee

## Description

This website is a part of the project developed for the [API Riot Games Challenge 2015](https://developer.riotgames.com/discussion/riot-games-api/show/bX8Z86bm) ( [rules](https://developer.riotgames.com/api-challenge) ).

It displays some *awesome* statistics about the URF mode lauched the first April 2015.


## Installation
### Requirements

To install GentleManatee you need :
- The other part of the project : [GentleManatee API](https://github.com/AamuLumi/GentleManateeAPI)
- A web server. We highly recommand Apache 2.2.22 or newer
- PHP version 5.4 or newer
- [League of Legends account](https://signup.leagueoflegends.com/en/signup/index)
- [API Riot Games account](https://developer.riotgames.com/sign-in)

## Web server configuration

You need some modules :
- php5-curl
- mod_rewrite

Be careful, the server must have all permissions on *cache* folder. 

### How to 
Clone this repo on your folder and rename configuration files :
- */config/api_key_default.php* => /config/api_key.php
- */config/server_default.php* => /config/server.php

Edit those files to save your API Riot Games key and the URI of GentleManatee API server.

On the first execution, the website will save all the API files. So, it takes some times.

## Usage
### Requirements

To apreciate our website, you need the newest version of your favorite web browser. That's all, enjoy !
It works on recent smartphones.

### Where ?

[HERE !](http://gentlemanatee.info)
