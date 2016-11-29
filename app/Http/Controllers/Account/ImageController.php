<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function postUploadPhoto(Request $request) {

        if($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'photo' => 'required|image|mimes:jpeg,jpg,gif,png|max:1000'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }

            if(Input::hasFile('photo')) {
                $photo = $request->file('photo');
                $path = 'uploads/images';
                $photo_name = Auth::user()->id."_".time()."_".$photo->getClientOriginalName();
                $moved = $photo->move($path, $photo_name);

                if($moved) {
                    $user = Auth::user();
                    $user->photo_url = $photo_name;
                    $user->save();

                    return response()->json([
                        'success' => true,
                        'photo_url' =>  $path."/".$photo_name,
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => "Не удалось загрузить изображение"
                ]);
            } else {

                return response()->json([
                    'success' => false,
                    'message' => "Файл не выбран"
                ]);
            }
        }
    }
}
