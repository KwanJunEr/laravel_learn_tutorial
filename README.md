<p>
  <h5>composer create-project laravel/laravel your-app</h5>
  <p>
    using Composer only gives you a clean Laravel backend, and you can connect with other frontend framework separately:
    It setting up Laravel purely as a backend — meaning:
    <ul>
      <li> It runs PHP and serves APIs (routes like /api/...). </li>
      <li>It uses MySQL, Eloquent models, controllers, etc.</li>
      <li>It can serve JSON data to any frontend.</li>
    </ul>
    But can add in other stuff later 
  </p>
</p>

<hr>
<h1>Notes Section1 </h1>
<h2>Development Environment</h2>
<ul>
  <li>Laragon </li>
  <li>Laravel Herd: https://herd.laravel.com/windows</li>
</ul>

<h1>Laragon</h1>
<p>Can go to MySQL to open HeidiSQL</p>

<h1>Blade Directives</h1>
<p>Documentation Link: https://laravel.com/docs/11.x/blade#blade-directives </p>

<h2>Laragon Apache Cannot Run issue with different php version </h2>
<p>Have to refer to Thread-safe php version</p>

<hr/>
<h1>resources/ vs public/</h1>

<h6>resources/ folder </h6>
<ul>
  <li>Contains raw, uncompiled assets:</li>
  <ul>
    <li>CSS (e.g., SCSS/SASS)</li>
    <li>JavaScript (e.g., ES6, Vue/React components)</li>
    <li>Images you might process</li>
  </ul>
  <li>These files are not directly accesible via URL</li>
  <li>They need to be compiled or copied to the public/folder before the brower can load them </li>
</ul>

<h6>public/ folder</h6>
<ul>
  <li>The only folder accessible directly by the browser.</li>
  <li>Any file you want to load with <link>, <script>, or <img> must be in public/.</li>
  <li>The URL for the browser corresponds to the path in public/: </li>
</ul>

2️⃣ How assets flow in Laravel

1)You write raw assets in resources/ (e.g., resources/css/app.css).
2)You run Laravel Mix / Vite to compile assets:

npm run dev   # development
npm run build # production

3)Compiled assets are output to public/ (default public/css, public/js).
4)The browser accesses only the files in public/.

3️⃣ Why not serve directly from resources/

1)resources/ is not web-accessible for security reasons.
2) If you expose resources/ to the web, users could see your uncompiled source code, config files, or even secrets accidentally.
3) Laravel is designed so that only public/ is the document root.
4) Think of resources/ as your “workspace” and public/ as your “live website folder” that the web server can serve.

<hr/>
<h1>Route Linking</h1>
<h2>Blade Link Without Named Route</h2>
<pre>
  <code>
<a href="/" class="btn" style="background-color: #4643d3; color: white;">
    <i class="fas fa-chevron-left"></i> Back
</a>
  </code>
</pre>

<p>The browser will go to the root URL (/)</p>
<p>Works exactly the same as using a named route, just less flexible if the URL changes later</p>

<h2>Named Routes</h2>
<pre>
  <code>
    Route::get('/', function () {
    return view('customer.index');
})->name('home');
  </code>
</pre>

<hr/>

<h1>Laravel Modules</h1>
<p>Steps to accomplish it</p>
<h4>Step 1: Install via Composer</h4>
<pre>
  <code>
    composer require nwidart/laravel-modules
  </code>
</pre>
<h4>Publish config (optional)</h4>
<p>You can publish the config if you want to customize paths:</p>
<pre>
  <code>
    php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"=
  </code>
</pre>
<h4>Creating a module: </h4>
<pre>
  <code>
    php artisan module:make Blog
  </code>
</pre>
<p>This will generate a folder strucutre for the Blog Module inside Modules/Blog with subfolders like Config, Database, Http, Providers, Routes,Views, e.t.c</p>
<p>Each module behaves like a mini laravel app, with its own routes, controllers, models, migrations, views, and even config if needed</p>

<h1>To donwload extensions</h1>
<p>Add in ddl files in ext in bin in php</p>

<h1>Creating a specific resource in a moodule</h1>
<p>E.g. Create a new controller in a specific module</p>
<pre>
  <code>
    php artisan module:make-controller ControllerName ModuleName
  </code>
</pre>
<ul>
  <li>ControllerName : The name of your controller</li>
  <li>ModuleName : The name of the module where it will be created</li>
</ul>

<h4>Another Example of Creating Model </h4>
<pre>
  <code>
    php artisan module:make-model SettingTierCondition Tier
  </code>
</pre>

<h1>Database Seeder</h1>
<p>Commands and Steps to Create It</p>
<h4>Step 1 </h4>
<pre>
  <code>
    php artisan make:seeder SettingTierConditionSeeder
  </code>
</pre>
<h4>Step 2</h4>
<pre>
  <code>
    <?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTierConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_tier_condition')->insert([
            [
                'name' => 'Active Units',
                'slug' => 'active_units',
                'is_wallet' => true,
                'status' => true,
            ],
            [
                'name' => 'Total Spending',
                'slug' => 'total_spending',
                'is_wallet' => false,
                'status' => true,
            ],
            [
                'name' => 'Total Earned Units',
                'slug' => 'total_earned_units',
                'is_wallet' => true,
                'status' => true,
            ],
            [
                'name' => 'Months Since Joining',
                'slug' => 'months_since_joining',
                'is_wallet' => false,
                'status' => true,
            ],
        ]);
    }
}
  </code>
</pre>
<h3>Step 3</h3>
<pre>
  <code>
    php artisan db:seed --class=SettingTierConditionSeeder
  </code>
</pre>

