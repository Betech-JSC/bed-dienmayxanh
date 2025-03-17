<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use JamstackVietnam\Sitemap\Sitemap;
use JamstackVietnam\Blog\Models\Post;
use JamstackVietnam\Blog\Models\PostCategory;
use JamstackVietnam\Tag\Models\Tag;
use JamstackVietnam\Job\Models\Job;
use App\Models\History;
use App\Models\Service;

class SitemapController extends Controller
{
    public function index()
    {
        return Sitemap::create()
            ->addStaticRoutes()
            ->add(Post::active()->get()->pluck('url'))
            ->add(PostCategory::active()->get())
            ->add(Tag::active()->get())
            ->add(Job::active()->get())
            ->add(History::active()->get())
            ->add(Service::active()->get())
            ->render();
    }
}
