@extends('admin.layouts.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{!!(url('/admin/home'))!!}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">News</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Newsletter list
                        <a href="{!!url('admin/news/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Add new news</button></a>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (Session()->has('flash_level'))
                        <div class="alert alert-success">
                            <ul>
                                {!! Session::get('flash_massage') !!}
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>image</th>
                                    <th>Newsletter title</th>
                                    <th>Summary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td> <img src="" alt="" width="40" height="40"> </td>
                                    <td></td>
                                    <td><small></small></td>
                                    <td style="width: 90px;">

                                        Display

                                        Snooze

                                    </td>
                                    <td style="width: 120px;">
                                        <a href="" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>
                                        <a href=""  title="Xóa" onclick="return xacnhan('Delete this category ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
