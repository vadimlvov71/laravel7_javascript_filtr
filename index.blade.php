
@extends("base")


<div class="container text-left main ">
  <div class="row">
    <div class="col-3">
        <div class="form-label filter">Topics filter</div>
        <div class="form-check" style=display:none;>
            <input class="form-check-input check" type="checkbox" name="checkbox" value="hidden" id="catalog_id_hidden">
            <label class="form-check-label filter-item" for="catalog_id_hidden">
                hidden
            </label>
        </div>
        <div class="form-check" style="margin-bottom: 7px;">
            <input class="form-check-input check" type="checkbox" name="checkbox" value="all" id="catalog_id_all">
            <label class="form-check-label filter-item" for="catalog_id_all">
                All
            </label>
        </div>
        @foreach ($catalogs as $catalog)
            <div class="form-check ">
                <input class="form-check-input check" type="checkbox" name="checkbox" value="{{ $catalog->id }}" id="catalog_id_{{ $catalog->id }}">
                <label class="form-check-label filter-item" for="flexCheckDefault">
                <p>{{ $catalog->name }}</p>
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-9 wrapper-list">
        @foreach ($products as $product)
            @if(!$page || $page == 1)
                @if($loop->first)
                    @php($new = "New")
                @else
                    @php($new = "")
                @endif
            @else
                @php($new = "")
            @endif
            <div class="item">
                <span>{{ $product->id }}</span> <span class="red">{{ $new }}</span> {{ $product->name }}  catalog name: {{ $product->catalog_name }}
            </div>
        @endforeach
    </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
        {{ $products->appends(['catalog_id' => $catalog_id])->links() }}
        </div>
    </div>
</div>
@if($catalog_id)
    @foreach ($catalog_id as $catalog_id_item)     
    <script>
    document.getElementById("catalog_id_" + "{{$catalog_id_item}}").checked = true;
    </script>
    @endforeach 
@else
    <script>
        document.getElementById("catalog_id_all").checked = true;
        document.getElementById("catalog_id_hidden").checked = true;
    </script>
@endif     
   

 
