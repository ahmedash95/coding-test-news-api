# News API

This simple applications loads the important news from 2 sources
- FoxNews
- NewYorkTimes

The project has 2 main files
- index.php
- src/NewsAggregator

And it has 2 main packages
- package/FoxNews
- package/NYTimes

# How to run
This applications runs on CLI only. so you can simply install composer
```shell script
composer install
``` 
Then
```shell script
php index.php
```

and The output you would see is something like 
```shell script
$ php index.php

Array
(
    [0] => Array
        (
            [title] => Republicans Keep Coming Up With More Batshit Reasons to Oppose D.C. Statehood
            [author] => Caleb Ecarma
            [image] => https://media.vanityfair.com/photos/605a5e116c0da06e2048a353/16:9/w_1280,c_limit/GettyImages-1231358748.jpg
            [publish_date] => 2021-03-23T21:34:44Z
            [source] => Vanity Fair
            [url] => https://www.vanityfair.com/news/2021/03/republicans-oppose-dc-statehood
        )

    [1] => Array
        (
            [title] => Tesla Likely Won't Be Worth Anything Close To $3000
            [author] => The Value Portfolio
            [image] => https://static.seekingalpha.com/cdn/s3/uploads/getty_images/506868328/medium_image_506868328.jpg
            [publish_date] => 2021-03-23T21:29:52Z
            [source] => Seeking Alpha
            [url] => https://seekingalpha.com/article/4415688-tesla-likely-wont-be-worth-anything-close-to-3000
        )

    [2] => Array
        (
            [title] => If Tesla can determine that drivers aren’t paying attention, shouldn’t it warn drivers in the moment?
            [author] => Fred Lambert
            [image] => https://i0.wp.com/electrek.co/wp-content/uploads/sites/3/2016/03/tesla-autopilot-ap.jpg?resize=1200%2C628&quality=82&strip=all&ssl=1
            [publish_date] => 2021-03-23T21:28:18Z
            [source] => Electrek
            [url] => https://electrek.co/2021/03/23/if-tesla-can-determine-that-drivers-arent-paying-attention-shouldnt-it-warn-drivers-in-the-moment/
        )
)
```


# NewsAggregator
This class is used in index.php to load the news from the providers and return them

# Package
This directory contains third party packages to fetch news from. 

**PLEASE DO NOT CHANGE ANY CODE IN THIS PACKAGE**


# TODO

So what we expect from you in this task? 

we want you to help us improve this code and we first need you to address it's issues and bad code smells and how can we refactor this code to be Maintainable, Extendable, and Testable by applying the principles and best OOP practises.

Feel free to change any code in index.php or src package. but please be careful that you should not change any code in `package` directory.

# Acceptance Criteria

- Use FoxNews and NewYorkTimes.
- There is another broken provider called BrokenProviderNews please use it in the aggregator class, this one is always throwing FileNotFoundException. and you need to handle its failure in the application
- Use logging to log any failure when fetching news from any of the providers and store them in app-errors.log file. to make it simple we suggest to use this logging library [Monolog](https://github.com/Seldaek/monolog).
- Make it easy to add any provider later. as the purpose after your changes will be to add 100 provider. but you don't need to add them your self.