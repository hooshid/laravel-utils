<!DOCTYPE html>
<html lang="en">
<head>
    <title>Schema Builder</title>
    @include('utils::head')

    <style>
        .search {
            width: 100%;
            display: block;
            padding: 2px;
            font-size: 20px;
            border-radius: 5px;
            text-align: center;
            border: 2px solid #ddd;
        }

        .search:focus {
            border: 2px solid #37b32d;
        }

        .copy {
            cursor: pointer;
            float: right;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #545b62;
            border-color: #545b62;
        }

        .copy:hover {
            color: #fff;
            background-color: #5a6268;
            border-color: #545b62;
        }

        .copy:active,
        .copy:focus {
            background: #fff;
            color: #000;
        }

        pre {
            background: #272822;
            padding: 1em;
            margin: .5em 0;
            overflow: auto;
            border-radius: 0.3em;

            color: #f8f8f2;
            text-shadow: 0 1px rgba(0, 0, 0, 0.3);
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
            font-size: 1em;
            text-align: left;
            white-space: pre;
            word-spacing: normal;
            word-break: normal;
            word-wrap: normal;
            line-height: 1.5;
            tab-size: 4;
        }

        .pre-line {
            white-space: pre-line;
        }

        .mt-10 {
            margin-top: 25px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="mt-10">
        <form action="" method="GET">
            <label>
                <select name="table" onchange="this.form.submit()" class="search">
                    @foreach($dbTables as $dbTable)
                        <option value="{{ $dbTable }}" {{ ( $dbTable == $table) ? 'selected' : '' }}>{{ $dbTable }}</option>
                    @endforeach
                </select>
            </label>
        </form>
    </div>


    @if($headers)
        <div class="mt-10">
            <pre><button data-clipboard-text="{{ $headers }}" class="copy">Copy</button><code
                    class="pre-line">{{ $headers }}</code></pre>
        </div>
    @endif


    @if($schema)
        <div class="mt-10">
            <pre><button data-clipboard-text="{{ $schema }}" class="copy">Copy</button><code
                    class="pre-line">{{ $schema }}</code></pre>
        </div>
    @endif


    @if($casts)
        <div class="mt-10">
            <pre><button data-clipboard-text="{{ $casts }}" class="copy">Copy</button><code>{{ $casts }}</code></pre>
        </div>
    @endif

</div>

<script src="https://unpkg.com/clipboard@2.0.8/dist/clipboard.min.js"></script>

<script>
    new ClipboardJS('.copy');
</script>

</body>
</html>
