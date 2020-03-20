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
