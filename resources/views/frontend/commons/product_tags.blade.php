
@php
    $tages_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tages_ar = App\Models\Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
@endphp



<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'english')
            @foreach ($tages_en as $tage)
            <a class="item active" title="Phone" href="{{url('Product/tage/'.$tage->product_tags_en)}}">{{ str_replace(',',' ',$tage->product_tags_en) }}</a>
            @endforeach


             @else
             @foreach ($tages_ar as $tage )
             <a class="item active" title="Phone" href="{{url('Product/tage/'.$tage->product_tags_ar)}}">{{str_replace(',',' ',$tage->product_tags_ar) }}</a>
             @endforeach
             @endif



        </div>
      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
