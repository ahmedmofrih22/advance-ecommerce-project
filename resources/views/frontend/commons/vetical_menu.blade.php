


@php
        $catrgors = App\Models\Category::orderBy('category_name_en', 'ASC')->get();

@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
          @foreach ($catrgors as $catrgor )


        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$catrgor->category_icon}}" aria-hidden="true"></i>
            @if(session()->get('language') == 'english') {{$catrgor->category_name_en}} @else   {{$catrgor->category_name_ar}} @endif

        </a>




          <ul class="dropdown-menu mega-menu">


            <li class="yamm-content">
              <div class="row">
                 {{-- Get Data SubCategory --}}
                @php
                $Subcatrgors = App\Models\SubCategory::where('category_id',$catrgor->id)->orderBy('subcategory_name_en','ASC')->get();
              @endphp
               @foreach ($Subcatrgors as $Subcatrgor)

                <div class="col-sm-12 col-md-3">

               <a href="{{url('subcatrgor/product/'. $Subcatrgor->id .'/'. $Subcatrgor->subcategory_slug_en)}}">
                    <h2 class="title">
                        @if(session()->get('language') == 'english')  {{ $Subcatrgor->subcategory_name_en}}
                        @else    {{ $Subcatrgor->subcategory_name_ar}}
                        @endif

                    </h2>
                </a>

                     {{-- Get Data SubSubCategory --}}
                     @php
                     $SubSubcatrgors = App\Models\SubSubCategory::where('subcategory_id',$Subcatrgor->id)->orderBy('subsubcategory_name_en','ASC')->get();
                    @endphp
                  @foreach ($SubSubcatrgors as $SubSubcatrgor)
                  <ul class="links list-unstyled">
                    <li>
                      <a href="{{url('subsubcatrgor/product/'. $SubSubcatrgor->id .'/'. $SubSubcatrgor->subsubcategory_slug_en)}}">

                        @if(session()->get('language') == 'english')  {{$SubSubcatrgor->subsubcategory_name_en}}
                        @else    {{$SubSubcatrgor->subsubcategory_name_ar}}
                        @endif

                    </a></li>

                  </ul>

                      @endforeach  {{-- End Foreach SubSubcatrgors --}}
                </div>
                <!-- /.col -->

                          @endforeach  {{-- End Foreach Subcatrgors --}}
              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>

          @endforeach   {{-- End Foreach catrgors  --}}

        <!-- /.menu-item -->



        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
          <!-- ================================== MEGAMENU VERTICAL ================================== -->
          <!-- /.dropdown-menu -->
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->

      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
  <!-- /.side-menu -->
