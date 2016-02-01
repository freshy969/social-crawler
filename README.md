# Social Crawler

Find emails from socials network !

## Dependency

* Google URL
* Monolog

## Find e-mails from Gmail in Instagram

Define which email you're going to find and where you want to search, in out example we're going to find
email from gmail in **Instagram**

``` php
$factory = new \SocialCrawler\Domain\Factory();
$email = $factory->create(\SocialCrawler\Domain\Gmail::GMAIL);

$source =  new \SocialCrawler\Domain\Source\Instagram();
```

Then just execute the search with **GoogleUrl**

``` php
$engine = new \GoogleUrl();
$search = new \SocialCrawler\Domain\Container($engine, $source);

$result = $search->retrieveDataFromSource($email, $page)
    ->getResultSet();
```

As a last step iterate over the result to get the emails

``` php

foreach ($result as $object) {
    try {
        print $email->find($object->getTitle()) . '<br/>';
    } catch (\Exception $exception) {
        //print "Couldn't find email in the object in the title ({$object->getTitle()}) <br/>";
    } finally {
        try {
           print $email->find($object->getSnippet()) . '<br/>';
        } catch (\Exception $exception) {
            //print "Couldn't find email in the object in the snippet ({$object->getSnippet()}) <br/>";
        }
    }
}
```
