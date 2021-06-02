<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="navbar-default sidebar" role="navigation">

		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search ...">
			</div>
		</form>
		<ul class="nav" id="side-menu">

			<li class="active"><a href="{{route('admin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
			<li id="danhmuc"><a href="{{route('category')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> List</a></li>

			<li id="sanpham"><a href="{{route('product')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Product </a></li>

			<li id="sanpham"><a href=""><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Slide</a></li>

			<li><a href="{{route('news')}}"><span class="glyphicon glyphicon-file"></span> News</a></li>

			{{-- <li><a href="{!!url('admin/nhaphang')!!}"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Nhập hàng</a></li> --}}

			<li><a href="{{route('oder')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Order</a></li>

			<li><a href="{{route('user')}}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-line-graph"></use></svg>  Custommer</a></li>

			<li><a href="{{route('nhanvien')}}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg> Staff</a></li>

			<li role="presentation" class="divider"></li>
			<li><a href="{{route('khohang')}}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>  Warehouse information</a></li>

			<li><a href="{!!url('admin/lichsu')!!}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> Purchase history</a></li>
		</ul>

	</div><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->
