<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use Illuminate\Support\Facades\Config;
use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;

class ConfigurationTest extends TestCase
{
    /** @test */
    public function ga_script_is_visible_only_if_ga_id_is_set()
    {
        Config::set('blogged.settings.ga_id', '');
        $this->get('/blog')
            ->assertDontSee('googletagmanager');

        Config::set('blogged.settings.ga_id', 'ga_code_id');
        $this->get('/blog')
            ->assertSee('googletagmanager')
            ->assertSee('ga_code_id');
    }

    /** @test */
    public function app_name_is_visible_only_if_enabled()
    {
        Config::set('blogged.ui.show_app_name', false);
        Config::set('app.name', 'hoolla');
        $this->get('/blog')
            ->assertDontSee('<span>hoolla</span>');

        Config::set('blogged.ui.show_app_name', true);
        Config::set('app.name', 'hoolla');
        $this->get('/blog')
            ->assertSee('<span>hoolla</span>');
    }

    /** @test */
    public function dynamic_color_palette()
    {
        Config::set('blogged.ui.primary_color', '#custom_color');
        
        $this->get('/blog')
            ->assertSee('#custom_color');
    }

    /** @test */
    public function disqus_forum_will_be_visible_only_if_selected_and_enabled()
    {
        $article = factory(Article::class)->create();
        
        Config::set('blogged.forum.default', '');
        Config::set('blogged.forum.enabled', false);
        $this->get($article->path())
            ->assertDontSee('disqus_thread');
            
        Config::set('blogged.forum.default', 'disqus');
        Config::set('blogged.forum.enabled', true);
        Config::set('blogged.forum.services.disqus.site_name', 'blogged');
        $this->get($article->path())
            ->assertSee('disqus_thread');
    }
}