<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class ForTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->url();
        $url = substr($url,28,strlen($url));
        $post = Post::find($url);
        if ($post->user_id ==auth()->user()->id){
            return $next($request);
        }
        abort(404);
    }
}
