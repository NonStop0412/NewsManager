@extends('layouts/app')

@section('title')
    <title>Posts</title>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Posts</h1>
                    </div>


                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <button type="button" class="btn btn-outline-primary" onclick="getPosts()">
                                <i class="el el-edit"></i> Публикации			</button>
                        </li>

                        <li role="presentation" hidden="">
                            <button type="button" class="btn btn-outline-primary" onclick="getCategories()">
                                <i class="el el-folder-open" ></i> Категории				</button>
                        </li>

                        <li role="presentation">
                            <button type="button" class="btn btn-outline-primary" onclick="getTags()">
                                <i class="el el-tag"></i> Теги                            </button>
                        </li>
                    </ul>

                    <p class="col-lg-12">
                        @if (session()->exists('message'))
                            <div class="alert alert-success">{{ session('message') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        @endif

                            <div class="row" style="margin-bottom: 15px; margin-top: 15px">
                                <a class="btn btn-default btn-sm" data-action="refresh" onclick="grid.refresh('managePostsIndex', function() {callbackPosts()})"><i class="el el-refresh"></i>
                                    Обновить		</a>
                                <a class="btn btn-primary btn-sm" href="{{route('manager.posts.create')}}" target="_blank"><i class="el el-plus-sign"></i>
                                    Создать                    </a>
                                <a class="btn btn-primary btn-sm filters-trigger-button" data-action="filters">
                                    Фильтр <i class="el el-chevron-up"></i></a>


                                <a class="btn btn-success btn-sm" modal-trigger="manageReport"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    Сделать отчет </a>


                                <a class="btn btn-danger btn-sm" data-action="delete-many"><i class="fa fa-trash" aria-hidden="true"></i>
                                    Удалить                </a>
                            </div>
                            <table class="table table-bordered berie-grid-table" id="table" data-grid-head="" style="width: 669px;">
                                <tbody>


                                </tbody>
                            </table>
                            <table class="table berie-grid-table" data-grid-pager="">
                                <tfoot>
                                <tr>
                                    <td style="width: 25%" data-grid-info="">1 - 50 of 52034</td>
                                    <td style="width: 50%"><span data-grid-paginate=""><a class="btn btn-xs" data-grid-paginate-action="first" disabled="true"><i class="el el-fast-backward"></i></a><a class="btn btn-xs" data-grid-paginate-action="previous" disabled="true"><i class="el el-chevron-left"></i></a><input type="text" min="1" style="width: 40px; height: 22px;" value="1" max="1041" grid-data-pagenate-page=""> of <span data-grid-paginate-pages="">1041</span><a class="btn btn-xs" data-grid-paginate-action="next"><i class="el el-chevron-right"></i></a><a class="btn btn-xs" data-grid-paginate-action="last"><i class="el el-fast-forward"></i></a></span></td>
                                    <td style="width: 25%"></td>
                                </tr>
                                </tfoot>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


            function getPosts()
            {
                $("#table").html("");
                var structure =
                    '<tr>'
                        +'<th data-grid-head-width="5" data-grid-head-name="id" style="width:5%">#</th>'
                        +'<th data-grid-head-width="25" data-grid-head-name="title" style="width:25%">Название</th>'
                        +'<th data-grid-head-width="15" data-grid-head-name="status" style="width:15%">Статус</th>'
                        +'<th data-grid-head-width="10" data-grid-head-name="category" style="width:10%">Категория</th>'
                        +'<<th data-grid-head-width="12" data-grid-head-name="employee" style="width:12%">Автор</th>'
                        +'<<th data-grid-head-width="10" data-grid-head-name="updateAt" style="width:10%">На проверке</th>'
                        +'<<th data-grid-head-width="12" data-grid-head-name="lastPublishEmployee" style="width:12%">Опубликовал</th>'
                        +'<<th data-grid-head-width="11" data-grid-head-name="actions" style="width:11%"></th>'
                    +'<</tr>'
                $("#table").append(structure);
                $.ajax({
                    url: '{{route('manager.posts.load')}}',
                    success: function (data) {
                        console.log(data);
                        for (const [key, value] of Object.entries(data.data)) {
                            console.log(value);
                            if(value.status == 'publish'){
                                value.status = 'Опубликовано';
                            }
                            var posts =
                                '<tr>'
                                +'<td style="width:25%"><b> <span data-filed="title">' + value.id + '</span></b></td>'
                                + '<td style="width:25%"><b> <span data-filed="title">' + value.title + '</span></b></td>'
                                + '<td style="width:15%"><div style="text-align:center"><span class="label label-success"><i class="el el-check"></i></span> </div><div style="text-align:center"><span class="label label-success">' + value.status + '</span></div><div style="text-align:center"><span style="font-size:8pt">' + value.publish_at + '</span></div></td>'
                                + '<td style="width:25%"><b> <span data-filed="title">' + value.category + '</span></b></td>'
                                + '<td style="width:25%"><b> <span data-filed="title">' + value.author + '</span></b></td>'
                                + '<td style="width:25%"><b> <span data-filed="title">' + value.last_check + '</span></b></td>'
                                + '<td style="width:25%"><b> <span data-filed="title">' + value.last_publisher + '</span></b></td>'
                                + '<td style="width:11%"><div class="icon-for-delete"><i class="fa fa-check" aria-hidden="true"></i></div><div class="input-for-delete"><input type="checkbox" name="delete[]"></div><div class="actions-news"><input type="hidden" name="id" value="214211"><div class="btn-toolbar"><a class="btn btn-primary btn-xs action-button" modal-trigger="managePostsView" data-modal-url="/manage/posts/modal-view/214211"><i class="el el-eye-open"></i></a><a class="btn btn-warning btn-xs action-button" href="/manage/posts/edit/214211" target="_blank"><i class="fa fa-paint-brush fa-lg"></i></a><a class="btn btn-danger btn-xs action-button" modal-trigger="managePostsRemove" data-modal-url="/manage/posts/modal-remove/214211"><i class="fa fa-trash fa-lg"></i></a></div></div></td>'
                                + '</tr>'
                            $('#table').append(posts);
                        }
                    },
                    error: function (data) {
                        alert('Error');
                    }
                });
        }
            $(document).ready(function() {
                getPosts();
            });

        function getCategories()
        {
            $("#table").html("");
            var structure =
                '<tr>'
                    +'<th data-grid-head-width="5" data-grid-head-name="id" style="width:5%">#</th>'
                    +'<th data-grid-head-width="25" data-grid-head-name="title" style="width:25%">Название</th>'
                    +'<th data-grid-head-width="15" data-grid-head-name="status" style="width:15%">Путь</th>'
                    +'<th data-grid-head-width="10" data-grid-head-name="category" style="width:10%">Тип</th>'
                    +'<th data-grid-head-width="12" data-grid-head-name="employee" style="width:12%">Parent</th>'
                    +'<th data-grid-head-width="10" data-grid-head-name="updateAt" style="width:10%">Публикации</th>'
                    +'<th data-grid-head-width="11" data-grid-head-name="actions" style="width:11%"></th>'
                +'</tr>'
            $("#table").append(structure);

            $.ajax({
                url: '{{route('manager.categories.load')}}',
                success: function(data) {
                    console.log(data);
                    for (const [key, value] of Object.entries(data.data)) {
                        console.log(value);
                        if(value.parent_id == null){
                            value.parent_id = '-';
                        }
                        var categories =
                            '<tr>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.id+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.title+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.route+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.type+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.parent_id+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.posts_in+'</span></b></td>'
                            + '<td style="width:10%"><input type="hidden" name="id" value="40"><div class="btn-toolbar"><a class="btn btn-warning btn-xs action-button" modal-trigger="managePCategoriesEdit" data-modal-url="/manage/posts/extensions/categories/modal-edit/40"><i class="fa fa-paint-brush fa-lg"></i></a> <a class="btn btn-danger btn-xs action-button" modal-trigger="managePCategoriesRemove" data-modal-url="/manage/posts/extensions/categories/modal-remove/40"><i class="fa fa-trash fa-lg"></i></a></div></td>'
                            + '</tr>'
                        $('#table').append(categories);
                    }
                },
                error : function(data) {
                    alert('Error');
                }
            });
        }

        function getTags()
        {
            $("#table").html("");
            var structure =
                '<tr>'
                    +'<th data-grid-head-width="5" data-grid-head-name="id" style="width:5%">#</th>'
                    +'<th data-grid-head-width="25" data-grid-head-name="title" style="width:25%">Название</th>'
                    +'<th data-grid-head-width="15" data-grid-head-name="status" style="width:15%">Путь</th>'
                    +'<th data-grid-head-width="10" data-grid-head-name="category" style="width:10%">Категория</th>'
                    +'<th data-grid-head-width="10" data-grid-head-name="updateAt" style="width:10%">Публикации</th>'
                +'</tr>'
            $("#table").append(structure);

            $.ajax({
                url: '{{route('manager.tags.load')}}',
                success: function(data) {
                    console.log(data);
                    for (const [key, value] of Object.entries(data.data)) {
                        console.log(value);

                        var tags =
                            '<tr>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.id+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.title+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.route+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.categoryId+'</span></b></td>'
                            + '<td style="width:25%"><b> <span data-filed="title">'+value.posts_in+'</span></b></td>'
                            + '</tr>'
                        $('#table').append(tags);
                    }
                },
                error : function(data) {
                    alert('Error');
                }
            });
        }

    </script>
@endsection
