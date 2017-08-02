<div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a href="{!! url('/') !!}" class="active">Trang chủ</a>
          <?php $menu_level1=DB::table('cates')->where('parent_id',0)->get() ?>
          </li>
          @foreach($menu_level1 as $item_1)
          <li><a class=""  href="">{!! $item_1->name !!}</a>
            <div>
              <ul>
                <?php $menu_level2=DB::table('cates')->where('parent_id',$item_1->id)->get() ?>
                @foreach($menu_level2 as $item_2)
                <li><a href="{!! URL::route('loaisanpham',[$item_2->id,$item_2->alias]) !!}">{!! $item_2->name !!}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </li>
          @endforeach
          <li><a href="{!! url('lien-he') !!}">Liên hệ</a>
          </li>
          <div class="pull-right search">
        <form class="form-inline" method="GET" action="{!! route('timkiem') !!}">
              <div class="form-group">
                  <input type="text" class="form-control" name="txtSearch" placeholder="Search">
                  <button type="submit" class="btn btn-primary">Tìm kiếm</button>
              </div>
        </form>
        </div>
    </div>                         
        </ul>
      </nav>
