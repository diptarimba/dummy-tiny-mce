<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        return view('editor');
    }

    public function post_data(Request $request)
    {
        $data = $this->minifyHtml($request->datapost);
        $data = str_replace('"', '\"', $data);
        dd($this->minifyHtml($data));
    }

    private function minifyHtml($html) {
        // Hilangkan komentar HTML
        $html = preg_replace('/<!--.*?-->/', '', $html);

        // Hilangkan tab, spasi ekstra, dan newline
        $html = preg_replace("/\s+/", " ", $html);
        $html = preg_replace("/\s?(\>|\=|\{|\})\s?/", "$1", $html);

        // Opsional: Hilangkan spasi antara tag-tag HTML
        $html = str_replace("> <", "><", $html);

        return $html;
    }

    public function upload_image(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
