# DOWNLOADS

_https://getcomposer.org_ dependency manager
Follow the link and instruction in it to get started

`echo $PATH`
`sudo vim /etc/paths`
`echo $HOME`

Substitute the result obtained from the previous last commande to the _paths_ as follows _\$HOME/.composer/vendor/bin_ save then run `echo $PATH`

# SECTION 2 Routing

`Route::get('test',function() {return view('test');});`

`return view('test',['name' => $name])` pass request data to a view

---

if(! array_key_exists($post, $posts)){
abort(404, 'Sorry, that post was not found.');
}

---

# SECTION 3 Database Access

`mysql -u root` to connect to mysql

`create database database_name;` to create a database from terminal

Query Builder approache `$post = .\DB::table('posts')->where('slug',, $slug)->first();`

Eloquent Model `$post = Post::where('slug','$slug')->first();`

To create a table, use migration `php artisan make:migration create_posts_table`

`$table->timestamp('published_at')->nullable();` means that the _published_at_ is optional

To run migration `php artisan migrate`

In _Production_ to add an additional column to your table run `php artisan make:migration add_title_to_posts_table`

then add the column `$table->string('title');`

and drop it `$table->dropColumn('title');`

finally run `php artisan migrate`

In _Development Mode_ you need just to add the column and run `php artisan migrate:fresh` which drop all the table and re-run everything from scratch

To Generates a migration and controller in a single command run `php artisan make:model Project -mc`

Command we could run on _tinker_
`$assignment = new App\Assignment;`
`$assignment->body = 'Finish school work';`
`$assignment->save();` Persist to the database
`App\Assignment::all();` Fetch everything from the assignments table
`App\Assignment::first();` Fetch the first record
`App\Assignment::first();`
`App\Assignment::where('completed',false)->get();`

# SECTION 4 Layout Pages

Set an active link s follow `class="{{Request::path() === 'about' ? 'current_page_item' : ''}}"` or `class="{{Request::is('about')? 'current_page_item' : ''}}"`

Asset Compilation with Laravel Mix and Webpack `npm install` then compile by running `npm run dev` or `npm run watch`

`<link rel="stylesheet" href="{{ mix('css/app.css') }}">` Laravel mix helper function

# SECTION 5 Forms

The Seven Restful Controller Actions `index (Render a list of a resource.), create (Shows a view to create a new resource.), store (Persist the new resource), show (Show a single resource.), edit (Show a view to edit an existing resource), update (Persist the edited resource), destroy (Delete the resource)`

`php artisan make:controller ProjectsController -r -m Project` Generates the Seven Restful Controller Actions with the associated model

## Restful Routing

_GET /articles_
_GET /articles/:id_
_POST /articles_
_PUT /articles/:id_
_DELETE /articles/:id_

_GET /videos_
_GET /videos/create_
_POST /videos_
_GET /videos/2_
_GET /videos/2/edit_
_PUT /videos/2_
_DELETE /videos/2_

_GET /videos/subscribe_

_POST /videos/subscriptions => VideoSubscriptionsController@store_

`@csrf` _Cross Site Request Forgery_

`return redirect('/articles/' .$article->id);` Redirect back to to the edited article

## To output feedback for form validation

---

 <input type="text" class="input @error('title') is-danger @enderror" name="title" id="title">

            @error('title')
              <p class="help is-danger">{{ $errors->first('title') }}</p>
            @enderror

---

### Validation

---

request()->validate([
'title' => 'required',
'excerpt' => 'required',
'body' => 'required'
]);

---

# SECTION 6 Controller Techniques

Use something else other than id as a wildcard
_public function getRouteKeyName(){ return 'slug' }_ meaning `Article::where('slug', $article)->first()`

To avoid _Mass Assignment Error_ `protected $fillable = ['title', 'excerpt', 'body'];` or `protected $guarded = [];`

Validate and Create Data at the same time

---

      Article::create(request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
    ]));

---

Update: Assign the attribute and persist it all in one go

---

\$article->update(request()->validate([
'title' => 'required',
'excerpt' => 'required',
'body' => 'required'
]));

---

If Validation is identical then:

`` public function validateArticle() { request()->validate([ 'title' => 'required', 'excerpt' => 'required', 'body' => 'required' ]);` ``
`
_$article->update($this->validateArticle());_
