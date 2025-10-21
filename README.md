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
