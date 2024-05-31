<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-sky-200 flex justify-center">
    <div class="w-full max-w-3xl mx-5">
        <h1 class="mt-5 text-xl font-bold text-blue-900">{{config('app.name')}}</h1>
        
        <form action="{{route('entry')}}" method="post" class="flex mt-5">
            @csrf
            <div class="relative w-full">
                <!-- Textarea -->
                <textarea name="toGeminiText" id="hs-textarea-ex-2" class="p-4 pb-12 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:outline-none focus:ring focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" autofocus>@isset($result['text']){{$result['text']}}@endisset</textarea>
            
                <!-- Toolbar -->
                <div class="absolute bottom-px inset-x-px p-2 rounded-b-md bg-gray-100 dark:bg-neutral-800">
                    <div class="flex justify-end items-center">
                        <!-- Button Group -->
                        <div class="flex items-center gap-x-1">
                            <!-- Send Button -->
                            <button type="submit" class="inline-flex flex-shrink-0 justify-center items-center size-8 rounded-lg text-white bg-blue-600 hover:bg-blue-500 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"></path>
                                </svg>
                            </button>
                            <!-- End Send Button -->
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
                <!-- End Toolbar -->
            </div>
            <!-- End Textarea -->
        </form>
    
        @isset($result)
            <hr class="mt-5 border-blue-300 border-2 rounded">
            <div class="p-3 mt-5 bg-white rounded">
                <p>{!!$result['command']!!}</p>
            </div>
    
            <hr class="mt-5 border-blue-300 border-2 rounded">
            <div class="p-3 mt-5 bg-white rounded">
                {!!$result['content']!!}
            </div>
        @endisset
        <hr class="mt-5 border-blue-300 border-2 rounded">
        <footer class="flex justify-center">
            <a href="https://portfolio.daianaka.live" class="my-3 text-blue-900 text-sm">&copy;2024 DaiNaka</a>
        </footer>
    </div>
</body>
</html>