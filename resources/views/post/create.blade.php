<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録フォーム
        </h2>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto px-6">
        <form>
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for ="title" class="font-semibold mt-4">件名</label>
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title">
                        <!-- componentsのprimary-button.blade.phpを使ってる --!>
                        <a href = "{{ route('test') }}">
                        <x-primary-button>
                            追加
                        </x-primary-button>
                        </a>
                </div>
            </div>
        </form>
    </div> --}}

    {{-- テンプレ 出典 Flowrift  https://flowrift.com/c/form/bUtAg?view=preview--}}
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      @if(session('message'))
        <div class="text-red-600 font-bold">
          {{session('message')}}
        </div>
      @endif
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">タスクの追加</h2>
      
            {{-- <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">フォーム</p> --}}
          </div>
          <!-- text - end -->
      
          <!-- form - start -->
          <form method="post" action="{{ route('post.store') }}">
            @csrf
            <div class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
              {{-- <textarea name="upload" class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea> --}}
              <div class="sm:col-span-2">
                <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">タイトル</label>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input name="title" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{old('title')}}">
              </div>
        
              <div class="sm:col-span-2">
                <label for="content" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">内容</label>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                <textarea name="content" class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">{{old('content')}}</textarea>
              </div>
        
              <div class="sm:col-span-2">
                <label for="assignee" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">担当者</label>
                <x-input-error :messages="$errors->get('assignee')" class="mt-2" />
                <input name="assignee" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{old('assignee')}}">
              </div>
        
              <div class="sm:col-span-1">
                <label for="start_date" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開始日</label>
                  <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                  <input type="date" name="start_date" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{old('start_date')}}">
              </div>
              <span></span>
              <div class="sm:col-span-1">
                <label for="finish_date" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">完了期日</label>
                <x-input-error :messages="$errors->get('finish_date')" class="mt-2" />
                <input type="date" name="finish_date" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{old('start_date')}}">
              </div>

              {{-- !未使用! 日付選択 Tailwind CSSテンプレ --}}
              {{-- <div date-rangepicker class="flex items-center">
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                      </svg>
                  </div>
                  <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                      </svg>
                  </div>
                  <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
              </div>
              </div> --}}
              {{-- 日付選択テンプレここまで --}}

              <div class="sm:col-span-2">
                <label for="upload" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像、動画アップロード(アップロード機能未実装のためエラーになります)</label>
                {{--テンプレ出典 sailboatUI https://sailboatui.com/docs/forms/file-input/ --}}           
                  {{-- <div class="mx-auto max-w-xs"> --}}
                      {{-- <label for="example5" class="mb-1 block text-sm font-medium text-gray-700">Upload file</label> --}}
                      <label class="flex w-full cursor-pointer appearance-none items-center justify-center rounded-md border-2 border-dashed border-gray-200 p-6 transition-all hover:border-primary-300">
                      <div class="space-y-1 text-center">
                          <div class="mx-auto inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                          </svg>
                          </div>
                          <div class="text-gray-600"><a href="#" class="font-medium text-primary-500 hover:text-primary-700">クリックしてアップロード</a>またはドラッグアンドドロップ</div>
                          <p class="text-sm text-gray-500">SVG, PNG, JPG or GIF (max. 800x400px)</p>
                      </div>
                      <input name="upload" id="example5" type="file" class="sr-only" />
                      </label>
                  {{-- </div>   --}}
                {{-- sailboatUIここまで --}}
              </div>
        
              <div class="flex items-center justify-between sm:col-span-2">
                <button class="inline-block rounded-lg bg-blue-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-blue-300 transition duration-100 hover:bg-blue-600 focus-visible:ring active:bg-blue-700 md:text-base">追加</button>
        
                <!--<span class="text-sm text-gray-500">*Required</span> -->
              </div>
        
              {{-- <p class="text-xs text-gray-400">あいうえお <a href="#" class="underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">あああ</a>.</p> --}}
            </div>
          </form>
          <!-- form - end -->
        </div>
      </div>

</x-app-layout>
