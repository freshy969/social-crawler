<?php

namespace SocialCrawler\Domain;

class Gmail extends Email
{

    /**
     * {@inheritdoc}
     */
    public function getDomain()
    {
        return 'gmail\.com';
    }
}
