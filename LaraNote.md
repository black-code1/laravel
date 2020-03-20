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
