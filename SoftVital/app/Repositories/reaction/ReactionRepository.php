<?php
namespace App\Repositories\reaction;

use App\Models\Medecin\Reaction;
use App\Models\Medecin\Specialite;
use Illuminate\Http\Request;

class ReactionRepository implements ReactionInterfaceRepository
{

    public function addReact(Request $request)
    {
        $existingReaction = Reaction::where('user_id', auth()->id())
            ->where('post_id', $request->post_id)
            ->exists();
        if (!$existingReaction) {
            $reaction = new Reaction();
            $reaction->user_id = auth()->id();
            $reaction->post_id = $request->post_id;
            $reaction->save();
        }
        return redirect()->back();
    }

    public function deleteReact($id)
    {
        $existingReaction = Reaction::where('post_id', $id)->first();
        $user = auth()->id();
        // dd($existingReaction);
        if ($existingReaction && $existingReaction->user_id === $user) {
            $existingReaction->delete();
        }

        return redirect()->back();
    }


}