<?php

namespace App\Jobs;

use App\Jobs\Job;
use Request;
use Illuminate\Contracts\Bus\SelfHandling;
//use Syrator\Locator\PreferredLanguageDetector;

class SetLocale extends Job implements SelfHandling
{
    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $site = Request::input('site', 'desktop');
        $site_langs = config('site.lang.'.$site);
        $sid = 'syrator.lang.'.$site;

        if (class_exists('\Syrator\Locator\PreferredLanguageDetector')) {
            $preferral_language = with(new \Syrator\Locator\PreferredLanguageDetector)->detect($site_langs);
        } else {
            $preferral_language = Request::getPreferredLanguage($site_langs);
        }

        if (!session()->has($sid)) {
            session()->put($sid, $preferral_language);
        }

        app()->setLocale(session($sid));
    }
}
