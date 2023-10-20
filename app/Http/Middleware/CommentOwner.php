<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentAunthUserid = auth()->user()->id;
        $comment = Comment::find($request->id);

        if ($comment->user_id != $currentAunthUserid){
            return response()->json([
                'message' => "Data not found"
            ], 404);
        }

        return $next($request);
    }
}
