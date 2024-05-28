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
        $toGeminiCommand = "# やって欲しいこと\n次のテキストを基に日報を作成してください。\n# 日報には、次の内容を含めてください。\n- 実施したことを箇条書き\n- やったことに対する所感をポジティブな内容で文章にして書いてください。改行も入れてください。\n- やったことに対して次にとるべき行動を文章で書いてください\n```\n" . $request->toGeminiText . "\n```";
        // dd($toGeminiCommand);

        $result = [
            'task' => $request->toGeminiText,
            'content' => Str::markdown(Gemini::geminiPro()->generateContent($toGeminiCommand)->text()),
        ];
        // dd($result);
        return view('index', compact('result'));
    }
}
