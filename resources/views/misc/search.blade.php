@extends('layouts.t1')

@section('content')
    <div class="app-pages">
        <div class="container">
            <div class="app-title">
                <h4>Search</h4>
                <div class="line"></div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">type a name of product</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
            limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
            onAutocomplete: function(val) {
                // Callback function when value is autcompleted.
                console.log(val);
            },
            minLength: 3,
        });
    });
</script>
@endsection