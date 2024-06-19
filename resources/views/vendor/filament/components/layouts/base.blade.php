@props([
    'title' => null,
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ __('filament::layout.direction') ?? 'ltr' }}"
    class="filament js-focus-visible min-h-screen antialiased"
>
    <head>
        {{ \Filament\Facades\Filament::renderHook('head.start') }}

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/img/jmkfile/accueil/favicon.jpg" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @foreach (\Filament\Facades\Filament::getMeta() as $tag)
            {{ $tag }}
        @endforeach

        @if ($favicon = config('filament.favicon'))
            <link rel="icon" href="{{ $favicon }}" />
        @endif

        <title>
            {{ $title ? "{$title} - " : null }} {{ config('filament.brand') }}
        </title>

        {{ \Filament\Facades\Filament::renderHook('styles.start') }}

        <style>
            [x-cloak=''],
            [x-cloak='x-cloak'],
            [x-cloak='1'] {
                display: none !important;
            }

            @media (max-width: 1023px) {
                [x-cloak='-lg'] {
                    display: none !important;
                }
            }

            @media (min-width: 1024px) {
                [x-cloak='lg'] {
                    display: none !important;
                }
            }

            :root {
                --sidebar-width: {{ config('filament.layout.sidebar.width') ?? '20rem' }};
                --collapsed-sidebar-width: {{ config('filament.layout.sidebar.collapsed_width') ?? '5.4rem' }};
            }
        </style>

        @livewireStyles

        @if (filled($fontsUrl = config('filament.google_fonts')))
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link
                rel="preconnect"
                href="https://fonts.gstatic.com"
                crossorigin
            />
            <link href="{{ $fontsUrl }}" rel="stylesheet" />
        @endif

        @foreach (\Filament\Facades\Filament::getStyles() as $name => $path)
            @if (\Illuminate\Support\Str::of($path)->startsWith(['http://', 'https://']))
                <link rel="stylesheet" href="{{ $path }}" />
            @elseif (\Illuminate\Support\Str::of($path)->startsWith('<'))
                {!! $path !!}
            @else
                <link
                    rel="stylesheet"
                    href="{{
                        route('filament.asset', [
                            'file' => "{$name}.css",
                        ])
                    }}"
                />
            @endif
        @endforeach

        {{ \Filament\Facades\Filament::getThemeLink() }}

        {{ \Filament\Facades\Filament::renderHook('styles.end') }}

        @if (config('filament.dark_mode'))
            <script>
                const theme = localStorage.getItem('theme')

                if (
                    theme === 'dark' ||
                    (!theme &&
                        window.matchMedia('(prefers-color-scheme: dark)')
                            .matches)
                ) {
                    document.documentElement.classList.add('dark')
                }
            </script>
        @endif

        {{ \Filament\Facades\Filament::renderHook('head.end') }}
    </head>

    <!-- <script id="my-component-view" type="text/javascript">
            

        </script> -->

    <body
        @class([
            'filament-body min-h-screen overflow-y-auto bg-gray-100 text-gray-900',
            'dark:bg-gray-900 dark:text-gray-100' => config('filament.dark_mode'),
        ])
    >
        {{ \Filament\Facades\Filament::renderHook('body.start') }}

        {{ $slot }}

        {{ \Filament\Facades\Filament::renderHook('scripts.start') }}

        @livewireScripts

        <script>
            window.filamentData = @json(\Filament\Facades\Filament::getScriptData())
        </script>

        @foreach (\Filament\Facades\Filament::getBeforeCoreScripts() as $name => $path)
            @if (\Illuminate\Support\Str::of($path)->startsWith(['http://', 'https://']))
                <script defer src="{{ $path }}"></script>
            @elseif (\Illuminate\Support\Str::of($path)->startsWith('<'))
                {!! $path !!}
            @else
                <script
                    defer
                    src="{{
                        route('filament.asset', [
                            'file' => "{$name}.js",
                        ])
                    }}"
                ></script>
            @endif
        @endforeach

        @stack('beforeCoreScripts')

        <script
            defer
            src="{{
                route('filament.asset', [
                    'id' => Filament\get_asset_id('app.js'),
                    'file' => 'app.js',
                ])
            }}"
        ></script>

        @if (config('filament.broadcasting.echo'))
            <script
                defer
                src="{{
                    route('filament.asset', [
                        'id' => Filament\get_asset_id('echo.js'),
                        'file' => 'echo.js',
                    ])
                }}"
            ></script>

            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    window.Echo = new window.EchoFactory(@js(config('filament.broadcasting.echo')))

                    window.dispatchEvent(new CustomEvent('EchoLoaded'))
                })
            </script>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Livewire.hook('message.processed', (message, component) => {
                    const modalElement = document.querySelector('[wire\\:id] .filament-modal'); // Adjust the selector based on your modal's class
                    if (modalElement && modalElement.style.display !== 'none') {
                        executeOnModalOpen();
                    }
                });
            });

            function executeOnModalOpen() {

                // Assuming you have a way to get the content for each CompositeView
                function transformString(input) {
                    // Split the input string by commas
                    console.log(input);
                    if(typeof input !== 'undefined'){

                        const elements = input.split(',');
        
                        // Transform each element into the desired format
                        const transformedElements = elements.map(element => `   ${element}: ""`);
        
                        // Join the transformed elements with commas and add a trailing comma
                        const result = "[\n {\n"+transformedElements.join(',\n') + ','+"\n},\n]";
        
                        return result;
                    }

                    return "Erreur survénue !"
                }
                
                var compositeViewContents = {
                    @foreach(App\Models\CompositeView::all() as $compositeView)
                        {{ $compositeView->id }}: @json([$compositeView->required, asset(\Storage::url($compositeView->image))]),
                    @endforeach
                };
                console.log(compositeViewContents);

                const selectFields = document.querySelectorAll('.composite_view_class');
                const textAreaFields = document.querySelectorAll('.content_class');
                const dynamicImageElements = document.querySelectorAll('.dynamic_image_class');

                if (selectFields.length > 0) {
                    selectFields.forEach((selectField, index) => {
                        selectField.addEventListener('change', function (event) {
                            console.log(textAreaFields, dynamicImageElements);
                            const selectedId = event.target.value;
                            const content = compositeViewContents[selectedId] || '';
                            
                            const textAreaField = textAreaFields[index];// selectField.closest('.item').querySelector('.content_class');
                            const dynamicImageElement = dynamicImageElements[index];// selectField.closest('.item').querySelector('.dynamic_image_class');
                            
                            if (textAreaField) {
                                textAreaField.value = transformString(content[0]);
                            }
                            if (dynamicImageElement) {
                                dynamicImageElement.src = content[1];
                            }
                        });
                    });
                } else {
                    // SCRIPT 1
                    console.log("Select non definit !");
                }

                console.log('Modal is opened!');
            }

            executeOnModalOpen();
        </script>

        @foreach (\Filament\Facades\Filament::getScripts() as $name => $path)
            @if (\Illuminate\Support\Str::of($path)->startsWith(['http://', 'https://']))
                <script defer src="{{ $path }}"></script>
            @elseif (\Illuminate\Support\Str::of($path)->startsWith('<'))
                {!! $path !!}
            @else
                <script
                    defer
                    src="{{
                        route('filament.asset', [
                            'file' => "{$name}.js",
                        ])
                    }}"
                ></script>
            @endif
        @endforeach

        @stack('scripts')

        {{ \Filament\Facades\Filament::renderHook('scripts.end') }}

        {{ \Filament\Facades\Filament::renderHook('body.end') }}
    </body>
</html>
