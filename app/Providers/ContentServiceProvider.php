<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use View;
use App\Models\Form;
use App\Models\Post;
use App\Models\GeneralSetting;
use App\Models\SiteSetting;
use App\Models\Service;
use App\Models\Image;
use App\Models\Category;
use App\Models\ServiceType;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     public $commonContent;
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


            $sliderImages = Image::getSliderImages();
            $siteName = GeneralSetting::getSettingByKey('site_name');
            $siteDescription = GeneralSetting::getSettingByKey('site_description');
            $siteLogo = GeneralSetting::getSettingByKey('site_logo');
            $analytics = GeneralSetting::getSettingByKey('analytics');

            $facebookLink = GeneralSetting::getSettingByKey('facebook_link');
            $linkedinLink = GeneralSetting::getSettingByKey('linkedin_link');
            $twitterLink = GeneralSetting::getSettingByKey('twitter_link');
            $youtubeLink = GeneralSetting::getSettingByKey('youtube_link');
            $categories = Category::where('type',0)->get();
            $buldingServices =  Service::where('status',1)->where('service_type',1)->orderBy('id','asc')->get();
            $planingServices =  Service::where('status',1)->where('service_type',2)->orderBy('id','asc')->get();
            $serviceTypes = ServiceType::with('services')->where('status',1)->orderBy('id','desc')->get();

            $content = [];

            $content['sliderImages'] = $sliderImages;
            $content['siteName'] = $siteName;
            $content['siteDescription'] = $siteDescription;
            $content['siteLogo'] = $siteLogo;
            $content['categories'] = $categories;
            $content['analytics'] = $analytics;
            $content['facebookLink'] = $facebookLink;
            $content['linkedinLink'] = $linkedinLink;
            $content['twitterLink'] = $twitterLink;
            $content['youtubeLink'] = $youtubeLink;
            $content['buldingServices'] = $buldingServices;
            $content['planingServices'] = $planingServices;
            $content['serviceTypes'] = $serviceTypes;

        $this->commonContent = $content;

        // dd($this->commonContent);
        View::share('commonContent', $this->commonContent);

    }
}
