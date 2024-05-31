<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

use Illuminate\Support\Str;

class GeminiController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function entry(Request $request)
    {
        $toGeminiCommand = "# やって欲しいこと\n次のテキストは今日やったことなので、そのテキストを基に日報を作成してください。\n# 日報に入れてほしいこと\n- PDCAを用いた計画に対して実行した内容を数値化して書いてください。\n- 更に、次にとるべき行動をPDCAを用いて書いてください。\n- 最後に、ポジティブな所感を入れてください。\n```\n" . $request->toGeminiText . "\n```";
        // dd($toGeminiCommand);

        $result = [
            'text' => $request->toGeminiText,
            'command' => Str::replace("\n", "<br>", $toGeminiCommand),
            'content' => Str::markdown(Gemini::geminiPro()->generateContent($toGeminiCommand)->text()),
        ];
        // dd($result);
        return view('index', compact('result'));
    }
}
